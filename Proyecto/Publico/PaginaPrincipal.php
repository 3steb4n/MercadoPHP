<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="../Iconos_o_Imagenes/css/index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <title>Tienda Virtual</title>
  </head>
  <body>
	  <?php
	  require '../PHP/DatabaseConnection.php'; //se realiza instancia con el archivo de conexion
	  $connectionInstance = new DatabaseConnection();
	  $consultaProductos = "SELECT DETALLE_PRODUCTO.RUTA_IMAGEN, PRODUCTOS.NOMBRE_PRODUCTO, PRODUCTOS.DESCRIPCION_PRODUCTO, DETALLE_PRODUCTO.VALOR_PRODUCTO, 
	  CATEGORIAS.NOMBRE_CATEGORIA, PRODUCTOS.ID_PRODUCTO FROM PRODUCTOS, DETALLE_PRODUCTO, CATEGORIAS WHERE PRODUCTOS.ID_PRODUCTO = DETALLE_PRODUCTO.ID_PRODUCTO and CATEGORIAS.ID_CATEGORIA = PRODUCTOS.ID_CATEGORIA and 
	  PRODUCTOS.ID_ESTADO = 1;";
	  if(isset($_GET['nombreProducto'])){
		$nombreProducto = $_GET['nombreProducto'];
		if($nombreProducto == ""){
		  $consultaProductos = "SELECT DETALLE_PRODUCTO.RUTA_IMAGEN, PRODUCTOS.NOMBRE_PRODUCTO, PRODUCTOS.DESCRIPCION_PRODUCTO, DETALLE_PRODUCTO.VALOR_PRODUCTO, 
		  CATEGORIAS.NOMBRE_CATEGORIA, PRODUCTOS.ID_PRODUCTO FROM PRODUCTOS, DETALLE_PRODUCTO, CATEGORIAS WHERE PRODUCTOS.ID_PRODUCTO = DETALLE_PRODUCTO.ID_PRODUCTO and CATEGORIAS.ID_CATEGORIA = PRODUCTOS.ID_CATEGORIA and 
	      PRODUCTOS.ID_ESTADO = 1;";
		}else{
		  $consultaProductos = "SELECT DETALLE_PRODUCTO.RUTA_IMAGEN, PRODUCTOS.NOMBRE_PRODUCTO, PRODUCTOS.DESCRIPCION_PRODUCTO, DETALLE_PRODUCTO.VALOR_PRODUCTO, 
		  CATEGORIAS.NOMBRE_CATEGORIA, PRODUCTOS.ID_PRODUCTO  FROM PRODUCTOS, DETALLE_PRODUCTO, CATEGORIAS WHERE PRODUCTOS.NOMBRE_PRODUCTO = '$nombreProducto' 
		  and PRODUCTOS.ID_PRODUCTO = DETALLE_PRODUCTO.ID_PRODUCTO and CATEGORIAS.ID_CATEGORIA = PRODUCTOS.ID_CATEGORIA and PRODUCTOS.ID_ESTADO = 1;";
		}
	  }
	  $connectionDb = $connectionInstance -> ConnectDatabase();
	  ?>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img src="../Iconos_o_Imagenes/laptop.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				Tienda Virtual
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Iniciar Sesion</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Ofertas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">¿Quienes Somos?</a>
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
				<form class="form-inline my-2 my-lg-0" action="" method="get">
					<input class="form-control mr-sm-2" name="nombreProducto" type="search" placeholder="Nombre Producto" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				</form>
				<a class="nav-link" href="#">
				<img src="../Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
			</nav>
			<div id="contenidoProductos">
			<?php
				if($connectionDb){
					if($resultadosConsulta = mysqli_query($connectionDb, $consultaProductos)){
						if(mysqli_num_rows($resultadosConsulta) > 0){
							while($filasDatos = mysqli_fetch_array($resultadosConsulta)){
								$valorDecimal = number_format($filasDatos[3], 2);
								?>
								<div id="div_productos">
								<img src="../Iconos_o_Imagenes/ProductoImagenes/<?php echo $filasDatos[0] ?>" width="100%" height="200px">
								<br>
								<br>
								<div style="margin: auto; right: 0; left: 0;">
								    <span style="color: #244fd1; font-weight: bold; font-size: 20px; text-align: center;"><?php echo $filasDatos[1] ?></span>
									<br>
									<span><?php echo $filasDatos[4] ?> </span>
								    <br>
								    <span style="font-weight: bold; font-size:15px;">$<?php echo $valorDecimal ?></span>
								</div>
								<br>
								<br>
								<a href="#" class="btn btn-info btn-lg">
									<span class="glyphicon glyphicon-shopping-cart" type="submit"></span> Agregar al carrito
								</a>
								<br>
								<br>
								<form action="ActualizarProductos.php" method="post" class="btn btn-info btn-lg">
									<input type="hidden" name="codigoProducto" value="<?php echo $filasDatos[5]; ?>">
									<button type="submit" class="btn btn-info">Editar</button>
								</form>
								</div>
								<?php
							}
						}else{
							?>
							<div style="width: 65%; padding: 10px;">
							<img src="../Iconos_o_Imagenes/css/Error.png" alt="" srcset="">
							<div style="float: right;">
							<h1>No hay resultados</h1>
							</div>
							</div>
							<?php
						}
					}
				}
			?>
			<br>
			</div>
		</div>
  </body>
</html>