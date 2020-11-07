<?php?>
<!DOCTYPE html>
<html>
<head>
	<title>Reguistro Nuevo</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="../js/ValidarUsuario.js"></script>
</head>
<body>
	<form method="POST" action="Reguistro.php">
		<div class="container-sm">
			<div class="text-center">
  				<img src="../Iconos_o_Imagenes/laptop.png" class="rounded" height="200px" width="200px">
			</div>
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
				Tipo Documento: <select id="tipodocumento"  class="form-control" name="tipodocumento">
					<option value="1">Cedula Ciudadania</option>
					<option value="2">Cedula Extranjera</option>
					<option value="3">Tarjeta Identidad</option>
				</select>
				</div>	
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Numero de Documento</label>
			    <input type="num" class="form-control" id="ndocumento" name="ndocumento" placeholder="ejemplo123">
			  </div>
				 <div class="form-group col-md-6">
					Telefono: <input type="tel" class="form-control" id="telefono" name="telefono"><br/>
				</div>
				<div class="form-group col-md-6">
					Celular: <input type="tel" class="form-control" id="celular" name="celular"><br/>
				</div>
			<div class="form-group col-md-6" >
			    <label for="inputAddress2">Direccion</label>
			    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle 50 sur no 12-40">
			  </div>
			  <div class="form-group col-md-6">
				Ciudad: <select class="form-control" id="ciudad" name="ciudad">
					<option value="1">bogota</option>
					<option value="2">Colon</option>
					<option value="3">medellin</option>
				</select>
				</div>
				
			</div>
			<div class="form-group">
					Email: <input type="text"  class="form-control" id="email" name="email"><br/>
				</div>
			<div class="form-group">
					Fecha Nacimiento: <input type="date"  class="form-control" id="fecha" name="fecha"><br/>
			</div>	
			  <button type="submit" id="guardar" name ="guardar" class="btn btn-primary btn-lg btn-block">Reguistrar</button>
		</div>
	</form>

</body>
</html>