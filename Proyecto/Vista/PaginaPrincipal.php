<?php
error_reporting(0);
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
  <style>
  .carousel-item {
  height: 50vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="Iconos_o_Imagenes/css/index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <title>Tienda Virtual</title>
  </head>
  <body>
	  <?php
	  require 'PHP/DatabaseConnection.php'; //se realiza instancia con el archivo de conexion
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
		  CATEGORIAS.NOMBRE_CATEGORIA, PRODUCTOS.ID_PRODUCTO  FROM PRODUCTOS, DETALLE_PRODUCTO, CATEGORIAS WHERE PRODUCTOS.NOMBRE_PRODUCTO LIKE '%$nombreProducto%'
		  and PRODUCTOS.ID_PRODUCTO = DETALLE_PRODUCTO.ID_PRODUCTO and CATEGORIAS.ID_CATEGORIA = PRODUCTOS.ID_CATEGORIA and PRODUCTOS.ID_ESTADO = 1;";
		}
	  }
	  $connectionDb = $connectionInstance -> ConnectDatabase();
	  ?>
	<div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between" style="position: fixed; z-index: 1000; width: 100%;">
		<a class="navbar-brand" href="index.php">
			<img src="Iconos_o_Imagenes/laptop.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
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
							<a class="nav-link" href="Vista/Login.php">Iniciar Sesion</a>
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
				<img src="Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
			</nav>
			<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://i.linio.com/cms/ad9d5b9e-2b34-11eb-a850-6e42975fe331.webp')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://dynamic-yield.linio.com//api/scripts/8767555/images/18ec6617aa4b5__BB2_OU.jpg')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://i.linio.com/cms/ad9d5b9e-2b34-11eb-a850-6e42975fe331.webp')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>
			<div id="contenidoProductos">
			<?php
				if($connectionDb){
					if($resultadosConsulta = mysqli_query($connectionDb, $consultaProductos)){
						if(mysqli_num_rows($resultadosConsulta) > 0){
							while($filasDatos = mysqli_fetch_array($resultadosConsulta)){
								$valorDecimal = number_format($filasDatos[3], 2);
								?>
								<div id="div_productos">
								<img src="Iconos_o_Imagenes/ProductoImagenes/<?php echo $filasDatos[0] ?>" width="300px" height="230px">
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
								<?php if($_SESSION['idRol'] == 1){ ?>
								<form action="Vista/productos/ActualizarProductos.php" method="post" class="btn btn-info btn-lg">
									<input type="hidden" name="codigoProducto" value="<?php echo $filasDatos[5]; ?>">
									<button type="submit" class="btn btn-info">Editar</button>
								</form>
								<?php }else if($_SESSION['idRol'] != 1){ ?>
									<form action="Vista/productos/ActualizarProductos.php" method="post" class="btn btn-info btn-lg">
									<input type="hidden" name="codigoProducto" value="<?php echo $filasDatos[5]; ?>">
									<button type="submit" class="btn btn-info">Ver detalles</button>
								</form>
								<?php } ?> 
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
		<div id="categoriasProductos" class="categoriasProductos" style="float: right; height: 50vh; width: 300px; padding: 20px;">
		<div style="border: 1px solid black; padding: 10px;">
		<h1>Categorias</h1>
		<?php
		$consultaCategorias = "SELECT NOMBRE_CATEGORIA FROM CATEGORIAS";
		if($connectionDb){
			if($resultadosConsultaCate = mysqli_query($connectionDb, $consultaCategorias)){
				if(mysqli_num_rows($resultadosConsultaCate) > 0){
					while($filasDatos = mysqli_fetch_array($resultadosConsultaCate)){
						?>
						<label for=""><?php echo $filasDatos[0]?></label>
						<br>
						<?php
					}
				}
			}
		}
		?>
		</div>
		</div>
		   <section>
       <?php

          if (isset($_GET["accion"])) {
          	$MVC_MOD = NEW Controlador;
          	$MVC_MOD -> f_EnlacesPaginasControlador();
          }
          
       ?>   
   </section>
  </body>
</html>