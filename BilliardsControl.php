<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/html/BilliardsControl_vista.php';
}else{
	header('Location: login.php');
}
?>