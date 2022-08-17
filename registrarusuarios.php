<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$rol =  $_POST['rol'];
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$pass = $_POST['pass'];
	$nombre =  $_POST['nombre'];
	$apellido =  $_POST['apellido'];
	$mensaje='';
	
    if(empty($usuario) or empty($pass) or empty($rol)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		require 'conexion.php';

		$statement = $conexion -> prepare(
			'SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1' );
		$statement ->execute(array(':usuario'=>$usuario));
		$resultado= $statement->fetch();
		if($resultado != false){
			$mensaje .='Ya existe un usuario con ese nick';
			echo "<script>
                alert('$mensaje');
    </script>";
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO usuarios (usuario, pass, nombres, apellidos, rol) values(:usuario,:pass,:nombre,:apellido,:rol)');

		$statement ->execute(array(
		':usuario'=>$usuario,
		':pass'=> hash('sha512',$pass),
		':nombre'=>$nombre,
		':apellido'=>$apellido,
		':rol'=>$rol
       	));
		
        echo "<script>
                alert('Se ha creado el usuario');
                window.location= 'usuarios.php'
    </script>";
	}
}

require 'vista/html/registrarusuarios_vista.php';

?>