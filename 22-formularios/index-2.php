<html>
<body>
<?php
// Aula 36
if(isset($_POST['enviar-formulario'])):
    // array de erros
    $erros = array();
//sanitize - limpar as variáveis
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);

$idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_NUMBER_INT);
    if(!filter_var($idade,FILTER_VALIDATE_INT)):
        $erros[] = "Idade precisa ser um inteiro";
    endif;
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)):
        $erros[] = "E-mail não aceito";
    endif;
$peso = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_URL);
    if(!filter_var($peso, FILTER_VALIDATE_FLOAT)):
        $erros[] = "Peso precisa ser float";
    endif;
$url = filter_input(INPUT_POST,'url',FILTER_SANITIZE_URL);
    if(!filter_var($url, FILTER_VALIDATE_URL)):
        $erros[]= "URL não aceita";
    endif;
   if(!empty($erros)):
        foreach($erros as $erro):
            echo "<li> $erro</li>";
        endforeach;
    else:
        echo "Dados Corretos";
    endif;
endif;
?>
<!-- no metódo GET os parâmetros não enviados via URL -->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    Nome: <input type="text" name="nome"><br>
    Idade: <input type="text" name="idade"><br>
    Email <input type="text" name="email"><br>
    Peso: <input type="text" name="peso"><br>
    URL <input type="text" name="url"><br>
    <button type="submit" name="enviar-formulario"> Enviar </button><br>
</form>
</body>
</html>