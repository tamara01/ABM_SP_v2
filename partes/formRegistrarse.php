<div class="formIngreso animated flipInX">
    <form id="formRegistro" class="form-ingreso " onsubmit="Registrarse();return false;">
        <h2 id="accionRegistro" class="form-ingreso-heading">Registro Usuario</h2>
        <label for="nombre" class="sr-only">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required="" autofocus="" class="form-control">
        <label for="correo" class="sr-only">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo electrónico" required="">
        <label for="clave1" class="sr-only">Clave</label>
            <input type="password" id="clave1" name="clave1" minlength="4" class="form-control" placeholder="clave" required="">
        <label for="clave2" class="sr-only">Repetir Clave</label>
            <input type="password" id="clave2" name="clave2" minlength="4" class="form-control" placeholder="repetir clave" required="">

        <input type="file" id="foto" name="foto" style="display:none;">
        <input type="button" class="form-ingreso" value="Elegir foto de perfil" title="Se actualizará luego de guardar" id="foton" onclick="document.getElementById('foto').click();" style="">
        <img id="fotoRegistro" class="fotoRegistro" src="img/perfilPordefecto.jpg">

        <input type="hidden" readonly id="idParametro" name="id" class="form-control" value="0"> <!-- IMPORTANTE -->

        <br><br><button id="botonRegistro" type="submit" class="btn btn-lg btn-primary btn-block">Registrarse</button><br>
        <label>
              <a id="linkLog" onclick="MostrarLogueo('MostrarLogIn')">¿Ya tienes una cuenta? Inicia Sesión</a>
        </label>
    </form>
</div>