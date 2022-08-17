<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE categorias SET estado=1 WHERE idCategoria = $_REQUEST[id]";//activar o desactivar categoria
	$resultado = $conexion->query($sql);
//Mensaje cuando se la categoria a siso actualizada o no
	echo "<script>
                alert('Categoria activada correctamente');  
                window.location= 'agregarcategorias.php'
    </script>";
	require 'agregarcategorias.php';//Solicita este archivo obligatorio
?>