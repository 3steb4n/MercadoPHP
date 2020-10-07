<?php
class DatabaseConnection{
    public function ConnectDatabase(){
        $server = "localhost";
        $dataBase = "root";
        $userNameDataBase = "Qwerty123*";
        $passwordDataBase = "";

        $connectDataBase = mysqli_connect($server, $userNameDataBase, $passwordDataBase, $dataBase);

        if(!$connectDataBase){
            echo "Error al realizar la conexion con la base de datos: \n" . mysqli_connect_error($connectDataBase);

        }else{
            echo "Yes";
        }

        return $connectDataBase;
    }
}
?>