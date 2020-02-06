<?php
// Aula 30
$db = 1234.56;
$preco = number_format($db,2,",",".");
echo "O valor do produto é R$ $preco";
echo "<hr>";

echo round (3.6);
echo "<br>";
echo round (3.49);
echo "<br>";
// ceil só arredonda para cima
echo ceil (8.1);
echo "<br>";
// floor arredonda para baixo
echo floor(7.99);
echo "<br>";

// gera números aleatórios de 1 a 30
echo "<hr>";
echo rand(1,30);