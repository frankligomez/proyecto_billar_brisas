<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	require 'conexion.php';
	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		
		
		$statement = $conexion->prepare(
		"UPDATE categorias
        SET nombreCategoria =:nombre, 
		descripcionCategoria =:descripcion,
        fecha: current_timestamp
		WHERE idCategoria = :id");

		$statement ->execute(array(
        ':id'=>$id, 
		':nombre'=>$nombre, 
		':descripcion'=>$descripcion
        ));

        echo "<script>
                alert('Se ha actualizado la categoria');
                window.location= 'agregarcategorias.php'
    </script>";
	}
	
	require 'vista/html/actualizarcategoria_vista.php';
?>


