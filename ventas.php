<?php session_start();
if(!isset($_SESSION['usuario']))
header('Location: login.php');
require('conexion.php');
require('vista/html/ventas_vista.php');
?>