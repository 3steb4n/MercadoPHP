<?php
 
  class Controlador 
  {
  	
  	public function f_llamaplantilla()
  	{
  		include "Vista/PaginaPrincipal.php";
  	}
 
  	public function f_EnlacesPaginasControlador()
  	{
      if(isset($_GET["accion"])){
        $enlaceControlador = $_GET["accion"];
      }else{
        $enlaceControlador = "index";
      }
  		
  		$respuesta = C_enlacesPaginas::f_EnlacesPaginasModelo($enlaceControlador);

  		include $respuesta;
  	}
  }
?>