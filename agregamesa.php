<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$tipo = filter_var(strtolower($_POST["tipo"]),FILTER_SANITIZE_STRING);
	$imagenes = $_FILES["imagen"]["name"];//obtiene del nombre
	$archivo = $_FILES["imagen"]["tmp_name"];//obtiene del archivo
	$ruta= "img";
    $mensaje='';
	
        $ruta =$ruta."/". $imagenes; //ruta de la imagen al guardar
    
    move_uploaded_file($archivo,$ruta); //imagen y carpeta 
    
    if(empty($tipo)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','');
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
			die();
		}

	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO mesa (Id_Mesa, Tipo_Mesa, Img_mesa) values(null, :tipo, :ruta)');

		$statement ->execute(array(
		':tipo'=>$tipo,
		':ruta'=> $ruta
        ));

         echo '<script type="text/javascript"> alert("Agregado Correctamente"); window.location="agregamesa.php";</script>';
	}
}
require 'vista/html/agregarmesa_vista.php';
?>