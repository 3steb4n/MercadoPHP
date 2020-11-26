<?php
error_reporting(0);
session_start();
?>
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
    <script src="../../js/Pages.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Tienda Virtual</title>

  </head>
  <body>
    <?php
    $consultaProducto = "";
    if (isset($_POST['codigoProducto'])) {
        $codigoProducto = $_POST['codigoProducto'];
        $consultaProducto = "SELECT PRODUCTOS.NOMBRE_PRODUCTO, PRODUCTOS.DESCRIPCION_PRODUCTO, DETALLE_PRODUCTO.VALOR_PRODUCTO, CATEGORIAS.NOMBRE_CATEGORIA, PRODUCTOS.ID_PRODUCTO, DETALLE_PRODUCTO.FECHA_VENCIMIENTO,
        DETALLE_PRODUCTO.TALLA_PRODUCTO, DETALLE_PRODUCTO.PESO_PRODUCTO, DETALLE_PRODUCTO.MARCA_PRODUCTO, DETALLE_PRODUCTO.COLOR_PRODUCTO, DETALLE_PRODUCTO.VALOR_PRODUCTO,
        DETALLE_PRODUCTO.STOCK_PRODUCTO, DETALLE_PRODUCTO.RUTA_IMAGEN, PRODUCTOS.ID_PRODUCTO FROM PRODUCTOS, DETALLE_PRODUCTO, CATEGORIAS WHERE PRODUCTOS.ID_PRODUCTO = DETALLE_PRODUCTO.ID_PRODUCTO 
        and CATEGORIAS.ID_CATEGORIA = PRODUCTOS.ID_CATEGORIA and PRODUCTOS.ID_PRODUCTO = '$codigoProducto';";
        }else{
            header("Location: PaginaPrincipal.php");
        }
?>
    <?php
include "../../PHP/DatabaseConnection.php";
$connectionInstance = new DatabaseConnection();
$codProd = "";
$consultarCategorias = "SELECT NOMBRE_CATEGORIA FROM CATEGORIAS";
?>
	<div class="container">
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
                            <a class="dropdown-item" href="../administrador/Usuarios.php">Administrar Usuarios</a>
                            <?php } ?>
							<a class="dropdown-item" href="../usuarios/CerrarSesion.php">Cerrar Sesión</a>
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
            <?php
            $connectionDb = $connectionInstance->ConnectDatabase();
            if ($connectionDb) {
                if ($resultadosConsulta = mysqli_query($connectionDb, $consultaProducto)) {
                    if (mysqli_num_rows($resultadosConsulta) > 0) {
                        while ($filasDatosProductos = mysqli_fetch_array($resultadosConsulta)) {
                            ?>
            <div id="formularioActualizar">
                <div class="form-group">
                <form action="UpdateData.php" method="post" enctype="multipart/form-data">
                    <label for="exampleInputEmail1">Código del Producto</label>
                    <input type="text" req class="form-control" id="exampleInputEmail1" value="<?php echo $filasDatosProductos[13] ?>" disabled="disabled">
                    <br>
                    <label for="exampleInputEmail1">Nombre del Producto</label>
                    <input type="text" req class="form-control" id="exampleInputEmail1" name="nombreProducto" placeholder="*Nombre del Producto" value="<?php echo $filasDatosProductos[0] ?>" required>
                    <br>
                    <label for="exampleFormControlTextarea5">*Descripción del Producto</label>
                    <textarea class="form-control" id="exampleFormControlTextarea4" name="descripcionProducto" rows="3" required><?php echo $filasDatosProductos[1] ?></textarea>
                    <br>
                    <label for="exampleInputEmail1">*Categoria del Producto</label>
                    <br>
                    <select name="categoriaProducto" id="" value="sdsd">
                    <?php
                    if ($connectionDb) {
                        if ($resultadosConsulta = mysqli_query($connectionDb, $consultarCategorias)) {
                            if (mysqli_num_rows($resultadosConsulta) > 0) {
                                while ($filasDatosCategorias = mysqli_fetch_array($resultadosConsulta)) {
                                    ?>
                                    <option <?php if($filasDatosProductos[3] == $filasDatosCategorias[0]){?> selected="selected" <?php } ?> 
                                    value="<?php echo $filasDatosCategorias[0]; ?>"> <?php echo $filasDatosCategorias[0]; ?></option>
                                    <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Fecha de Vencimiento (Opcional)</label>
                    <br>
                    <input type="date" name="fechaVencimiento">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Talla del Producto (Opcional)</label>
                    <br>
                    <select name="tallaProducto" id="">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>
                        <option value="4XL">4XL</option>
                        <option value="2XS">2XS</option>
                        <option value="XS">XS</option>
                    </select>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Peso del Producto (En kilogramos)</label>
                    <br>
                    <input type="number" name="pesoProducto" value="<?php echo $filasDatosProductos[7]; ?>" class="form-control" id="exampleInputEmail1" placeholder="*Peso del producto"  required>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Marca del producto</label>
                    <br>
                    <input type="text" name="marcaProducto" value="<?php echo $filasDatosProductos[8]; ?>"  class="form-control" id="exampleInputEmail1" placeholder="*Marca del producto"  required>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Color del producto</label>
                    <br>
                    <input type="text" name="colorProducto" value="<?php echo $filasDatosProductos[9]; ?>"  class="form-control" id="exampleInputEmail1" placeholder="*Color del producto"  required> 
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Valor del Producto (En pesos Colombianos)</label>
                    <br>
                    <input type="number" name="valorProducto" value="<?php echo $filasDatosProductos[10]; ?>" class="form-control" id="exampleInputEmail1" placeholder="*Valor del Producto" required>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Cantidad disponible en inventario</label>
                    <br>
                    <input type="number" name="cantidadDisponible" value="<?php echo $filasDatosProductos[11]; ?>" class="form-control" id="exampleInputEmail1" placeholder="*Stock"  required>
                    <br>
                    <br>
                    <div class="container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen del Producto</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                    Buscar... <input type="file"  id="imgInp" name="cargarImagen">
                                    </span>
                                    </span>
                                    <input type="text" value="<?php echo $filasDatosProductos[12]; ?>" class="form-control" readonly>
                                </div>
                            <img src="../../Iconos_o_Imagenes/ProductoImagenes/<?php echo $filasDatosProductos[12]; ?>"  id='img-upload'/>
                            <input type="hidden" name="codigoProducto" value="<?php echo $filasDatosProductos[13]; $codProd = $filasDatosProductos[13];?>">
                        </div>
                    </div>
                    <?php
                            }
                        }
                    }
                    mysqli_close($connectionDb);
                }
            ?>
                </div>
                <br>
                <?php if($_SESSION['idRol'] == 1){ ?>
                <button type="submit" class="btn btn-info">Actualizar Producto</button>
                <?php } ?>
                </form>
                <br>
                <?php if($_SESSION['idRol'] == 1){ ?>
                <form action="DeleteData.php" method="post">
                <input type="hidden" name="codigoProducto" value="<?php echo $codProd;?>">
                <button type="submit" name="eliminarProducto" class="btn btn-danger">Eliminar Producto</button>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
  </body>
</html>