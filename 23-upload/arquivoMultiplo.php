<html>
<body>
	<?php
		if(isset($_POST['enviar-formulario'])):
            $formatosPermitidos = array("jpeg","jpg","png","gif","html");
            $quantidadeArquivos = count($_FILES['arquivo']['name']);
            $contador = 0;
            
            while ($contador < $quantidadeArquivos):
			//informar  o nome do input, neste caso 'arquivo' e o índice do array
            $extensao = pathinfo($_FILES['arquivo']['name'][$contador],PATHINFO_EXTENSION);
            // verifica se a extensão existe no array formatospermitidos
            
            if(in_array($extensao,$formatosPermitidos)):
				$pasta ="arquivos/";
				$temporario = $_FILES['arquivo']['tmp_name'][$contador];
				$novoNome = uniqid().".$extensao";
				// verifica se houve o upload
				if(move_uploaded_file($temporario,$pasta.$novoNome)):
					echo "Upload feito com sucesso para $pasta$novoNome<br>";
				else:
					echo "Erro ao enviar o arquivo $temporario<br>";
				endif;
			else:
				echo "$extensao não é permitida<br>";
            endif;
            $contador++;
        endwhile;
    endif;
	?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<input type="file" name="arquivo[]" multiple><br>
<input type="submit" name="enviar-formulario">
</form>
</body>
</html>