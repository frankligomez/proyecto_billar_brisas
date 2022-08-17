<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	require 'conexion.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
	$id =  $_POST['id'];
	$rol =  $_POST['rol'];
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$pass = $_POST['pass'];
	$nombre =  $_POST['nombre'];
	$apellido =  $_POST['apellido'];
	$mensaje='';
    if(empty($usuario) or empty($rol)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}

	if($mensaje==''){
		if (!empty($pass)){
			$statement = $conexion->query(
		
		'UPDATE usuarios SET usuario="'.$usuario.'", pass="'.hash('sha512', $pass).'", nombres="'.$nombre.'", apellidos="'.$apellido.'", rol='.$rol.' WHERE id = '.$id);		

        echo "<script>
                alert('Se ha actualizado el usuario');
                window.location= 'usuarios.php'
    </script>";

}else{
	$statement = $conexion->query(
		
		'UPDATE usuarios SET usuario="'.$usuario.'", nombres="'.$nombre.'", apellidos="'.$apellido.'", rol='.$rol.' WHERE id = '.$id);		

        echo "<script>
                alert('Se ha actualizado el usuario');
                window.location= 'usuarios.php'
    </script>";
	}
}
}
	require 'vista/html/actualizarusuario_vista.php';
?>