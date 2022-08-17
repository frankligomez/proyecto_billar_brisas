<?php session_start();//inicia sesion
if (isset($_SESSION['usuario'])){//isset=variable definida y no esta nula 
	header('Location: BilliardsControl.php');//si es verdadero entra al sistema
}else{
	header('Location: login.php');//volver a login
}	
?>
