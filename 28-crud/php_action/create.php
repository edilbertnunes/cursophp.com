<?php
session_start();
require_once 'db_connect.php';
// isset — Informa se a variável foi iniciada
if (isset($_POST['btn-cadastrar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$idade = mysqli_escape_string($connect, $_POST['idade']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	
	$sql = "INSERT INTO clientes(nome,sobrenome,email,idade,sexo) VALUES ('$nome','$sobrenome','$email','$idade','$sexo')";

	//mysqli_query - Executa uma consulta no banco de dados
	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso";
		header('Location: ../index.php');
	 else:
	 	$_SESSION['mensagem'] = "Erro ao Cadastrar";
		header('Location: ../index.php');
	endif;
endif;
