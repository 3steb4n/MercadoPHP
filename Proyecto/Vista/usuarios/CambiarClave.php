<?php
class CambiarClave{
    public function UpdatePassword($email, $password, $connectionDb){
        $clave = sha1($password);
        $connectionInstance = new DatabaseConnection();
        $connectionInstanceDb = $connectionDb;
        $actualizarClave = "UPDATE USUARIOS SET CLAVE = '$clave' WHERE EMAIL_USUARIO = '$email' ";
        if ($connectionInstanceDb) {
            if ($resultadoUpdateProd = mysqli_query($connectionInstanceDb, $actualizarClave)) {
                echo "La clave de su cuenta se cambió satisfactoriamente.";
            }else{
                echo "Error interno.";
            }
        }
    }
}
?>