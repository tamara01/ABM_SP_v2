<?php 
	require("clases/AccesoDatos.php");
	require("clases/entidad.php");
	require("clases/usuario.php");

	$accion = $_POST["queHacer"];

	switch($accion)
	{
		//-------------------PARTES-------------------//
		case "MostrarInicio":
			include("partes/paginaInicio.php");
			break;

		case "MostrarGrilla":
			include("partes/formGrilla.php");
			break;

		case "MostrarPerfil":
			include("partes/formPerfil.php");
			break;

		case "MostrarLogIn":
			include("partes/formLogIn.php");
			break;

		case "MostrarRegistro":
			include("partes/formRegistrarse.php");
			break;

		case "MostrarFormAlta":
			include("partes/formAlta.php");
			break;

		//--------------------ABM ENTIDAD--------------------//

		case "Agregar":
			$entidad = new Entidad();
			$entidad->Nombre = $_POST["nombre"];
			$entidad->Edad = $_POST["edad"];
			$entidad->Sexo = $_POST["sexo"];

			if($_POST["id"] == "0") // AGREGAR
			{
				$idInsertado = $entidad->AgregarEntidad();
				echo $idInsertado;
			}
			else // MODIFICAR
			{
				$entidad->ID = $_POST["id"];
				echo $entidad->ModificarEntidad();
			}
			break;

		case "Modificar":
			$unaEntidad = Entidad::TraerUnaEntidad($_POST["id"]);
			echo json_encode($unaEntidad);
			break;

		case "Eliminar":
			$unaEntidad = Entidad::TraerUnaEntidad($_POST["id"]);
			$unaEntidad->BorrarEntidad();
			break;

		//--------------------ABM USUARIO--------------------//
		case "EditarUsuario":
			$usuario = Usuario::TraerUnUsuarioPorId($_POST["id"]);
			echo json_encode($usuario);
			break;

		case "Registrarse":
			$usuario = new Usuario();
			$usuario->Nombre = $_POST["nombre"];
			$usuario->Email = $_POST["correo"];
			$usuario->Clave = $_POST["clave1"];
			$usuario->Tipo = "User"; 
			$usuario->Foto = "img/".$usuario->Nombre.".jpg";

			if($_POST["id"] != "0") // MODIFICAR
			{
				$usuario->ID = $_POST["id"];
				echo $usuario->Modificar();
			}
			else // AGREGAR
			{
				$idInsertado = $usuario->Agregar();
				echo $idInsertado;
			}

			move_uploaded_file($_FILES["foto"]["tmp_name"], $usuario->Foto);
			break;
	}

 ?>