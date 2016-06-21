function CargaInicial()
{
	var funcionAjax=$.ajax({
		url:"php/cargaInicial.php",
		type:"post"
	});

	funcionAjax.done(function(retorno){
		if(retorno != "Sin usuario")
		{
			$("#LogIn").html("LogOut");
			$(".button-log").attr("id", "LogOut");
		}
		else
		{
			$("#LogIn").html("LogIn");
			$(".button-log").attr("id", "LogIn");
		}
		$("#usuario").val(retorno);
	});
}

function Mostrar(queMostrar)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});

	funcionAjax.done(function(retorno){
		$("#content").removeClass("contenido");
		$("#content").addClass("principal");
		$("#content").html(retorno);
	});

	funcionAjax.fail(function(retorno){
		$("#content").html(":(");	
	});
}

function MostrarIngreso(queMostrar)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});

	funcionAjax.done(function(retorno){
		$("#content").removeClass("principal"); 
		$("#content").addClass("contenido"); //esta en el index
		$("#content").html(retorno);
	});

	funcionAjax.fail(function(retorno){
		$("#content").html(":(");	
	});
}

function MostrarLogueo(queMostrar)
{	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});

	funcionAjax.done(function(retorno){
		$("#content").removeClass("principal");
		$("#content").addClass("contenido");
		$("#content").html(retorno);
	});

	funcionAjax.fail(function(retorno){
		$("#content").html(":(");	
	});
}