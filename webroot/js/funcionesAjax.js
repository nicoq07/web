function Mostrar(queMostrar)
{
	//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		cache: false,
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);		
	});
}