<?php
$mensaje='';
require 'conexion.php';

//CARGAR CATEGORIAS EN EL SELECT
$categorias = $conexion -> prepare("SELECT * FROM categorias WHERE estado=1 ");

$categorias ->execute();
$categorias = $categorias ->fetchAll();
if(!$categorias)
	$mensaje .= 'NO hay categorias, por favor crearlas!';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Producto-Billiards Control</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-ico" href="img/billar.ico">
</head>
<body>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Productos</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar producto</h2>
						<input required type="text" name="codigo" title="Codigo del Producto:" placeholder="Codigo del Producto:">
						
						<input required type="text" name="nombre" title="Nombre del producto:" placeholder="Nombre del producto:">
						
						<input type="numeric" name="valor" title="Precio Unidad:" placeholder="Precio Unidad:">
						
						<select name="categoria"> 
                        <option value="" >Seleccione Categoria:</option> 
                        <?php foreach ($categorias as $Sql): ?>
						<?php echo "<option value='". $Sql['idCategoria']. "'>". $Sql['nombreCategoria']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						
						<input type="submit" name="enviar" class="agregar" value="Agregar Producto">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-left:25%" class="btn-regresar" href="productos.php">Volver</a>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
				</article>
        </div>
	</section>

</body>
</html>