<?php 
	Class Entidad
	{
		public $ID;
		public $Nombre;
		public $Edad;
		public $Sexo;

		public static function TraerUnaEntidad($id)
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"SELECT ID, Nombre, Edad, Sexo
				from alumnos WHERE ID=$id");

			$consulta->execute();
			$filaBuscada = $consulta->fetchObject("Entidad");
			return $filaBuscada;
		}

		public static function TraerTodasLasEntidades()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"SELECT ID, Nombre, Edad, Sexo
				from alumnos");

			$consulta->execute();
			$tablaCompleta = $consulta->fetchAll(PDO::FETCH_CLASS, "Entidad");
			return $tablaCompleta;
		}

		public function AgregarEntidad()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"INSERT into alumnos (Nombre, Edad, Sexo)
				values ('$this->Nombre', '$this->Edad', '$this->Sexo')");

			$consulta->execute();

			$retorno = $objetoAccesoDatos->RetornarUltimoIdInsertado();
			return $retorno;
		}

		public function ModificarEntidad()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"UPDATE alumnos
				set Nombre='$this->Nombre', 
				Edad='$this->Edad', 
				Sexo='$this->Sexo'
				WHERE ID='$this->ID'");

			return $consulta->execute(); // filas afectadas.
		}

		public function BorrarEntidad()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"DELETE from alumnos
				WHERE ID=:ID");

			$consulta->bindValue(':ID', $this->ID, PDO::PARAM_INT);
			$consulta->execute();

			$filasAfectadas = $consulta->rowCount();
			return $filasAfectadas;
		}
	}
 
?>
