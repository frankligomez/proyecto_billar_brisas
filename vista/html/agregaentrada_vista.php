<?php
$mensaje='';

require 'conexion.php';


$consultas = $conexion -> prepare("
	SELECT * FROM entradas ORDER BY Id_Entrada");


//CARGAR PRODUCTOS EN EL SELECT
$produc = $conexion -> prepare("SELECT * FROM productos WHERE estado=1");
$produc ->execute();
$produc = $produc ->fetchAll();
if(!$produc)
	$mensaje .= 'NO hay productos, por favor registre!';
        
//CARGAR PROVEEDORES EN EL SELECT
$prov = $conexion -> prepare("SELECT * FROM proveedor WHERE estado=1");
$prov ->execute();
$prov = $prov ->fetchAll();
if(!$prov)
	$mensaje .= 'NO hay proveedor, por favor registre!';
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
						<h2>Entrada</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Entrada</h2>
						
						<select name="productos"> 
                        <option value="" selected="selected">Seleccione el Producto:</option> 
                        <?php foreach ($produc as $Sql): ?>
                        <?php echo "<option value='". $Sql['Id_producto']. "'>". $Sql['Nombre_producto']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						
						<select name="proveedores" > 
                        <option value="" selected="selected">Seleccione el Proveedor:</option> 
                        <?php foreach ($prov as $Sql): ?>
                        <?php echo "<option value='". $Sql['Id_proveedor']. "'>". $Sql['Nombre_proveedor']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						
						<input required type="numeric" name="cantidadin" title="Cantidad a Ingresar:" placeholder="Cantidad a Ingresar:">
						
						<!--<input required type="date" name="fechain" title="Fecha ingreso:">-->
						
						
						
						<input type="submit" name="enviar" class="agregar" value="Agregar Entrada">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-right:42%" class="btn-regresar" href="productos.php">Volver</a>
						
                    <?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php endif; ?>
						
						
						<div class="formulario">
		
		                 <label for="caja_busquedas">Buscar Entrada:</label>
		                 <input type="text" name="caja_busquedas" id="caja_busquedas"></input>

                        </div>

	                   <div id="entrada"></div>
	
	              </section>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/entradas.js"></script>

         </article>	    
	</section>

</body>
</html>