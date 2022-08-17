<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/html/caja_vista.php';
}else{
	header('Location: login.php');
}
?>