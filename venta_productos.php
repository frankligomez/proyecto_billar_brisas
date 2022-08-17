<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}
require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$mesa = $_POST['mesa'];
	$producto =  explode('-', $_POST['producto'], -1)[0];
	$cantidad =  $_POST['cantidad'];
	$id_entrada = explode('-', $_POST['producto'], 2)[1];
	$mensaje='';
	
    if(empty($mesa) or empty($producto) or empty($cantidad)){
		$mensaje.= 'Por favor rellena todos los datos correctamente';
		echo "<script>
                alert('$mensaje');
                window.location= '';
    </script>";
	}

	if($mensaje==''){

		$consulta = $conexion->query(
		'SELECT * FROM entradas where id_Producto = '.$producto);
		$consulta = $consulta ->fetchAll();
		if($consulta[0]['Cantidad_Ingresar']<$cantidad){
			 echo "<script>
                alert('La cantidad ingresada es mayor al stock');
                
    </script>";
		}else{
			$statement = $conexion->prepare(
		'INSERT INTO detalleventa (id_mesa,id_entrada,cantidad ) values(:mesa,:producto,:cantidad)');

		$statement ->execute(array(
		':mesa'=>$mesa,
		':producto'=> $id_entrada,
		':cantidad'=>$cantidad
       	));
		$cantidad_restada = $consulta[0]['Cantidad_Ingresar']-$cantidad;
		$statement_2 = $conexion->prepare(
		'UPDATE entradas SET Cantidad_Ingresar =:cantidad WHERE id_Producto =:producto');
		$statement_2 ->execute(array(
		':cantidad'=>$cantidad_restada,
		':producto'=> $producto
       	));

        echo "<script>
                alert('Se ha guardado el producto');
    </script>";
}
	}

}

require 'vista/html/venta_producto_vista.php';

?>