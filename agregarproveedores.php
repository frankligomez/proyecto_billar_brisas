<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$telefono = $_POST['telefono'];
	$correo =  $_POST['correo'];
	$mensaje='';
	
    if(empty($nombre) or empty($telefono) or empty($correo)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		require 'conexion.php';

		$statement = $conexion -> prepare(
			'SELECT * FROM productos WHERE Id_proveedor = :id LIMIT 1');
		//$statement ->execute(array(':id'=>$codigo));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='Ya existe un proveedor con ese nombre </br>';
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO proveedor (Id_proveedor, Nombre_proveedor, telefono_proveedor, correo_proveedor) values(null, :nombre,:telefono,:correo)');

		$statement ->execute(array(
		':nombre'=> $nombre,
		':telefono'=>$telefono,
		':correo'=>$correo
		));
		//header('Location: inventario.php');
        echo "<script>
                alert('Se ha guardado el proveedor');
                window.location= ''
    </script>";
	}
}
require 'vista/html/agregaproveedores_vista.php';
?>