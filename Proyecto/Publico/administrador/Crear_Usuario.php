<?php


?>
<!DOCTYPE html>
<html>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<head>
	<title>Crear Nuevo Usuario</title>
</head>
		<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img src="../../Iconos_o_Imagenes/laptop.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				Tienda Virtual
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="Usuarios.php">Usuarios</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Compras</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Productos
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#">Licoleria</a>
								<a class="dropdown-item" href="#">Frutas y Verduras</a>
								<a class="dropdown-item" href="#">Pasteleria</a>
								<a class="dropdown-item" href="#">Para el hogar</a>
								<a class="dropdown-item" href="#">.....</a>
							</div>
						</li>
					</ul>
				</div>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Nombre Producto" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				</form>
				<a class="nav-link" href="#">
				<img src="../../Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
			</nav>
			<br>
		</div>

		<div class="container-sm p-3 mb-2 bg-secondary text-black border border-primary rounded">
				<div class="container-sm p-3 mb-2 bg-secondary text-white align-middle" >
					<h1>Nuevo Usuario</h1>
				</div>
				
				
				<form id ="nuevo" name="nuevo" method="POST" action="Guardar_usuarios.php" autocomplete="off">
				<div class="form-group">
					Nombre: <input type="text" class="form-control" id="nombre" name="nombre">
				</div>
				<div class="form-group">
					Apellido: <input type="text" class="form-control" id="apellido" name="apellido">
				</div>
				<div class="form-group">
				Tipo Documneto: <select id="tipodocumento"  class="form-control" name="tipodocumento">
					<option value="1">Cedula Ciudadania</option>
					<option value="2">Cedula Extranjera</option>
					<option value="3">Tarjeta Identidad</option>
				</select>
				</div>
				<div class="form-group">
					Numero Documento: <input type="number" class="form-control" id="ndocumento" name="ndocumento"><br/>
				</div>
				<div class="form-group">
					Usuario: <input type="text" class="form-control" id="usuario" name="usuario"><br/>
				</div>
				<div class="form-group">
					Clave: <input type="password" class="form-control" id="clave" name="clave"><br/>
				</div>
				<div class="form-group">
					Direccion: <input type="text" class="form-control" id="dirreccion" name="direccion"><br/>
				</div>
				<div class="form-group">
					Telefono: <input type="tel" class="form-control" id="telefono" name="telefono"><br/>
				</div>
				<div class="form-group">
					Celular: <input type="tel" class="form-control" id="celular" name="celular"><br/>
				</div>
				<div class="form-group">
					Email: <input type="text"  class="form-control" id="email" name="email"><br/>
				</div>
				<div class="form-group">
					Fecha Nacimiento: <input type="date"  class="form-control" id="fecha" name="fecha"><br/>
				</div>	
				<div class="form-group">
				Ciudad: <select class="form-control" id="ciudad" name="ciudad">
					<option value="1">bogota</option>
					<option value="2">Colon</option>
					<option value="3">medellin</option>
				</select>
				</div>
				<div class="form-group">
				Rol: <select class="form-control" id="rol" name="rol">
					<option value="1">Activo</option>
					<option value="2">Inactivo</option>
					<option value="3">Bloqueado</option>
				</select>
				</div>
				<div class="form-group">
				<button id="guardar" name ="guardar" class="btn btn-info" type ="submit">Guardar</button>
				</div>
				</form>
			</div>>
		</body>
</html>