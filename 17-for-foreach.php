<?php
for($contador = 0; $contador<=10; $contador++):
    echo "O contador é $contador<br>";
endfor;
echo "<hr>";

//Tabuada de 8
for($contador = 0; $contador<=10; $contador++):
    echo "8 x $contador = ".($contador*8)."<br>";
endfor;
echo "<hr>";

// For each - percorrer Array
$cores = array ("Verde", "Vermelho", "Azul","Amarelo");
foreach ($cores as $indice => $valor):
    echo $indice. "-".$valor."<br>";

endforeach;
echo "<hr>";
$i= 1;
for ($i=1; $i <=20; $i++): 
  echo "Contador é  $i<br>";
endfor;