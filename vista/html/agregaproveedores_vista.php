<?php

require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Producto-Billiards Control</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/tabla.css">
	<link rel="icon" type="image/x-ico" href="img/billar.ico">
</head>
<body>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Proveedores</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar proveedor</h2>
												
						<input required type="text" name="nombre" title="Nombre del proveedor:" placeholder="Nombre del proveedor:">
						
						<input required type="text" name="telefono" title="Telefono proveedor:" placeholder="Telefono del proveedor:">
						
						<input type="text" name="correo" title="Correo proveedor:" placeholder="Correo electronico proveedor:">
						
						<input type="submit" name="enviar" class="agregar" value="Agregar Proveedor">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-right:44%" class="btn-regresar" href="productos.php">Volver</a>
						<div class="formulario">
		
		                 <label for="caja_busquedaspro">Buscar Proveedor:</label>
		                 <input type="text" name="caja_busquedaspro" id="caja_busquedaspro"></input>

                        </div>

	                   <div id="proveedores"></div>
	
	              </section>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/proveedor.js"></script>

         </article>	 
	                  

</body>
</html>