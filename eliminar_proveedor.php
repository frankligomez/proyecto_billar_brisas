<?php
	$mensaje='';
	extract ($_REQUEST);
	require 'conexion.php';

	$sql="UPDATE proveedor SET estado=2 WHERE Id_proveedor = $_REQUEST[id]";
	$resultado = $conexion->query($sql);
	echo "<script>
                alert('Proveedor desactivado correctamente');
                window.location= 'agregarproveedores.php'
    </script>";
	require 'agregarproveedores.php';
?>