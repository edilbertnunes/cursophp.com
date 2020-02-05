<?php
//ARRAYS
$carros = array(1=>"BMW",2=>"Veloster",3=>"Hilux");
$carros [] = "Amarok";
$carros[10] = "Camaro";
print_r ($carros[10]);
echo "<hr>";
$motos = array();
$motos[]= "Yamaha";
$motos []= "Honda";
$motos [5]= "Suzuki";
echo $motos[5];
echo "<hr>";

$clientes = ["Rodrigo","Ana","Maria"];
print_r ($clientes);
echo "<hr>";
//Cout
$totalClientes = count($clientes);
echo $totalClientes;
echo "<hr>";

// Foreach
//Para percorrer o array, para cada repetição de carro vai ser atribuidor um valor para a variável valor
foreach($carros as $valor){
    echo $valor."<br>";
}
echo "<hr>";
foreach($motos as $nmMoto) {
    echo $nmMoto. "<br>";
}
echo "<hr>";
//Arrays associativos
$pessoa = array ("Nome"=>"Edilbert", "Idade"=>35, "Altura"=>1.65);
$pessoa ["Cidade"] = "Ceilândia";
print_r ($pessoa);
echo "<hr>";

foreach ($pessoa as $indice =>$valor){
    echo $indice. ":".$valor."<br>";
}
echo "<hr>";

//Arrays multidimensionais
$times = array(
    "cariocas"=>array("Vasco","Flamengo","Botafogo","Bangú", "Volta Redonda"),
    "paulistas"=>array("Santos","São Paulo","Palmeiras"),
    "bainos"=>array("Bahia","Vitória","Itabuna")
);
echo $times["paulistas"][1];
echo "<hr>";

foreach($times["cariocas"] as $indice=>$valor){
    echo $indice.":".$valor."<br>";

}