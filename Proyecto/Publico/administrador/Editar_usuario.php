<?php
require_once "../../PHP/DatabaseConnection.php";
    $db = DatabaseConnection::ConnectDatabase();

 if (isset($_GET['ID_USUARIO']))
    {
  	 $id = $_GET['ID_USUARIO'];
    }

    $query = "SELECT * FROM USUARIOS WHERE ID_USUARIO = $id";
    
    $resultado = mysqli_query($db,$query);

    if (mysqli_num_rows($resultado) == 1) {

    	$row = mysqli_fetch_array($resultado);
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
                $fechan = $row["FECHA_NACIMIENTO"];
                $ciudad =$row["ID_CIUDAD"];
                $rol =$row["ID_ROL"];
                $estado =$row["ID_ESTADO"];
              
    } 
    	
   /*header("location:estados.php"); */
?>

<html>
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<title> Usuarios</title>
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
<div class="container-xl border border-success rounded p-3 mb-2 bg-success text-white">
    <div class="container-sm p-3 mb-2 bg-primary text-white" >
      <h2 align="center">Editar Usuario</h2>
    </div>
    <div class="container-xl" align="center">
        <form id ="nuevo" name="nuevo" method="POST" action="Update_usuario.php" autocomplete="off">
          <br/>
        <div class="container-sm">
        Id <input type="text" id="id" class="form-control" name="id" value=<?php echo $id?> ><br/> 
         </div>
        <div class="container-sm"> 
        Nombre: <input type="text" id="nombre" class="form-control" name="nombre" value=<?php echo $nombre?>><br/>
        </div>  
        <div class="container-sm">
        Apellido: <input type="text" id="apellido" class="form-control" name="apellido" value=<?php echo $apellido?>><br/>
        </div>
        <div class="container-sm">
        Tipo Documneto: <select id="tipodocumento" class="form-control" name="tipodocumento">
          <option value="1">Cedula Ciudadania</option>
          <option value="2">Cedula Extranjera</option>
          <option value="3">Tarjeta Identidad</option>
        </select>
        </div>
        <div class="container-sm">
          Numero Documento: <input type="number" id="ndocumento" class="form-control" name="ndocumento" value=<?php echo $ndocumento?>><br/>
        </div>
        <div class="container-sm">
          Usuario: <input type="text" id="usuario" class="form-control" name="usuario" value=<?php echo $usuario?>><br/>
         </div>
        <div class="container-sm">
        Clave: <input type="password" id="clave" class="form-control" name="clave" value=<?php echo $clave?>><br/>
        </div> 
        <div class="container-sm">
        Direccion: <input type="text" id="dirreccion" class="form-control" name="direccion" value=<?php echo $direccion?>><br/>
        </div> 
        <div class="container-sm">
        Telefono: <input type="tel" id="telefono" class="form-control" name="telefono" value=<?php echo $telefono?>><br/>
        </div> 
        <div class="container-sm">
        Celular: <input type="tel" id="celular" class="form-control" name="celular" value=<?php echo $celular?>><br/>
        </div> 
        <div class="container-sm">
        Email: <input type="text" id="email" class="form-control" name="email" value=<?php echo $email?>><br/>
        </div> 
        <div class="container-sm">
        Fecha Nacimiento: <input type="date" class="form-control" id="fecha" name="fecha" value=<?php echo $fechan?>><br/>
        </div> 
        <div class="container-sm">
        Ciudad: <select id="ciudad" name="ciudad" class="form-control">
          <option value="1">bogota</option>
          <option value="2">Colon</option>
          <option value="3">medellin</option>
        </select>
        <div class="container-sm">
        Rol: <select id="rol" class="form-control" name="rol" >
          <option value="1">administrador</option>
          <option value="2">cliente</option>
        </select>
        </div>
        <div class="container-sm">
        Estado: <select id="estado" name="estado" class="form-control">
          <option value="1">Activo</option>
          <option value="2">Inactivo</option>
        </select>
        </div>
        <div class="container-sm">
          <br/>
        <button id="guardar" name ="update" class="btn btn-warning" type ="submit" value="Modificar">Modificar</button>
      </div>
        </form>
        </div>
  </div>
</body>
</html>

