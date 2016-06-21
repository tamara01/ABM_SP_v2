<?php 
session_start();
if(isset($_SESSION["usuario"]))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/entidad.php");

	$arrayDeEntidades = Entidad::TraerTodasLasEntidades();
	
	echo "<h2 id='cartelGrilla'>Tabla Alumnos</h2>";
	if($_SESSION["tipo"] == "Admin")
	{
	?>	
 		<button id="botonAgregar" onclick="MostrarIngreso('MostrarFormAlta')" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Agregar</button><hr><br>
 	<?php 
 	}
 	?>
 
 <table id="tablaGrilla" class="table ">	
 	<thead>
 		<tr>
 			<th>&nbsp;&nbsp;&nbsp;Editar</th><th>&nbsp;&nbsp;&nbsp;Borrar</th><th>Nombre</th><th>Edad</th><th>Sexo</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 

 			foreach($arrayDeEntidades as $alumno)
 			{
 				echo"<tr>";
 				
 				if($_SESSION["tipo"] == "Admin")
 				{
	 				echo "<td><a onclick='Modificar($alumno->ID)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						  <td><a onclick='Eliminar($alumno->ID)' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'>&nbsp;</span> Borrar</a></td>";
 				}
 				else
 				{
 					echo "<td>----</td>
 						  <td>----</td>";
 				}

				echo "<td>$alumno->Nombre</td>
					  <td>$alumno->Edad</td>
					  <td>$alumno->Sexo</td>";
				
				echo"</tr>";
 			}

 		 ?>
 	</tbody>
 </table>
<?php 
}
else
{
	echo "<p class='cartelRestriccion animated flipInX'>Debe iniciar sesión o registrarse para visualizar esta información</p>";
}	
?>