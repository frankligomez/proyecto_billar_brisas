<?php
$mensaje='';
require 'conexion.php';


$consulta = $conexion -> prepare("
	SELECT id_mesa,  SUM(cantidad) as cantidad_total, SUM(precio) as precio_total  , fecha FROM detalleventa GROUP by id_mesa,  CAST(fecha AS DATE)");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY VENTAS PARA MOSTRAR';
}
?>
<?php include 'vista/plantillas/header.php'; ?>
	</div>
	<section class="main2">
		<div class="wrapp">
			 <link rel="stylesheet" type="text/css" href="css/tabla.css">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>VENTAS DIARIAS</h2>
					</div>
					<!-- <table class="tabla">
						  <tr>
							<th>MESA</th>
							<th>CANTIDAD DE PRODUCTOS VENDIDOS</th>
							<th>PRECIO</th>
							<th>FECHA</th>
				          </tr>
						  
						<?php foreach ($consulta as $Sql): ?>
						<tr>
							<?php echo "<td>". $Sql['id_mesa']. "</td>"; ?>
							<?php echo "<td>". $Sql['cantidad_total']. "</td>"; ?>
							<?php echo "<td>". $Sql['precio_total']. "</td>"; ?>
							<?php echo "<td>". $Sql['fecha']. "</td>"; ?>
                    	</tr>
						<?php endforeach; ?>
					</table> -->
                        
							<?php  if(!empty($mensaje)): ?>
							  <ul>
								  <?php echo $mensaje; ?>
							  </ul>
							<?php  endif; ?>
							<form action="pdf.php" method="POST">
							<div class="formulario">
		
		                 <label for="caja_busqueda">Buscar Fecha:</label>
		                 <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
		                 <input type="submit" name="enviar" value="Reporte de ventas">
                        </div>
                        </form>

	                   <div id="datos"></div>
							
				</article>
	</section>
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/reporte.js"></script>

</body>
</html>