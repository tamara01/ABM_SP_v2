/********************************ENTIDAD********************************/
function Agregar()
{
	var sexo = $("input:radio[name=sexo]:checked").val();
	var mensaje = ValidarIngreso($("#nombre").val(), $("#edad").val(), sexo);

	if(mensaje != "")
	{
		alert(mensaje);
		return;
	}

	//LUEGO DE VALIDAR...
	var formData = new FormData(document.getElementById('formIngreso')); // para pasar también archivos
	formData.append("queHacer", "Agregar");

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		datatype: "html",
		data:formData, 
		cache: false,
	    contentType: false,
		processData: false,
	});

	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla"); // RECARGA Grilla
		console.log(retorno);	
	});
	funcionAjax.fail(function(retorno){
		console.log(retorno);
	});
}

function Modificar(id)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{	queHacer:"Modificar",
				id : id }
	});

	MostrarIngreso("MostrarFormAlta");

	funcionAjax.done(function(retorno){
		$("#accionIngreso").html("Modificación");
		var entidad = JSON.parse(retorno);
		$("#idParametro").val(entidad.ID);
		$("#nombre").val(entidad.Nombre);
		$("#edad").val(entidad.Edad);
		if(entidad.Sexo == "M")
			$("#sexoM").prop("checked", true);
		else
			$("#sexoF").prop("checked", true);

		$("#botonAlta").html("Modificar");
	});
}

function Eliminar(id)
{
	if(!confirm("¿Seguro desea realizar esta acción?"))
		return;

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{	queHacer:"Eliminar",
				id : id }
	});

	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla"); // RECARGA Grilla
		console.log(retorno);	
	});
}

/********************************USUARIO********************************/
function EditarUser(id)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{	queHacer:"EditarUsuario",
				id : id }
	});

	MostrarLogueo("MostrarRegistro");
	
	funcionAjax.done(function(retorno){
		var usuario = JSON.parse(retorno);
		$("#accionRegistro").html("Modificar usuario");
		$("#idParametro").val(usuario.ID);
		$("#nombre").val(usuario.Nombre);
		$("#correo").val(usuario.Email);
		$("#clave1").hide();
		$("#clave2").hide();
		$("#clave1").val(usuario.Clave);
		$("#clave2").val(usuario.Clave);
		$("#fotoRegistro").attr("src", usuario.Foto);
		$("#linkLog").hide();
		$("#botonRegistro").html("Modificar");
		console.log(usuario);
	});
}

function Registrarse()
{	
	var formData = new FormData(document.getElementById('formRegistro')); // para pasar también archivos
	formData.append("queHacer", "Registrarse");

	var mensaje = ValidarRegistro($("#nombre").val(), $("#correo").val(), $("#clave1").val(), $("#clave2").val(), $("#foto").val());

	if(mensaje != "")
	{
		alert(mensaje);
		return;
	}

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		datatype: "html",
		data:formData, 
		cache: false,
	    contentType: false,
		processData: false,
	});

	funcionAjax.done(function(retorno){
		if(retorno != 0)
		{
			alert("Cambios realizados con éxito!");	
			console.log(retorno);
		}
	});
	MostrarLogueo("MostrarLogIn");
}


/********************************VALIDACIONES********************************/
function ValidarRegistro(nombre, email, clave1, clave2, foto)
{
	var mensaje="";

	if(nombre == "")
		mensaje+="El campo nombre no puede quedar vacío!\n";

	if(email == "")
		mensaje +="El campo email no puede quedar vacío!\n";

	if(clave1 != clave2)
		mensaje += "Las claves deben ser idénticas!\n";

	if(foto == "")
		mensaje += "Debe elegir una foto de perfil!";

	return mensaje;
}

function ValidarIngreso(nombre, edad, sexo)
{
	var mensaje = "";
	if(nombre == "")
		mensaje += "El campo nombre no puede estar vacío!";

	if(edad == "")
		mensaje += "El campo edad no puede estar vacío!";

	if(sexo == null)
		mensaje += "Debe seleccionar un sexo!";

	return mensaje;
}