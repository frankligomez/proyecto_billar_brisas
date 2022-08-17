<?php
$mensaje='';
require 'conexion.php';
//CARGAR roles EN EL SELECT
$roles = $conexion -> prepare("SELECT * FROM rol");

$roles ->execute();
$roles = $roles ->fetchAll();
if(!$roles)
	$mensaje .= 'NO hay roles, por favor crearlas!';
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
						<h2>Usuarios</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Usuarios</h2>

						<select name="rol"> 
                        <option value="" >Seleccione Rol:</option> 
                        <?php foreach ($roles as $Sql): ?>
						<?php echo "<option value='". $Sql['id_rol']. "'>". $Sql['nombre_rol']. "</option>"; ?>
						<?php endforeach; ?>
						</select>

						<input required type="text" name="usuario" title="Usuario:" placeholder="Usuario:">

						<input required type="password" name="pass" title="Contraseña:" placeholder="Contraseña:">
												
						<input required type="text" name="nombre" title="Nombres:" placeholder="Nombres:">
    
						<input required type="text" name="apellido" title="Apellidos:" placeholder="Apellidos:">
												
						<input type="submit" name="enviar" class="agregar" value="Agregar Usuario">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a  style="margin-left:25%" class="btn-regresar" href="usuarios.php">Regresar</a>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>

</body>
</html>