<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE usuarios SET estado=2 WHERE id = $_REQUEST[id]";
	$resultado = $conexion->query($sql);
	echo "<script>
                alert('Usuario desactivado correctamente');
                window.location= 'usuarios.php'
    </script>";
	require 'usuarios.php';
?>