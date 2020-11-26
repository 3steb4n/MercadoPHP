<?php
error_reporting(0);
session_start();
?>
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between" style="width: 100%;">
		<a class="navbar-brand" href="../index.php">
			<img src="../Iconos_o_Imagenes/laptop.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
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
							<a class="nav-link" href="Login.php">Iniciar Sesion</a>
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
				<img src="../Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
			</nav>
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
		  <br>
		  <a href="usuarios/FormularioOlvidoClave.php">¿Olvidó su Contraseña?</a>
		  <br>
		  <br>
		  <span id="mensaje" style="color: red;"></span>
	      <button type="button" onclick="verificarLog(email.value, password.value)" class="btn btn-primary">Ingresar</button>
		  <span>o</span>
	      <a href="usuarios/NuevoUsuario.php" class="btn btn-primary">Registrate</a>
	    </form>

	  </div>
	</div>	
</body>
</html>