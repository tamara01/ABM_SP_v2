<div class="formIngreso animated flipInX">
    <form id="formIngreso" class="form-ingreso " onsubmit="Agregar();return false;">
        <h2 id="accionIngreso" class="form-ingreso-heading">Alta</h2>
        <label for="nombre" class="sr-only">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required="" autofocus="" class="form-control">
        <label for="edad" class="sr-only">Edad</label>
            <input type="number" id="edad" name="edad" class="form-control" placeholder="Edad" required="">
        <label for="sexo">Sexo</label>
	        <input type="radio" id="sexoM" name="sexo" value="M">M
	        <input type="radio" id="sexoF" name="sexo" value="F">F<br><br>

        <!-- <input type="file" id="foto" name="foto" style="display:none;">
        <input type="button" class="form-ingreso" value="Elegir foto de perfil" title="Se actualizará luego de guardar" id="foton" onclick="document.getElementById('foto').click();" style="">
        <img id="fotoRegistro" class="fotoRegistro" src="img/perfilPordefecto.jpg"> -->

        <input type="hidden" readonly id="idParametro" name="id" class="form-control" value="0"> <!-- IMPORTANTE -->

        <br><button id="botonAlta" type="submit" class="btn btn-lg btn-success btn-primary">Agregar</button><br>
        <label>
             <br> <a class="btn btn-primary" onclick="Mostrar('MostrarGrilla')">Volver atrás</a>
        </label>
    </form>
</div>