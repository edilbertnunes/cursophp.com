<?php

$string = "contato@gmail.net";
// a início da expressão
// $ fim da expressão
//$padrao = "/^$/i";

// Expressões regulares
// Define um padrão a ser usado para procurar ou substituir palavras ou grupos de palavras. 
// ^ inicio da expressão, $ final da expressão - /i - case sensitive 
// [] conjunto de caracteres
// {} ocorrências - ?{0,1} *{0,} +{1,}
// /^[a-z0-9.\-\_]+@[a-z0-9-\_]+\.(com|br|com.br|net)$/ 
// /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/

$padrao = "/^[a-z0-9. \-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br|net)$/i";

if(preg_match($padrao, $string)):
    echo "Válido";
    echo "<br>";
    echo $string;
    else:
        echo "Inválido";
        echo "<hr>";
endif;


echo "<hr>";



$data = "13/08/2018";
// a início da expressão
// $ fim da expressão
$padraodata = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";

if(preg_match($padraodata, $data)):
    echo "Válida";
    echo "<br>";
    echo $data;
    else:
        echo "Inválido";
        echo "<hr>";
endif;