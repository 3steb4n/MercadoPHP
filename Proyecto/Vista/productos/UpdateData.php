<?php
if (isset($_POST['codigoProducto'])) {
    $datosProductos = [
        "nombreProducto" => $_POST['nombreProducto'],
        "descripcionProducto" => $_POST['descripcionProducto'],
        "categoriaProducto" => $_POST['categoriaProducto'],
        "fechaVencimiento" => $_POST['fechaVencimiento'],
        "tallaProducto" => $_POST['tallaProducto'],
        "pesoProducto" => $_POST['pesoProducto'],
        "marcaProducto" => $_POST['marcaProducto'],
        "colorProducto" => $_POST['colorProducto'],
        "valorProducto" => $_POST['valorProducto'],
        "cantidadDisponible" => $_POST['cantidadDisponible'],
        "codigoProducto" => $_POST['codigoProducto'],
        "rutaImagen" => $_POST['codigoProducto'] . ".jpg",
    ];
    echo $datosProductos['fechaVencimiento'];
    include "DatabaseConnection.php";
    $codigoCategoria = "";
    echo $datosProductos['categoriaProducto'];
    $obtenerCodigoCategoria = "SELECT ID_CATEGORIA FROM CATEGORIAS WHERE NOMBRE_CATEGORIA = '" . $datosProductos['categoriaProducto'] . "'";
    $connectionInstance = new DatabaseConnection();
    $connectionDb = $connectionInstance->ConnectDatabase();

    if ($connectionDb) {
        if ($resultadoConsulta = mysqli_query($connectionDb, $obtenerCodigoCategoria)) {
            if (mysqli_num_rows($resultadoConsulta) > 0) {
                while ($filasDatos = mysqli_fetch_array($resultadoConsulta)) {
                    $codigoCategoria = $filasDatos[0];
                }
            }
        }
    }

    $actualizarProducto = "UPDATE PRODUCTOS SET NOMBRE_PRODUCTO = '" . $datosProductos['nombreProducto'] . "', DESCRIPCION_PRODUCTO = '" . $datosProductos['descripcionProducto'] . "',
    ID_CATEGORIA = $codigoCategoria WHERE ID_PRODUCTO = '" . $datosProductos['codigoProducto'] . "'";

    $fechaVencimiento = $datosProductos['fechaVencimiento'] == "" ? null : $datosProductos['fechaVencimiento'];

    $actualizarProductoDetalle = "UPDATE DETALLE_PRODUCTO SET TALLA_PRODUCTO = '" . $datosProductos['tallaProducto'] . "',
    PESO_PRODUCTO = '" . $datosProductos['pesoProducto'] . "', MARCA_PRODUCTO = '" . $datosProductos['marcaProducto'] . "', COLOR_PRODUCTO = '" . $datosProductos['colorProducto'] . "',
    VALOR_PRODUCTO = '" . $datosProductos['valorProducto'] . "', STOCK_PRODUCTO = '" . $datosProductos['cantidadDisponible'] . "', RUTA_IMAGEN = '" . $datosProductos['rutaImagen'] . "'
    WHERE ID_PRODUCTO = '" . $datosProductos['codigoProducto'] . "'";

    if ($connectionDb) {
        if ($resultadoUpdateProd = mysqli_query($connectionDb, $actualizarProducto)) {
            if ($resultadoUpdateProdDet = mysqli_query($connectionDb, $actualizarProductoDetalle)) {
                if ($_FILES['cargarImagen']['name'] != "") {
                    if (!unlink('../Iconos_o_Imagenes/ProductoImagenes/' . $datosProductos['rutaImagen'])) {
                        echo "Error al actualizar la imagen";
                    }else{
                        $tagRuta = "../Iconos_o_Imagenes/ProductoImagenes/";
                        $tagImagen = $_FILES['cargarImagen']['name'];
                        $pathImagen = pathinfo($tagImagen);
                        $nombreImagen = $pathImagen['filename'];
                        $tempName = $_FILES['cargarImagen']['tmp_name'];
                        $imagen = $tagRuta . $datosProductos['rutaImagen'];
                        move_uploaded_file($tempName, $imagen);
                    }       
                }
                header("Location: ../Vista/PaginaPrincipal.php");
            }
        }
    }
}
