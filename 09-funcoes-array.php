<?php
//VERIFICAR SE É UM ARRAY
$names = array ("Edi", "Sami", "Maria", "José");

if (is_array($names)) {
    echo "É um array";
} else {
    echo "Não é um array";
}
echo "<hr>";

// IN_Array
// 0 nao localizou registro no array
$nomes = array ("Teste","TV","Monitor");
echo in_array("carlos", $nomes);
if(in_array("Felipe",$nomes)):
    echo "Existe no Array";
else:
    echo "Não existe no array";
endif;
echo "<hr>";
// ARRAY KEYS
$nom = array ("Primo"=>"Rodrigo", "Vizinho"=>"Felipe","Mãe"=>"Maria","Pai"=>"João");
$keys = array_keys($nom);
print_r($keys);
echo "<hr>";
// ARRAY VALUES
$lista = array ("Primo"=>"Rodrigo", "Vizinho"=>"Felipe","Mãe"=>"Maria","Pai"=>"João");
$values = array_values($lista);
print_r($lista);
echo "<hr>";

// Array Merge
$carros = array ("Gol", "Uno", "Fiesta");
$motos = array ("POP 100", "CB 500", "BMW");
$veiculos = array_merge($carros,$motos);
print_r($veiculos);
echo "<hr>";

// Array POP
$carros = array ("Gol", "Uno", "Fiesta");
print_r($carros);
echo "<br>";
echo array_pop($carros);
echo "<br>";
print_r($carros);
echo "<hr>";

// Array shift";
$carros = array ("Gol", "Uno", "Fiesta");
print_r($carros);
echo "<br>";
echo array_shift($carros);
echo "<br>";
print_r($carros);
echo "<hr>";

// array Unshift
$frutas = array ("Uva", "Laranja", "Maçã");
print_r($frutas);
array_unshift($frutas, "Manga", "Acerola", "Morango");
echo "<br>";
print_r($frutas);
echo "<hr>";

//Array Push
$frutas2 = array ("Uva", "Laranja","Maçã");
print_r($frutas2);
array_push($frutas2,"Manga","Acerola","Morango");
echo "<br>";
print_r($frutas2);
echo "<hr>";

// Array Combine - 
$chaves = array ("Campeão", "Vice", "Terceiro");
$valores = array ("Vasco", "Flamengo","Botafogo");
$result = array_combine($chaves,$valores);
print_r($result);
echo "<hr>";

// Array Sum
$soma = array (7,8.5,10);
$total = array_sum($soma);
echo $total;
echo "<hr>";

// Explode
$data = "30/02/2020";
$novaData = explode('/', $data);
print_r($novaData);
echo "<hr>";

$frase = "Meu nome não é Johnny";
$array = explode(" ", $frase);
print_r($array);
echo "<hr>";

// Implode
$nomes = array ("Rodrigo ", "Carlos ", "Talita");
$string = implode (',',$nomes);
echo ($string);
