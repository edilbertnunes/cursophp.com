<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Traits\Querys;
use App\Http\Traits\UploadFile;
use App\Models\CmsUser;
use App\Models\CmsRoleUser;
use App\Models\CmsRole;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Repositories\UserRepository as UserRepository;

class UsersController extends Controller
{
    use UploadFile, Querys;

    protected $user;
    protected $userRole;
    protected $profile;
    public function __construct()
    {
        $this->user = app(CmsUser::class);
        $this->userRole = app(CmsRoleUser::class);
        $this->roles = app(CmsRole::class);
        $this->profile = config('constants.Profiles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        try {
            $user = $this->user->getProfileUser();

            // permissão somente estes dois perfil
            if( $user['role_id'] != $this->profile['Manager'] && 
                $user['role_id'] <> $this->profile['Administrator'] && 
                $user['role_id'] <> $this->profile['Master']){
                return response()->json(['message' => 'sem permissão'], 403);
            }
                        
            $listProfiles = array(
                $this->profile['Manager'], $this->profile['Viewer']
            );

            // se o Perfil procurado não estiver na lista a ser procurada
            $requisicoes = $request->query();
            
            if ($user['role_id'] == $this->profile['Administrator'] || 
                $user['role_id'] == $this->profile['Master']){
                array_push($listProfiles, $this->profile['Administrator']);
            }

            if(isset($requisicoes['role_id']) && $requisicoes['role_id'] == $this->profile['Master']){
                return response()->json(['message' => 'Sem permissão'], 403);
            }

            if(isset($requisicoes['role_id']) && !in_array($requisicoes['role_id'], $listProfiles)){
                return response()->json(['message' => 'Sem permissão'], 403);
            }
            
            $users = $this->user->getUsers($requisicoes, $listProfiles);
            if (is_null($users[0])){
                return response()->json(['message' => 'No Content'], 204);
            }
               
            return response()->json($users, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRoles(Request $request)
    {    
        try {
            $user = $this->user->getProfileUser();

            // permissão somente estes dois perfil
            if( $user['role_id'] != $this->profile['Manager'] && 
                $user['role_id'] <> $this->profile['Administrator'] && 
                $user['role_id'] <> $this->profile['Master']){
                return response()->json(['message' => 'sem permissão'], 403);
            } 
            
            $listProfiles = array(
                $this->profile['Manager'], $this->profile['Viewer']
            );
            if ($user['role_id'] == $this->profile['Administrator'] || 
                $user['role_id'] == $this->profile['Master']){
                array_push($listProfiles, $this->profile['Administrator']);
            }
            $rules = $this->roles->findRoles($listProfiles);
               
            return response()->json($rules, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $userLogado = $this->user->getProfileUser();
            
            // Perfil Viewer não tem permissão de criação
            if( $userLogado['role_id'] == $this->profile['Viewer']){
                return response()->json(['message' => 'sem permissão'], 403);
            }

            // Recebe os parâmetros passados para a consulta
            $arrRequest = $request->all();  
            if (isset($arrRequest['role_id'])){

               
                // Qual perfil pode ser solicitado alteração: Restringe alterações somente para estes três perfis informados
                if( $arrRequest['role_id'] != $this->profile['Administrator'] && 
                    $arrRequest['role_id'] != $this->profile['Manager'] && 
                    $arrRequest['role_id'] != $this->profile['Viewer']){
                    return response()->json(['message' => 'Perfil informado não autorizado'], 403);
                }

                $user = $this->user->getProfileUser();
                
                $listProfiles = array(
                    $this->profile['Manager'], $this->profile['Viewer']
                );

                if ($user['role_id'] == $this->profile['Administrator'] || 
                    $user['role_id'] == $this->profile['Master']){
                    array_push($listProfiles, $this->profile['Administrator']);
                }

                // Usuario logado não pode alterar um perfil com hierarquia maior 
                if( $arrRequest['role_id'] < $userLogado['role_id'] ){
                    return response()->json(['message' => 'Perfil não autorizado'], 403);
                }
            }

            $response = $this->user->updateUser($arrRequest, $id);
            if(!$response){
                return response()->json(['message' => 'Atualização não realizada'], 422);
            }

            return response()->json(['message' => 'Atualização realizada.'], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthRequest $request)
    {
        try {

            $userLogado = $this->user->getProfileUser();

            // Perfil Viewer não tem permissão de criação
            if( $userLogado['role_id'] == $this->profile['Viewer']){
                return response()->json(['message' => 'sem permissão'], 403);
            }

            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email'); 
            $data['password'] = $request->input('password'); 

            // // remover máscara CPF
            // Arr::set($request, 'cpf',str_replace('-','',str_replace(".", "", $request->input('cpf'))));

            $data['cpf'] = $request->input('cpf'); 
            $data['role_id'] = intval($request->input('role_id')); 
            $data['deleted'] =  0;
            $data['created_at'] = Carbon::now()->toDateString();
            $data['updated_at'] = Carbon::now()->toDateString();
            $data['password'] = bcrypt($request->input('password')); 

            $roleid = $data['role_id'];

            // Qual perfil pode ser solicitado alteração: Restringe alterações somente para estes três perfis informados
            if( $roleid != $this->profile['Administrator'] && 
                $roleid != $this->profile['Manager'] && 
                $roleid != $this->profile['Viewer']){
                return response()->json(['message' => 'Perfil informado não autorizado'], 403);
            }

            // trata hierarquia
            $listProfiles = array(
                $this->profile['Manager'], $this->profile['Viewer']
            );

            if ($userLogado['role_id'] == 'Administrator' || $userLogado['role_id'] == 'Master'){
                array_push($listProfiles, $this->profile['Administrator']);
            }

            // Usuario logado não pode alterar um perfil com hierarquia maior 
            if( $data['role_id'] < $userLogado['role_id'] ){
                return response()->json(['message' => 'Perfil não autorizado'], 403);
            }

            if (!in_array($data['role_id'], $listProfiles) && $data['role_id'] == $this->profile['Master']){
                return response()->json(['message' => 'Perfil informado não autorizado'], 403); 
            } 

            // Cria usuário e envia notificação
            $this->user->store($data)->sendEmailVerificationNotification();

            $getIdUser = $this->user::where('cpf', $data['cpf'])->first();
            if($getIdUser->id){
                $dataRole['role_id'] = $data['role_id'];
                $dataRole['user_id'] = $getIdUser->id;   
            } else {
                throw response()->json(['msg' => 'User not registered!'], 422);
            }

            $responseRole = $this->userRole->store($dataRole);

            if ($responseRole){
                return response()->json(['msg' => 'Usuario registrado!'], 201);
            }

            return response()->json(['msg' => 'Usuário não registrado!'], 422);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ], 500);
        }
    }

    public function destroy($id) {
        return $this->UserRepository->destroy($id);
    }

    public function show (Request $id) {
        return $this->UserRepository->show($id);
    }

}
