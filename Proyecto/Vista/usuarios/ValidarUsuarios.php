<?php
    error_reporting(0);
    session_start();
    include '../../PHP/DatabaseConnection.php';
    $connectionInstance = new DatabaseConnection();
    $connectionDb = $connectionInstance->ConnectDatabase();
    $user = $_GET['usuario'];
    $passwordUser = sha1($_GET['pass']);
    $queryDataBase = "SELECT USUARIO, ID_ROL FROM USUARIOS WHERE USUARIO='$user' and CLAVE='$passwordUser'";

    if($connectionDb){
        if($queryMysqli = mysqli_query($connectionDb, $queryDataBase)){
            if(mysqli_num_rows($queryMysqli) > 0){
                while($userData = mysqli_fetch_array($queryMysqli)){
                    $_SESSION['userName'] = $userData[0];
                    $_SESSION['idRol'] = $userData[1];
                }
            }else{
                echo "Error. El usuario no existe o está incorrecto.";
            }
        }
    }
?>