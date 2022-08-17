<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE productos SET estado=1 WHERE Id_producto = $_REQUEST[id]";
	$resultado = $conexion->query($sql);
	echo "<script>
                alert('Prodcuto activado correctamente');
                window.location= 'productos.php'
    </script>";
	require 'productos.php';
?>