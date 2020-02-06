<?php
// Aula 28

$nome = "jose Mariano da Silva";
$novoNome = strtoupper($nome);
echo $novoNome;
echo "<hr>";

$nome = "JOSE DA SILVA PEREIRA";
$novoNome = strtolower($nome);
echo $novoNome;
echo "<hr>";

$mensagem = "Olá Mundo";
echo substr($mensagem,4, 4);
echo "<hr>";

$objeto = "Mouse";
$novoObjeto = str_pad($objeto, 9,"*", STR_PAD_BOTH);
echo $novoObjeto;
echo "<hr>";

// Aula 29
$string = str_repeat("Suecesso<br>", 5);
echo $string;
echo "<hr>";

$mensagem = "Olá Mundo";
echo strlen($mensagem);
echo "<hr>";

$texto = "A seleção Argentina será campeã da copa do mundo";
$novoTexto = str_replace ("Argentina", "Brasileira",$texto);
echo $novoTexto;
echo "<hr>";

echo strpos($texto,"copa");
echo "<hr>";





