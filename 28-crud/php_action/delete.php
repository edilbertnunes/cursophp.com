<?php
session_start();
require_once 'db_connect.php';
//Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect,$input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}
// isset — Informa se a variável foi iniciada
if (isset($_POST['btn-deletar'])):
  
    $id = clear($_POST['id']);
    
    $sql = "DELETE FROM clientes WHERE id = '$id'";

	//mysqli_query - Executa uma consulta no banco de dados
	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com Sucesso";
		header('Location: ../index.php');
	 else:
	 	$_SESSION['mensagem'] = "Erro ao Deletar";
		header('Location: ../index.php');
	endif;
endif;
