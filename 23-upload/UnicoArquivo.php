<html>
<body>
	<?php
		if(isset($_POST['enviar-formulario'])):
			$formatosPermitidos = array("jpeg","jpg","png","gif");
			//informar  o nome do input, neste caso 'arquivo' e o índice do array
			$extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
			// verifica se a extensão existe no array formatospermitidos
			if(in_array($extensao,$formatosPermitidos)):
				$pasta ="arquivos/";
				$temporario = $_FILES['arquivo']['tmp_name'];
				$novoNome = uniqid().".$extensao";
				// verifica se houve o upload
				if(move_uploaded_file($temporario,$pasta.$novoNome)):
					$mensagem = "Upload feito  com sucesso!";
				else:
					$mensagem = "Erro, não  foi  possível fazer o upload";
				endif;
			else:
				$mensagem = "Formato Inválido";
			endif;
		echo $mensagem;
	endif;
	?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<input type="file" name="arquivo"><br>
<input type="submit" name="enviar-formulario">
</form>
</body>
</html>