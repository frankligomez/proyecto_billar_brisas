<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$descripcion = $_POST['descripcion'];
	$mensaje='';
	
    if(empty($nombre) or empty($descripcion)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";//campos obligatoios
	}
	else{	
		require 'conexion.php';//requiere la conexion 
		$statement = $conexion -> prepare(
			'SELECT * FROM categorias WHERE idCategoria = :id LIMIT 1');//seleccionar todo de la tabla categorias donde id categoria no se repita
		//$statement ->execute(array(':id'=>$nombre));
		$resultado= $statement->fetch();//agrupar campos de la base de datos

		//si la categoria ya existe mostrar alert
        if($resultado != false){
			$mensaje .='Ya existe una categoria con ese nombre';
			echo "<script>
                alert('$mensaje');
                window.location= ''
    </script>";
		}
	}
    //Insercion a base de datos 
	if($mensaje==''){
		//inserta a tabla categorias idcategoria,nombrecategoria ,descripcioncategoria en los campos capturados en el formulario 
        $statement = $conexion->prepare(
		'INSERT INTO categorias (idCategoria, nombreCategoria, descripcionCategoria) values(null, :nombre,:descripcion)');

		//permite ingresar varias categorias
        $statement ->execute(array(
		':nombre'=>$nombre,
		':descripcion'=> $descripcion
		));
		//header('Location: inventario.php');
       //mensaje de guardado categoria
        echo "<script>
                alert('Se ha guardado la categoria');
                window.location= ''
    </script>";
	}
}
//requiere archivo agregacategorias
require 'vista/html/agregacategorias_vista.php';
?>