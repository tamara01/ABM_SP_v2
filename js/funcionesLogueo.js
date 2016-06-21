function LogIn()
{
	var user = $("#correo").val();
	var clave = $("#clave").val();
	var recordarme = $("#recordarme").is(':checked');
	alert("recuerda?= " + recordarme);

	var funcionAjax=$.ajax({
		url:"php/validarLogIn.php",
		type:"post",
		data:{user:user, clave:clave, recordarme:recordarme }
	});

	funcionAjax.done(function(retorno){
		if(retorno != "Sin usuario")
		{
			$("#content").removeClass("contenido");
			$("#content").addClass("principal");
			$(".button-log").attr("id", "LogOut");
			$("#LogOut").html("LogOut");
		}
		else
		{
			alert("El usuario o password es incorrecto!");
		}
		$("#usuario").val(retorno);
		MostrarLogueo("MostrarLogIn");
		console.log(retorno);
	});

	funcionAjax.fail(function(retorno){
		$("#content").html(":( no funca " + retorno);	
	});
}

function LogOut()
{
	var funcionAjax=$.ajax({
		url:"php/desloguearse.php",
		type:"post"
	});

	funcionAjax.done(function(retorno){
		$(".button-log").attr("id", "LogIn");
		$("#LogIn").html("LogIn");
		$("#usuario").val("Sin usuario");
		MostrarLogueo("MostrarLogIn");
	});
}