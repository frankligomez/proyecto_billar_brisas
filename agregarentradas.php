<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$productos = $_POST['productos'];
	$proveedores = $_POST['proveedores'];
	$cantidadin =  $_POST['cantidadin'];
    $mensaje='';
	
    if(empty($cantidadin)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		require 'conexion.php';

		$statement = $conexion -> prepare(
			'SELECT * FROM entradas WHERE Id_Entrada = :id LIMIT 1');
		//$statement ->execute(array(':id'=>$codigo));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='Ya existe una entrada con ese codigo </br>';
		}
	} 
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO entradas (Id_Entrada, id_Producto,id_Proveedor, Cantidad_Ingresar) values(null, :productos,:proveedores,:cantidadin)');

		$statement ->execute(array(
		':productos'=> $productos,
		':proveedores'=>$proveedores,
		':cantidadin'=>$cantidadin
		));
		
        echo "<script>
                alert('Se ha guardado la entrada de productos');
                window.location= ''
    </script>";
	}
}
require 'vista/html/agregaentrada_vista.php';
?>