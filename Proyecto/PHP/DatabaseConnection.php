<?php
class DatabaseConnection{
    public function ConnectDatabase(){
        $server = "localhost";
        $dataBase = "virtualmarket";
        $userNameDataBase = "root";
        $passwordDataBase = "1q2w3e4r";

        $connectDataBase = mysqli_connect($server, $userNameDataBase, $passwordDataBase, $dataBase);

        if(!$connectDataBase){
            echo "Error al realizar la conexion con la base de datos - : \n" . mysqli_connect_error($connectDataBase);
        }  
        return $connectDataBase;
    }
}
?>