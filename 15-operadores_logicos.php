<?php

$idade = 25;
$nome = "Rodrigo";

if(($idade==25) && ($nome == "Rodrigo")):
echo "É verdade";
else:
    echo "É falso";
endif;
echo "<hr>";

if(($idade==26) || ($nome == "Rodrigo")):
    echo "É verdade";
else:
    echo "É falso";
endif;
echo "<hr>";

if(($idade==23) or ($nome == "Carlos")):
    echo "É verdade";
else:
    echo "É falso";
endif;
echo "<hr>";

// ou exclusivo - verdade se apenas 1 expressão for verdadeira
if(($idade==25) xor ($nome == "Rodrigo")):
    echo "É verdade";
else:
    echo "É falso";
endif;
echo "<hr>";

// idade diferente de 25
if(!($idade==25) && ($nome == "Rodrigo")):
    echo "É verdade";
    else:
        echo "É falso";
    endif;
    echo "<hr>";


