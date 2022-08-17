<?php
require 'conexion.php';
$mensaje='';

$consultausu = $conexion -> prepare("
	SELECT * FROM usuarios u ,rol r where u.rol = r.id_rol limit 5");

$consultausu ->execute();
$consultausu = $consultausu ->fetchAll();
if(!$consultausu){
	$mensaje .= 'NO HAY USUARIOS PARA MOSTRAR';
}
?>
<html>
    <head>
     <link rel="stylesheet" type="text/css" href="css/tabla.css"> 
    </head>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>USUARIOS</h2>
					</div>
					
						<table class="tabla1">
						  <tr>
							<th>Nombres</th>
							<th>Apellidos</th>
                            <th>Usuario</th>
							<th>Roll</th>
                            <th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consultausu as $Sql): ?>
						<tr>
							<?php echo "<td>". $Sql['nombres']. "</td>"; ?>
                            <?php echo "<td>". $Sql['apellidos']. "</td>"; ?>
                            <?php echo "<td>". $Sql['usuario']. "</td>"; ?>
                            <?php echo "<td>". $Sql['nombre_rol']. "</td>"; ?>
                            <?php echo "<td class='boton-agregar'>"."<a href='actualizarusuario.php?id=".$Sql['id']."' class='editar'>Editar</a>". "</td>"; ?>
                            
                           <?php if ($Sql['estado'] == 1 && $_SESSION['usuario'] != $Sql['usuario']){?>
						  <?php echo "<td class='boton-agregar'>"."<a href='eliminar_usuario.php?id=".$Sql['id']."' class='eliminar'>Deshabilitar</a>". "</td>"; ?>
						  <?php } elseif ($Sql['estado'] == 2 && $_SESSION['usuario'] != $Sql['usuario']){?>
						  <?php echo "<td class='boton-agregar'>"."<a href='activar_usuario.php?id=".$Sql['id']."' class='eliminar'>Habilitar</a>". "</td>"; ?>
						  <?php } ?>
						  
						  
						  
						</tr>
						<?php endforeach; ?>
					</table>
							<?php  if(!empty($mensaje)): ?>
							  <ul>
								  <?php echo $mensaje; ?>
							  </ul>
							<?php  endif; ?>
                    <br>
                    <a style="margin-right: 85.4%" class="agregar" href="registrarusuarios.php">Agregar Usuarios</a>
				</article>
	</section>

</body>
</html>