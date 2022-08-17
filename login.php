<?php session_start();///funcion de inicio para confirmar si los datos del usuario an sido verificados para entrar al sistena

if (isset($_SESSION['usuario'])){//una ves iniciada session se dirige a inicio
	header('Location: inicio.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){//condicion por request para llamar los campos que han sido ingresados anterioremte
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);//filtra la variable y la simplifica por metodo POST(no se muestra)
	$password = $_POST['password'];
	$password = hash('sha512', $password);//metodo para encriptar contraseñas
	$errores ='';
	try{//PDO (PHP,Data,Object )permite establecer la conexion a la base de datos
		$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$statement = $conexion -> prepare(
			'SELECT * FROM usuarios WHERE usuario = :usuario AND pass= :password');

	$statement ->execute(array(':usuario'=> $usuario,':password'=> $password));

	$resultado = $statement->fetch();
	if($resultado !==false and $resultado['estado'] == 1){
		$_SESSION['usuario'] = $usuario;
		$_SESSION['rol'] = $resultado['rol'];
		header('Location: inicio.php');
	}else{
		$errores .= 'Datos incorrectos y/o invalidos!';//si la condicion no se cumple se llamara la variable vacia llamada anteriormente
	}
}
	require 'vista/html/login.php';
?>