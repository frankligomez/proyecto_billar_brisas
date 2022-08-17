<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	require 'conexion.php';
	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$codigos = $_POST['codigos'];
		$nombres = $_POST['nombres'];
		$valores =  $_POST['valores'];
		$categorias =  $_POST['categorias'];
		
		$statement = $conexion->prepare(
		"UPDATE productos
        SET Codigo_Producto = :codigos, 
		Nombre_producto =:nombres, 
		precio =:valores, 
		id_categoria =:categorias
		WHERE Id_producto = :id");

		$statement ->execute(array(
        ':codigos'=>$codigos, 
		':nombres'=>$nombres, 
		':valores'=>$valores, 
		':categorias'=>$categorias, 
		':id'=> $id
        ));

        echo "<script>
                alert('Se ha actualizado el producto');
                window.location= 'productos.php'
    </script>";
	}
	
	require 'vista/html/actualizarproducto_vista.php';
?>


