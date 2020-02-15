<?php
//COOKIE
setcookie('user','Rodrigo Oliveira',time()+3600);
// remover cookie - colocar o valor negativo
setcookie('email','teste@gmail.com',time()-3600);
setcookie('ultima_pesquisa', 'tennis adidas',time()+3600);
var_dump($_COOKIE);
echo "<br>";
echo $_COOKIE['ultima_pesquisa'];