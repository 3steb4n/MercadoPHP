<?php
 
include '../PHP/DatabaseConnection.php';
$connectionInstance = new DatabaseConnection();
$db = $connectionInstance->ConnectDatabase();

  $fechaActual = date("Y-m-d H:i:s");
  $rol = 2;
  if (isset($_POST['guardar']))
    {
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
    }

    echo "$nombre";
    echo "$apellido";
    echo "$tipodocumento";
    echo "$numerodocumento";
    echo "$usuario";
    echo "$clave";
    echo "$direccion";
    echo "$telefono";
    echo "$celular";
    echo "$email";
    echo "$fechanacimiento";
    echo "$ciudad";
    echo "$rol";
    echo "$fechaActual";

    $query = "INSERT INTO USUARIOS(NOMBRE_USUARIO,APELLIDO_USUARIO,ID_TIP_DOC,DOCUMENTO_USUARIO,USUARIO,CLAVE,DOMICILIO_USUARIO,TELEFONO_USUARIO,CELULAR_USUARIO,EMAIL_USUARIO,FECHA_REGISTRO,FECHA_NACIMIENTO,ID_CIUDAD,ID_ROL,ID_ESTADO,FECHA_MODIFICACION) values ('$nombre','$apellido',$tipodocumento,$numerodocumento,'$usuario','$clave','$direccion',$telefono,$celular,'$email','$fechaActual','$fechanacimiento',$ciudad,$rol,1,'0000-00-00 00:00:00')";
    // echo "$query";
    $resultado = mysqli_query($db,$query);
    if (!$resultado) {
    	die("consulta fallo");
    }	
    header("location:../index.php")
?>