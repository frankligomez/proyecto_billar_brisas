$(buscar_entrada());

function buscar_entrada(consultas){
	$.ajax({
		url: 'buscarentrada.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consultas: consultas},
	})
	.done(function(respuestas){
		$("#entrada").html(respuestas);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busquedas', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_entrada(valor);
	}else{
		buscar_entrada();
	}
});