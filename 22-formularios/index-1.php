<html>
<body>
<?php
if(isset($_POST['enviar-formulario'])):
    $erros = array();
        // validação idade
    if(!$idade = filter_input(INPUT_POST,'idade',FILTER_VALIDATE_INT)):
        $erros[] = "Idade deve ser um inteiro";
    endif;
        // validação email
    if(!$idade = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)):
        $erros[] = "E-mail inválido";
    endif;
        // validação peso
    if(!$idade = filter_input(INPUT_POST,'peso',FILTER_VALIDATE_FLOAT)):
        $erros[] = "Peso precisa ser um float";
    endif;
        // validação IP
    if(!$idade = filter_input(INPUT_POST,'ip',FILTER_VALIDATE_IP)):
            $erros[] = "IP inválido";
    endif;
        // validação URL
    if(!$idade = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL)):
            $erros[] = "URL Inválido";
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
    Idade: <input type="text" name="idade"><br>
    Email <input type="text" name="email"><br>
    Peso: <input type="text" name="peso"><br>
    IP: <input type="text" name="ip"><br>
    URL <input type="text" name="url"><br>
    <button type="submit" name="enviar-formulario"> Enviar </button><br>
</form>
</body>
</html>