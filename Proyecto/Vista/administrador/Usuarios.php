<?php



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<title>Usuarios</title>
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
<div class="card container mx-auto" >
	<div class="card-header">
		<h2 align="center">Usuarios</h2>

	</div>
	<div class="card-body">
		<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped" border="1" width="80%">
					<thead class="thead-light">
						<th scope="col">Nombre</th>
						<th scope="col">Apellido</th>
						<th scope="col">Tipo Documento</th>
						<th scope="col">Numero Documento</th>
						<th scope="col">Usuario</th>
						<th scope="col">Contrasena</th>
						<th scope="col">Direccion</th>
						<th scope="col">Telefono</th>
						<th scope="col">Celular</th>
						<th scope="col">Email</th>
						<th scope="col">Fecha Reguistro</th>
						<th scope="col">Fecha Nacimiento</th>
						<th scope="col">Ciudad</th>
						<th scope="col">Rol</th>
						<th scope="col">Estado</th>
						<th scope="row">Fecha Modificacion</th>
						<th scope="col">Editar</th>
						<th scope="row">Eliminar</th>
					</thead>

					<tbody>
						<?php
						require_once "../../PHP/DatabaseConnection.php";

						
						$sql = "SELECT * FROM USUARIOS";
						$db = DatabaseConnection::ConnectDatabase();
						$resultado = mysqli_query($db,$sql);

						if($resultado){
							while($row = mysqli_fetch_array($resultado)){
								$id = $row["ID_USUARIO"];
								$nombre = $row["NOMBRE_USUARIO"];
								$apellido = $row["APELLIDO_USUARIO"];
								$tipodoc = $row["ID_TIP_DOC"];
								$ndocumento = $row["DOCUMENTO_USUARIO"];
								$usuario = $row["USUARIO"];
								$clave = $row["CLAVE"];
								$direccion = $row["DOMICILIO_USUARIO"];
								$telefono =$row["TELEFONO_USUARIO"];
								$celular =$row["CELULAR_USUARIO"];
								$email =$row["EMAIL_USUARIO"];
								$fechar =$row["FECHA_REGISTRO"];
								$fechan = $row["FECHA_NACIMIENTO"];
								$ciudad =$row["ID_CIUDAD"];
								$rol =$row["ID_ROL"];
								$estado =$row["ID_ESTADO"];
								$fecham =$row["FECHA_MODIFICACION"];
								?>
							<tr>
								<td><?php echo $nombre; ?></td>
								<td><?php echo $apellido; ?></td>
								<td><?php echo $tipodoc ?></td>
								<td><?php echo $ndocumento ?></td>
								<td><?php echo $usuario ?></td>
								<td><?php echo $clave ?></td>
								<td><?php echo $direccion ?></td>
								<td><?php echo $telefono ?></td>
								<td><?php echo $celular ?></td>
								<td><?php echo $email ?></td>
								<td><?php echo $fechar ?></td>
								<td><?php echo $fechan ?></td>
								<td><?php echo $ciudad ?></td>
								<td><?php echo $rol ?></td>
								<td><?php echo $estado ?></td>
								<td><?php echo $fecham ?></td>
								<td> <a class="btn btn-outline-success"  role="button" href="Editar_usuario.php?ID_USUARIO=<?php echo $row['ID_USUARIO']?>" > Editar </a> </td>   
	                	  <td> <a  class="btn btn-outline-danger"  role="button"  href="Eliminar_usuario.php?ID_USUARIO=<?php echo $row['ID_USUARIO']?>" > Borrar </a> </td>   
							</tr>
							<?php
							}
						}
						?>							
					</tbody>
				</table>
					<a  class="btn btn-primary" role="button" href="Crear_Usuario.php">Agregar</a>
						
				</div>
			</div>
		</div>
				


				
				
		</body>
</html>