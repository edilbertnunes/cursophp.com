<?php
$servername = "localhost";
$username ="admin";
$password = "";
$db_name = "test";

$connect = mysqli_connect($servername,$username,$password,$db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;