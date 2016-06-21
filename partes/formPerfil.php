<?php 
session_start();
if(isset($_SESSION["usuario"]))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");

	$unUsuario = Usuario::TraerUnUsuarioPorId($_SESSION["id"]);

			echo "<img id='perfil' class='fotoPerfil ' src='$unUsuario->Foto'>";
 	?>
 	<table id="tablaPerfil" class="table">
 		<tbody>

 			<?php
			echo "<tr><td><strong>Nombre</strong></td><td>$unUsuario->Nombre</td></tr>
				  <tr><td><strong>Email</strong></td><td>$unUsuario->Email</td></tr>
				  <tr><td><strong>Tipo</strong></td><td>$unUsuario->Tipo</td></tr>";
 			 ?>
 		</tbody>
 	</table>
 <?php
 	echo "<hr><a onclick='EditarUser($unUsuario->ID)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a>"; 
 }
 else
 {
 	echo "<p class='cartelRestriccion animated flipInX'>Debe iniciar sesión o registrarse para visualizar esta información</p>";
 }
 ?>