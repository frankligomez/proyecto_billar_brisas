$(buscar_categoria());
//se llama funcion categoria para que se ejecute en la busqueda
function buscar_categoria(consultasca){
    
	$.ajax({
		url: 'buscarcategoria.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consultasca: consultasca},
	})
	.done(function(respuestasca){
		$("#categorias").html(respuestasca);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busquedasca', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_categoria(valor);
	}else{
		buscar_categoria();
	}
});