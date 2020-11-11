<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>
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
	<div class="container">
	  <div class="abs-center">
	  <img src="../Iconos_o_Imagenes/laptop.png" class="mx-auto img-fluid img-thumbnail"  width="500" height="500">
	    <form action="#" class="border p-3 form">
		
	    <h4 class="h4" align="center">Tienda virtual</h1>
	      <div class="form-group">
	        <label for="email">Ingrese Usuario</label>
	        <input type="text" name="email" id="email" class="form-control">
	      </div>
	      <div class="form-group">
	        <label for="password">Ingrese Contraseña</label>
	        <input type="password" name="password" id="password" class="form-control">
	      </div>
		  <span id="mensaje" style="color: red;"></span>
	      <button type="button" onclick="verificarLog(email.value, password.value)" class="btn btn-primary">Ingresar</button>
	      <a href="usuarios/NuevoUsuario.php" class="btn btn-primary">Registrate</a>
	    	<a href="usuarios/FormularioOlvidoClave.php">Olvido su Contraseña</a>
	    </form>

	  </div>
	</div>	
</body>
</html>