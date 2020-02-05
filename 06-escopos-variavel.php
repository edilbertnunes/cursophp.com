<?php
// Variável no escopo Global
$a = 1;
$b =  5;
$c = 7;
$nome = "Edilbert Nunes";
//função no escopo local
function exibeNome (){
    global $nome;
    echo $nome;
}
exibeNome();

echo "<hr>";

// escopo local
function exibeCidade (){
    global $cidade;
    $cidade = "Rio de Janeiro";
}
exibeCidade();
echo $cidade;
echo "<hr>";

function soma(){
    echo $GLOBALS['a'] + $GLOBALS['b'] + $GLOBALS['c'];
}
soma();