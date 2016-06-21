<?php 
session_start();
if(!isset($_SESSION["usuario"]))
{
    if(isset($_COOKIE["usuarioCookie"]))
    {
        $arrayUsuario = json_decode($_COOKIE["usuarioCookie"], true);
    }
?>
    <div class="formIngreso animated flipInX">
    	<form class="form-ingreso " onsubmit="LogIn();return false;">
            <h2 class="form-ingreso-heading">Inicio Sesión</h2>
            <label for="correo" class="sr-only">Correo electrónico</label>
                <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" required="" autofocus="" value="<?php if(isset($arrayUsuario)){echo $arrayUsuario['Email'];} ?>">
            <label for="clave" class="sr-only">Clave</label>
            	<input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" required="" value="<?php if(isset($arrayUsuario)){echo $arrayUsuario['Clave'];} ?>">
            <div class="checkbox">
              <label>
                <input type="checkbox" id="recordarme" checked>Recordame
              </label>
              
            </div>
            <button id="logIn" class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button><br>
            <label>
                  <a class="linkLog" onclick="MostrarLogueo('MostrarRegistro')">¿No tienes una cuenta? Registrate</a>
            </label>
    	</form>
    </div>
<?php 
}
else
{
    echo "<button id='logOut' class='btn btn-lg btn-danger btn-block' onclick='LogOut()'>Desloguearse</button><br>";
}
?>