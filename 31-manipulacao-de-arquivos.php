<?php
// Manipulação de Arquivos
/*
fopen()
fclose()
fwrite()
!feof()
fgets()
filesize
 */
// Gravando dados
$arquivo = 'arquivo.txt';
$conteudo = "Conteudo de teste\r\n";
//echo $tamanhoArquivo = filesize($arquivo);

$arquivoAberto = fopen($arquivo, 'a');
fwrite($arquivoAberto,$conteudo);
fclose($arquivoAberto);
echo "<hr>";


// leitura
$arquivo = 'arquivo.txt';
$conteudo = "Conteudo de teste\r\n";
echo $tamanhoArquivo = filesize($arquivo);

$arquivoAberto = fopen($arquivo, 'a');

while(!feof($arquivoAberto)):
	$linha = fgets($arquivoAberto, $tamanhoArquivo);
	echo $linha."<br>";
endwhile;

fclose($arquivoAberto);