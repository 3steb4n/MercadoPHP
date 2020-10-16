<?php
if(isset($_POST['codigoProducto'])){
    $datosProductos = [
        "codigoProducto" => $_POST['codigoProducto']
    ];

    include "DatabaseConnection.php";
    $codigoCategoria = "";
    echo $datosProductos['categoriaProducto'];
    $connectionInstance = new DatabaseConnection();
    $connectionDb = $connectionInstance->ConnectDatabase();

    $eliminarProducto = "UPDATE PRODUCTOS SET ID_ESTADO = '2' WHERE ID_PRODUCTO = '".$datosProductos['codigoProducto']."'";

    if($connectionDb){
        if($resultadoUpdateProd = mysqli_query($connectionDb, $eliminarProducto)){
            header("Location: ../Vista/PaginaPrincipal.php");
        }
    }
}
?>