<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE categorias SET estado=2 WHERE idCategoria = $_REQUEST[id]";
	$resultado = $conexion->query($sql);
	echo "<script>
                alert('Categoria desactivada correctamente');
                window.location= 'agregarcategorias.php'
    </script>";
	require 'agregarcategorias.php';
?>