<?php 
	session_start();
	$logueoActivo;

	if(isset($_SESSION["nombre"]))
		$logueoActivo = $_SESSION["nombre"];
	else
		$logueoActivo = "Sin usuario";

	echo $logueoActivo;
 ?>