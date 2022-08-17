<?php session_start();

if(isset($_SESSION['usuario'])){
	require 'vista/html/productos_vista.php';
}else{
	header('Location: login.php');
}
?>