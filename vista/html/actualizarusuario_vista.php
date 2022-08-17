<?php
$mensaje='';
require 'conexion.php';
//CARGAR roles EN EL SELECT
$roles = $conexion -> prepare("SELECT * FROM rol");
if (!isset($_GET['id'])){
	$_GET['id'] = $_POST['id'];
}
$usuario_get = $conexion -> query("SELECT * FROM usuarios where id = " .$_GET['id']);
$usuario_get = $usuario_get ->fetchAll();
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
						<h2>Actualizar Usuarios</h2>

						<input type="hidden" name="id" id="id" value="<?php echo $usuario_get[0]['id'];?>" />

						<select name="rol"> 
                        <option value="" >Seleccione Rol:</option> 
                        <?php foreach ($roles as $Sql): 
                        if ($usuario_get[0]["rol"] == $Sql['id_rol']){
                        	?>
						<?php echo "<option value='". $Sql['id_rol']. "' selected>". $Sql['nombre_rol']. "</option>"; ?>
						<?php}else{?>
						<?php echo "<option value='". $Sql['id_rol']. "'>". $Sql['nombre_rol']. "</option>"?>
						<?php } ?>						
						<?php endforeach; ?>
						</select>

						<input required type="text" name="usuario" title="Usuario:" placeholder="Usuario:" value="<?php echo $usuario_get[0]["usuario"] ?>">

						<input type="password" name="pass" title="Contraseña:" placeholder="Contraseña:">
												
						<input required type="text" name="nombre" title="Nombres:" placeholder="Nombres:" value="<?php echo $usuario_get[0]['nombres'] ?>">

						<input required type="text" name="apellido" title="Apellidos:" placeholder="Apellidos:" value="<?php echo $usuario_get[0]['apellidos'] ?>">
												
						<input type="submit" name="enviar" class="agregar" value="Actualizar Usuario">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-left:25%" class="btn-regresar" href="usuarios.php">Volver</a>
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