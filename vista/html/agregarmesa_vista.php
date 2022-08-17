<?php
$mensaje='';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Producto-Billiards Control</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-ico" href="img/icono.ico">
</head>
<body>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MESAS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
						<h2>Crear Mesa</h2>
						<input required type="text" name="tipo" title="Tipo de mesa:" placeholder="Tipo de mesa:">
						
                        <input required type="file" name="imagen" /> <input type="submit" value="Crear mesa" /> 
						
						
						
						
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
					<a class="btn-regresar" href="ventas.php">Volver</a>
						
				</article>
	</section>

</body>
</html>