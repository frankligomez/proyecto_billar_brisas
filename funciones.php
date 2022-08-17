<?php
    function conexion(){
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','');
			return $conexion;
		}catch(PDOException $e){
			return false;
		}
	}
	function limpiarDatos($datos){
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
	}
	

?>