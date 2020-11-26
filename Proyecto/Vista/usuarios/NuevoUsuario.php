<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro Nuevo</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="../../js/ValidarRegistroUsuario.js"></script>
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
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between" style="width: 100%;">
		<a class="navbar-brand" href="../../index.php">
			<img src="../../Iconos_o_Imagenes/laptop.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				Tienda Virtual
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
					<?php 
					if($_SESSION['userName'] == "")
					{
					?>
						<li class="nav-item">
							<a class="nav-link" href="../Login.php">Iniciar Sesion</a>
						</li>
						<?php
					}else{
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $_SESSION['userName']; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php if($_SESSION['idRol'] == '1') {?>
                            <a class="dropdown-item" href="Vista/administrador/Usuarios.php">Administrar Usuarios</a>
                            <?php } ?>
							<a class="dropdown-item" href="Vista/usuarios/CerrarSesion.php">Cerrar Sesión</a>
							</div>
						</li>
					<?php } ?>
						<li class="nav-item">
							<a class="nav-link" href="#">Ofertas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">¿Quienes Somos?</a>
						</li>
					</ul>
				</div>
				<form class="form-inline my-2 my-lg-0" action="" method="get">
					<input class="form-control mr-sm-2" name="nombreProducto" type="search" placeholder="Nombre Producto" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				</form>
				<a class="nav-link" href="#">
				<img src="../../Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
			</nav>
			<div class="text-center">
  				<img src="../../Iconos_o_Imagenes/laptop.png" class="rounded" height="200px" width="200px">
			</div>
			<br>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">Nombre</label>
			      <input type="text" class="form-control" id="nombre" name="nombre">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputPassword4">Apellido</label>
			      <input type="text" class="form-control" id="apellido" name="apellido">
			    </div>
			  </div>
			  <div class="form-row">
			  <div class="form-group col-md-6">
			  <label for="inputAddress">Tipo de Documento</label>
				<select id="tipDoc" class="form-control" name="tipDoc">
					<option value="1">Cedula Ciudadania</option>
					<option value="2">Cedula Extranjera</option>
					<option value="3">Tarjeta Identidad</option>
				</select>
				</div>	
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Número de Documento</label>
			    <input type="num" class="form-control" id="numDocu" name="numDocu" placeholder="Ej: 1245785474">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Email</label>
			    <input type="text" style="width: 100%;" class="form-control" id="email" name="email" placeholder="Ej: pepito@hotmail.com">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Contraseña</label>
			    <input type="password" style="width: 100%;" class="form-control" id="firstPassword" name="firstPassword" placeholder="">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Confirma tu contraseña</label>
			    <input type="password" style="width: 100%;" class="form-control" id="secondPassword" name="secondPassword" placeholder="">
			  </div>
			</div>
			<span id="mensajeError" style="color: red;"></span>
		<button type="button" onclick="verificarReg(nombre.value, apellido.value, tipDoc.value, numDocu.value, email.value, firstPassword.value, secondPassword.value)"  
		class="btn btn-primary">Registrar</button>
		<a href="../Login.php" style="background: red;" class="btn btn-primary">Cerrar</a>
</body>
</html>