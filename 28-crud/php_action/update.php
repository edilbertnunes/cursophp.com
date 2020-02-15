<?php
session_start();
require_once 'db_connect.php';
//Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect,$input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}
// isset — Informa se a variável foi iniciada
if (isset($_POST['btn-editar'])):
	$nome = clear($_POST['nome']);
	$sobrenome = clear($_POST['sobrenome']);
	$email = clear($_POST['email']);
	$idade = clear($_POST['idade']);
	$sexo = clear($_POST['sexo']);
    
    $id = clear($_POST['id']);
    
    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome',email='$email',
	idade ='$idade',sexo ='$sexo' WHERE id = '$id'";

	//mysqli_query - Executa uma consulta no banco de dados
	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso";
		header('Location: ../index.php');
	 else:
	 	$_SESSION['mensagem'] = "Erro ao Atualizar";
		header('Location: ../index.php');
	endif;
endif;
