<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/html/inventario_vista.php';
}else{
	header('Location: login.php');
}
?>