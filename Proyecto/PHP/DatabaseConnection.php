<?php
class DatabaseConnection{
    public function ConnectDatabase(){
        $server = "localhost";
        $dataBase = "virtualmarket";
        $userNameDataBase = "root";
        $passwordDataBase = "Qwerty123*";

        $connectDataBase = mysqli_connect($server, $userNameDataBase, $passwordDataBase, $dataBase);

        if(!$connectDataBase){
            echo "Error al realizar la conexion con la base de datos - : \n" . mysqli_connect_error($connectDataBase);

        }else{
            echo "Yes";
        }

        return $connectDataBase;
    }
}
?>