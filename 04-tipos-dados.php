<?php
//////////////////////////////////////////////////TIPOS DE DADOS ESCALARES ///////////////////////////
// String
$nome = "Olá mundao 123 $#*";
var_dump($nome);
if(is_string($nome)):
        echo "É uma String";
   else:
        echo "Não é uma String";
endif;
echo "<hr>";

// inteiro - int
$idade = 12;
var_dump($idade);
if(is_int($idade)):
    echo "É Inteiro";
else:
    echo "Não é Inteiro";
endif;
echo "<br>";

//float
$altura = 1.65;
var_dump($altura);
if(is_float($altura)):
    echo "É Float";
else:
    echo "Não é Float";
endif;
echo "<hr>";

//Boolean
$admin = true;
var_dump($admin);
if (is_bool($admin)):
    echo "É Boolean";
else:
    echo "Não é Boolean";
endif;
echo "<hr>";

//////////////////////////////////////////////////TIPOS DE DADOS COMPOSTOS ///////////////////////////
$carros = array ("Gol","Fiesta", "Fusca","Onix",12,12.6,true);
var_dump($carros);
echo "<hr>";

//CLASSE
class Cliente {
    public $nome;
        public function AtribuirNome($nome){
        $this->$nome = $nome;
    }
}
$cliente = new Cliente ();
$cliente->AtribuirNome("Edilbert Nunes");
var_dump($cliente);
if(is_object($cliente)):
    echo "É um Objeto";
else:
    echo "Não é  um  Objeto";
endif;
echo "<hr>";
//////////////////////////////////////////////////TIPOS DE DADOS ESPECIAIS ///////////////////////////
// NULL e Resource
$cidade = null;
var_dump($cidade);
echo "<hr>";