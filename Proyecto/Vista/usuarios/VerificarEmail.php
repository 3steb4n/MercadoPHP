<?php
 include '../../PHP/DatabaseConnection.php';
 $connectionInstance = new DatabaseConnection();
 $connectionDb = $connectionInstance->ConnectDatabase();
 $email = $_GET['email'];
 $clave = $_GET['clave'];
 $queryDataBase = "SELECT USUARIO FROM USUARIOS WHERE EMAIL_USUARIO='$email'";

 if($connectionDb){
     if($queryMysqli = mysqli_query($connectionDb, $queryDataBase)){
         if(mysqli_num_rows($queryMysqli) > 0){
             include 'CambiarClave.php';
             $classInstanceUpdate = new CambiarClave();
             $functionInstanceUpdate = $classInstanceUpdate->UpdatePassword($email, $clave, $connectionDb);  
         }else{
             echo "Error del sistema.";
         }
     }
 }
?>