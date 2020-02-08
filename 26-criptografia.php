<?php
$senha = 123456;
$senha_db = '$2y$10$zQePOBTZ3HAfsY.5BGEIge5oEYyWJoUGRNSwpFsSbmRMWN9CNdRxO';
echo "Senha: " .$senha."<br><hr>";


$novaSenha = base64_encode($senha);
echo "Decodificando senha em base64: ".base64_decode($novaSenha)."<br>";
echo "Senha $senha em MD5:".md5($senha)."<br>";
echo "Senha $senha em SHA1: ".sha1($senha)."<br>";


$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

echo "<hr>Senha com PHP Hash: ".$senhaSegura."<hr><br>";

//verificando senha  PHP Hash
if(password_verify($senha,$senha_db)):
    echo "Senha válida";
else:
    echo "Senha inválida";
endif;

