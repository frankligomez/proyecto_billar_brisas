<?php
$mensaje='';

$mebillar = $conexion -> prepare("
		SELECT 	* FROM mesa order by Id_Mesa limit 5");

$mebillar ->execute();
$mebillar = $mebillar ->fetchAll();
if(!$mebillar){
	$mensaje .= 'NO HAY MESAS PARA MOSTRAR';
}
?>
<html>
<head>
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
						<h2>MESAS DE JUEGO</h2>
					</div>
                   
                  
                   
                    <table border=1 class=tabla_datos>
						  <tr id='titulo'>
							<th>Id mesa</th>
							<th>Tipo de mesa</th>
							<th>Mesa</th>
                            <th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($mebillar as $Sql): ?>
						<tr>
							<?php echo "<td>". $Sql['Id_Mesa']. "</td>"; ?>
                            <?php echo "<td>". $Sql['Tipo_Mesa']. "</td>"; ?>
                            <td><?php echo '<img src="'.$Sql['Img_mesa']. '" width="150" heigth="150" />'; ?></td>
                            
                            <?php echo "<td class='centrar'>"."<a href='agregarventas.php?id=".$Sql['Id_Mesa']."' class='editar2' target='_blank'>Activar</a>". "</td>"; ?>
                            
						  
						</tr>
						<?php endforeach; ?>
					</table>
							<?php  if(!empty($mensaje)): ?>
							  <ul>
								  <?php echo $mensaje; ?>
							  </ul>
							<?php  endif; ?>
					<br>
						  <a href="agregamesa.php" class="crearmesas" >Crear Mesa</a><br>
				</article>
	</section>

        </div>
</body>
</html>