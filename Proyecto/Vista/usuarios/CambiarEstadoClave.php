<?php
class CambiarEstadoClave{
    public function UpdateState($email){
        include '../../PHP/DatabaseConnection.php';
        $connectionInstance = new DatabaseConnection();
        $connectionDb = $connectionInstance->ConnectDatabase();
        $actualizarClave = "UPDATE USUARIOS SET ESTADO_CLAVE = '1' WHERE EMAIL_USUARIO = '$email' ";
        if ($connectionDb) {
            if ($resultadoUpdateProd = mysqli_query($connectionDb, $actualizarClave)) {
                echo "Hemos enviado un enlace para restablecer la contraseña a su email: $email. Si no lo recibes en unos minutos, revisa tu carpeta de spam.";
            }
        }
    }
}
?>