<?php
 
 include '../../PHP/DatabaseConnection.php';
 $connectionInstance = new DatabaseConnection();
 $db = $connectionInstance->ConnectDatabase();




  if (isset($_POST['update']))
    {
      $id = $_POST['id'];
  	  $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $tipodocumento = $_POST['tipodocumento'];
      $numerodocumento = $_POST['ndocumento'];
      $usuario = $_POST['usuario'];
      $clave = sha1($_POST['clave']);
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $celular = $_POST['celular'];
      $email = $_POST['email'];
      $fechanacimiento = $_POST['fecha'];
      $ciudad = $_POST['ciudad'];
      $rol = $_POST['rol'];
      $estado = $_POST['estado'];
    }
    echo "$id"."</br>";
    echo "$nombre"."</br>";
    echo "$apellido"."</br>";
    echo "$tipodocumento"."</br>";
    echo "$numerodocumento"."</br>";
    echo "$usuario"."</br>";
    echo "$clave"."</br>";
    echo "$direccion"."</br>";
    echo "$telefono"."</br>";
    echo "$celular"."</br>";
    echo "$email"."</br>";
    echo "$fechanacimiento"."</br>";
    echo "$ciudad"."</br>";
    echo "$rol"."</br>";
    echo "$estado"."</br>";

    $query = "UPDATE USUARIOS SET ID_TIP_DOC= $tipodocumento WHERE ID_USUARIO = $id";
     echo "$query";
    $resultado = mysqli_query($db,$query);
    if (!$resultado) {
    	die("consulta fallo");
    }
    	
   header("location:Usuarios.php"); 
?>