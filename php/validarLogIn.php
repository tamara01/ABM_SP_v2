<?php 
	session_start();
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/usuario.php");

	$user = $_POST["user"];
	$clave = $_POST["clave"];
	$recordar = $_POST["recordarme"];

	$usuarioBuscado = Usuario::TraerUnUsuarioPorDatos($user,$clave);

	if($usuarioBuscado)
	{

		$_SESSION["id"] = $usuarioBuscado->ID;
		$_SESSION["nombre"] = $usuarioBuscado->Nombre;
		$_SESSION["usuario"] = $usuarioBuscado->Email;
		$_SESSION["tipo"] = $usuarioBuscado->Tipo;

		$seLogueo = $usuarioBuscado->Nombre;

		if($recordar=="true") // IMPORTANTE!
		{
			setcookie("usuarioCookie", json_encode($usuarioBuscado), time()+36000, '/');
		}
		else
		{
			unset($_COOKIE["usuarioCookie"]);
			setcookie("usuarioCookie", "", time()-36000, '/');
		}
	}
	else
	{
		$seLogueo = "Sin usuario";
	}

	echo $seLogueo;	
 ?>