<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$codigo = $_POST['codigo'];
	$valor =  $_POST['valor'];
	$categoria =  $_POST['categoria'];
	$mensaje='';
	
    if(empty($nombre) or empty($codigo) or empty($valor)){
		$mensaje.= 'Por favor rellena todos los datos correctamente';
	}
	else{	
		require 'conexion.php';

		$statement = $conexion -> prepare(
			'SELECT * FROM productos WHERE Id_producto = :id LIMIT 1' );
		$statement ->execute(array(':id'=>$codigo));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='Ya existe un producto con ese codigo';
			echo "<script>
                alert('$mensaje');
                window.location= ''
    			</script>";
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO productos (Id_producto, Codigo_Producto, Nombre_Producto, precio, id_categoria) values(null, :id,:nombre,:valor,:categoria)');

		$statement ->execute(array(
		':id'=>$codigo,
		':nombre'=> $nombre,
		':valor'=>$valor,
		':categoria'=>$categoria
       	));
		
        echo "<script>
                alert('Se ha guardado el producto');
                window.location= 'productos.php'
    </script>";
	}
}
require 'vista/html/agregaproductos_vista.php';
?>