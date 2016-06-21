<?php 

	Class Usuario
	{
		public $ID;
		public $Nombre;
		public $Email;
		public $Clave;
		public $Tipo;
		public $Foto;

		public static function TraerUnUsuarioPorId($id)
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"SELECT ID, Nombre, Email, Clave, Tipo, Foto
				from usuarios WHERE ID='$id'");

			$consulta->execute();
			$filaBuscada = $consulta->fetchObject("Usuario");
			return $filaBuscada; //retorna false si no hay coincidencia
		}

		public static function TraerUnUsuarioPorDatos($user,$clave)
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"SELECT ID, Nombre, Email, Clave, Tipo, Foto
				from usuarios WHERE Email='$user' AND Clave='$clave'");

			$consulta->execute();
			$filaBuscada = $consulta->fetchObject("Usuario");
			return $filaBuscada;
		}

		public static function TraerTodasLasUsuarioes()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"SELECT ID, Nombre, Email, Clave, Tipo, Foto
				from usuarios");

			$consulta->execute();
			$tablaCompleta = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
			return $tablaCompleta;
		}

		public function Agregar()
		{
			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"INSERT into usuarios (Nombre, Email, Clave, Tipo, Foto)
				values ('$this->Nombre', '$this->Email', '$this->Clave', '$this->Tipo', '$this->Foto')");

			$consulta->execute();

			$retorno = $objetoAccesoDatos->RetornarUltimoIdInsertado();
			return $retorno;
		}

		public function Modificar()
		{
			unlink($this->Foto);

			$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

			$consulta = $objetoAccesoDatos->RetornarConsulta(
				"UPDATE usuarios
				set Nombre='$this->Nombre', 
				Email='$this->Email', 
				Foto='$this->Foto'
				WHERE ID='$this->ID'");

			return $consulta->execute();
		}
	}

 ?>