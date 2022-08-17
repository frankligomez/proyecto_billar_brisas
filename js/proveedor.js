$(buscar_proveedor());

function buscar_proveedor(consultaspro){
	$.ajax({
		url: 'buscarproveedor.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consultaspro: consultaspro},
	})
	.done(function(respuestaspro){
		$("#proveedores").html(respuestaspro);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busquedaspro', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_proveedor(valor);
	}else{
		buscar_proveedor();
	}
});