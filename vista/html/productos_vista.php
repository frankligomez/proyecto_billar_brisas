 <?php

/*try{
	$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','octopuspro282522');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}*/


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/tabla.css"> 
    <link rel="icon" type="image/x-ico" href="img/billar.ico">
    
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PRODUCTOS</h2>
					</div>
						<a href="agregarproductos.php"class="agregar">Crear Producto</a>
						<a href="agregarcategorias.php"class="agregar">Crear Categoria</a>
						<a href="agregarproveedores.php"class="agregar">Crear Proveedor</a>
						<a href="agregarentradas.php"class="agregar">Agregar Entrada</a>
						
						<div class="formulario">
		
		                 <label for="caja_busqueda">Buscar Productos:</label>
		                 <input type="text" name="caja_busqueda" id="caja_busqueda"/>

                        </div>

	                   <div id="datos"></div>
	
	              </section>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/productos.js"></script>

         </article>	    
	

</body>
</html>