<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE detalleventa SET cierre=2 WHERE id_mesa = $_REQUEST[id]";
	$resultado = $conexion->query($sql);
	echo "<script>
                alert('La mesa se ha cerrado correctamente');
                window.location= 'ventas.php';
                
    </script>";
	require 'venta_productos.php';
?>