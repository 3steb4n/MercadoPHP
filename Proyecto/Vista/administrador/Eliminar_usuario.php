<?php
include '../../PHP/DatabaseConnection.php';
$connectionInstance = new DatabaseConnection();
$db = $connectionInstance->ConnectDatabase();

 if (isset($_GET['ID_USUARIO']))
    {
     $id = $_GET['ID_USUARIO'];
    }

    $query = "DELETE FROM USUARIOS WHERE ID_USUARIO = $id";
     echo "$query";
    $resultado = mysqli_query($db,$query);
    if (!$resultado) {
    	die("consulta fallo");
    }
    	
   header("location:Usuarios.php"); 
?>