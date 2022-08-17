<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	require 'conexion.php';
	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$correo =  $_POST['correo'];
		
		$statement = $conexion->prepare(
		"UPDATE proveedor
        SET Nombre_proveedor =:nombre, 
		telefono_proveedor =:telefono, 
		correo_proveedor =:correo
		WHERE Id_proveedor = :id");

		$statement ->execute(array(
        ':id'=>$id, 
		':nombre'=>$nombre, 
		':telefono'=>$telefono, 
		':correo'=>$correo
        ));

        echo "<script>
                alert('Se ha actualizado el proveedor');
                window.location= 'agregarproveedores.php'
    </script>";
	}
	
	require 'vista/html/actualizarproveedor_vista.php';
?>


