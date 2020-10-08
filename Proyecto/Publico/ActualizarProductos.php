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
    <script src="../js/Pages.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Tienda Virtual</title>

  </head>
  <body>
    <?php
if (isset($_POST['codigoProducto'])) {
    echo $_POST['codigoProducto'];
    $consultaProducto = "";
} else {
    header("Location: PaginaPrincipal.php");
}
?>
    <?php
include "../PHP/DatabaseConnection.php";
$connectionInstance = new DatabaseConnection();
$consultarCategorias = "SELECT NOMBRE_CATEGORIA FROM CATEGORIAS";
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
				<form class="form-inline my-2 my-lg-0" action="PaginaPrincipal.php" method="get">
					<input class="form-control mr-sm-2" name="nombreProducto" type="search" placeholder="Nombre Producto" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				</form>
				<a class="nav-link" href="#">
				<img src="../Iconos_o_Imagenes/carro.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
				</a>
            </nav>
            <div id="formularioActualizar">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="*Nombre del Producto">
                    <br>
                    <label for="exampleFormControlTextarea5">*Descripción del Producto</label>
                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                    <br>
                    <label for="exampleInputEmail1">*Categoria del Producto</label>
                    <br>
                    <select name="" id="">
                    <?php
                    $connectionDb = $connectionInstance->ConnectDatabase();
                    if ($connectionDb) {
                        if ($resultadosConsulta = mysqli_query($connectionDb, $consultarCategorias)) {
                            if (mysqli_num_rows($resultadosConsulta) > 0) {
                                while ($filasDatos = mysqli_fetch_array($resultadosConsulta)) {
                                    ?>
                                    <option value="<?php echo $filasDatos[0]; ?>"><?php echo $filasDatos[0]; ?></option>
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
                    <input type="date" name="Fecha de Vencimiento">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Talla del Producto (Opcional)</label>
                    <br>
                    <select name="" id="">
                        <option value="">S</option>
                        <option value="">M</option>
                        <option value="">L</option>
                        <option value="">XL</option>
                        <option value="">2XL</option>
                        <option value="">2XL</option>
                        <option value="">4XL</option>
                        <option value="">2XS</option>
                        <option value="">XS</option>
                    </select>
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Peso del Producto (En kilogramos)</label>
                    <br>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="*Peso del producto">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Marca del producto</label>
                    <br>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="*Marca del producto">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Color del producto</label>
                    <br>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="*Color del producto">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Valor del Producto (En pesos Colombianos)</label>
                    <br>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="*Valor del Producto">
                    <br>
                    <br>
                    <label for="exampleInputEmail1">Cantidad disponible en inventario</label>
                    <br>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="*Stock">
                    <br>
                    <br>
                    <div class="container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen del Prodcuto</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                    Buscar... <input type="file" id="imgInp">
                                    </span>
                                    </span>
                                    <input type="text" value="<?php echo $_POST['codigoProducto']; ?>" class="form-control" readonly>
                                </div>
                            <img src="../Iconos_o_Imagenes/ProductoImagenes/<?php echo $_POST['codigoProducto']; ?>"  id='img-upload'/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
  </body>
</html>