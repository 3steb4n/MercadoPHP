<?php

include '../../PHP/DatabaseConnection.php';
$connectionInstance = new DatabaseConnection();
$connectionDb = $connectionInstance->ConnectDatabase();

$fechaActual = "2020-09-22 ";
$rolUser = 2;
$firstName = $_GET['name'];
$secondName = $_GET['secondName'];
$tipDocu = $_GET['tipDocu'];
$numberDocument = $_GET['numDocument'];
$emailUser =  $_GET['email'];
$passwordUser = sha1($_GET['pass']);
$insertQuery = "INSERT INTO USUARIOS(NOMBRE_USUARIO, APELLIDO_USUARIO, ID_TIP_DOC, DOCUMENTO_USUARIO, USUARIO, CLAVE, EMAIL_USUARIO, FECHA_REGISTRO, ID_ESTADO, ID_ROL) 
values ('$firstName', '$secondName', $tipDocu, $numberDocument, '$emailUser', '$passwordUser', '$emailUser', '$fechaActual', 1 , 2)";
$selectQuery = "SELECT * FROM USUARIOS WHERE EMAIL_USUARIO = '$emailUser'";

if($connectionDb){
  if($queryMysqli = mysqli_query($connectionDb, $selectQuery)){
      if(mysqli_num_rows($queryMysqli) > 0){
        echo "Error. Ya hay un usuario registrado con ese email.";
      }else{
        if(mysqli_query($connectionDb, $insertQuery)){
          echo "Usuario registrado correctamente!";
        }else{
          echo "Error interno del sistema";
        }
      }
  }
}

?>