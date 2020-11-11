<!DOCTYPE html>
<html>
<head>
	<title>Olvido su Contraseña</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Iconos_o_Imagenes/css/EstiloRecuperacionClave.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="../../js/ValidarEmail.js"></script>
</head>
<body>
	<div id="messageEmailDiv" style="display: none; position: absolute; z-index: 3; background-color: rgba(0, 0, 0, 0.5); width: 100%; height: 100vh;">
	<div style="position: absolute; padding: 40px; background-color: white; width: 40%; height: 300px; margin: auto; top: 0; bottom: 0; right: 0; left: 0;">
	<label style="color: green;" id="messageEmailLabel"></label> 
	<br>
	<br>
	<br>
	<br>
	<br>
	<form action="../Login.php">
	<button style="width: 100%;" type="submit" class="btn btn-primary rigth">Aceptar</button>
	</form>
	</div>
	</div>
	<div class="container-sm">
		<form method="POST" action="Envio_Correo.php">
		<div class="CamposRecuperacionDos">
			<div class="CamposRecuperacion">
				<h2>RESTAURAR CONTRASEÑA</h2>
			</div>
			<br>
			    <label>Ingresa tu correo electrónico y te enviaremos las instrucciones para restaurar tu contraseña.</label>
			    <div class="form-group">
				Correo Electronico: <br> <input type="email" class="form-control" placeholder="Ejemplo: example145@gmail.com" id="campoEmail" name="campoEmail" required><br/>
				 </div>
				<button style="width: 100%;" type="button" onclick="verificarEmail(campoEmail.value)" name="enviarCorreo" class="btn btn-primary rigth">Enviar</button>
				<label id="mensajeCorreo" name="mensajeCorreo"></label>
		</div>
		</form>
	</div>

</body>
</html>