<?php
$numero = 50;

if ($numero ==10):
    echo "É igual a 10";
elseif ($numero <= 9):
    echo "É menor ou igual a 9";
elseif ($numero > 10):
    echo "É maior que 10";
else:
    echo "É diferente de 10";
endif;
echo "<hr>";

//forma simplificada de escrever o if
$media = 7;
echo ($media >=7) ? "Aprovado!" : "Reprovado";
echo "<hr>";

// Switch
$cor = "amarelo";
switch($cor):
    case "vermelho":
        echo "Sua cor preferida é vermelho";
    break;
    case "verde":
        echo "Sua cor preferida e verde";
    break;
    case "azul":
        echo "Sua cor preferida é azul";
    break;
    default: 
    echo "Sua cor preferida não é vermelho, verde ou azul";
endswitch;



