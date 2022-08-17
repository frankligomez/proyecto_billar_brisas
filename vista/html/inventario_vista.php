<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}


$consulta = $conexion -> prepare("
	SELECT a.id_entrada, a.fecha_agregada, p.Codigo_Producto, p.Nombre_producto, p.id_Categoria, pp.Nombre_proveedor, a.Cantidad_Ingresar, precio FROM entradas a, productos p, proveedor pp  where a.id_Producto = p.Id_producto and a.id_Proveedor = pp.Id_proveedor ORDER BY a.id_entrada");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY INVENTARIO PARA MOSTRAR';
}
?>
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
			<link rel="stylesheet" type="text/css" href="css/tabla.css">
				<article>
					<div class="mensaje">
						<h2>INVENTARIO</h2>
					</div>
						
						<!-- <table class="tabla">
						  <tr id="titulo">
							<th>Codigo Inventario</th>
							<th>Fecha Ingreso</th>
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
							<th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Valor Unitario</th>
                            <th>Cantidad Existente</th>
                            <th>Valor Total</th>
                           
                          </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
							<?php echo "<td>". $Sql['id_entrada']. "</td>"; ?>
                            <?php echo "<td>". $Sql['fecha_agregada']. "</td>"; ?>
                            <?php echo "<td>". $Sql['Codigo_Producto']. "</td>"; ?>
                            <?php echo "<td>". $Sql['Nombre_producto']. "</td>"; ?>
                            <?php echo "<td>". $Sql['id_Categoria']. "</td>"; ?>
                            <?php echo "<td>". $Sql['Nombre_proveedor']. "</td>"; ?>
                            <?php echo "<td>". $Sql['precio']. "</td>"; ?>
                            <?php echo "<td>". $Sql['Cantidad_Ingresar']. "</td>"; ?>
                            <?php echo "<td>". $Sql['precio']."</td>"; ?>
                            
                            
						</tr>
						<?php endforeach; ?>
					</table> -->
							<?php  if(!empty($mensaje)): ?>
							  <ul>
								  <?php echo $mensaje; ?>
							  </ul>
							<?php  endif; ?>
							<form action="pdf_inventario.php" method="POST">
							<div class="formulario">
		
		                 <label for="caja_busqueda">Buscar Productos:</label>
		                 <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
		                 <input type="submit" name="enviar" value="Reporte de Inventario">
                        </div>
                        </form>
                        <div id="datos"></div>
           						
            </article>	    
	</section>
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/inventario.js"></script>

</body>
</html>