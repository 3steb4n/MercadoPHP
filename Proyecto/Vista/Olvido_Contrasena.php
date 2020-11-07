<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Olvido su Contraseña</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Iconos_o_Imagenes/css/EstilosLogin.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="../js/ValidarUsuario.js"></script>
</head>
<body>
	<div class="container-sm">
		<form method="POST" action="Envio_Correo.php">
			<div class="text-center">
  				<img src="../Iconos_o_Imagenes/laptop.png" class="rounded" height="200px" width="200px">
			</div>
			<h3>Por favor coloque el numero de documento para poder enviar la contraseña al correo</h3>
			<div class="form-group">
					Numero Documento: <input type="number" class="form-control" id="ndocumento" name="ndocumento"><br/>
			</div>
				<button type="button" onclick="" class="btn btn-primary rigth">Enviar</button>
		</form>
	</div>

</body>
</html>