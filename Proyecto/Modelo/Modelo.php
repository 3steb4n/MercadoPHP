<?php


class C_enlacesPaginas
  {
  	
  	public function f_EnlacesPaginasModelo($ENLACEMODELO)
  	{
  		$modulo = "Vista/".$ENLACEMODELO.".php";
      return $modulo;
  	}
 
  }



?>