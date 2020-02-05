<?php
//Constantes
// Identificador para um valor único, não pode alterar durante a execusão do script

define("NOME", "Edilber Nunes");
define ("IDADE",35);
define ("ALTURA",1.65);
define("TIMES",['Vasco','Flamego','Santos']);
echo 'Meu nome é '.NOME. ' e minha idade é '.IDADE.' e minha altura  é '.ALTURA;
echo "<hr>";
echo TIMES[2];
echo "<hr>";
var_dump(TIMES);
echo "<hr>";


function exibeNome(){
    echo NOME;
}
exibeNome();


 