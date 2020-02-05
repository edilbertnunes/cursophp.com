<?php
// Aula 24
if (10==10):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10!=11):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10===11):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10==='10'):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10!==11):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10<>10):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10>10):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10<30):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10<=30):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

if (10>=30):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

var_dump(20 <=>21);
var_dump(20 <=>20);
var_dump(21 <=>20);
echo "<hr>";