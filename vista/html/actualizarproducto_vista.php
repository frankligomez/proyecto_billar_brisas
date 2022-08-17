<?php
require 'conexion.php';
$mensaje='';
$categorias = $conexion -> prepare("SELECT * FROM categorias");
$categorias ->execute();
$categorias = $categorias ->fetchAll();
if (!isset($_GET['id'])){
	$_GET['id'] = $_POST['id'];
}
$producto_get = $conexion -> query("SELECT * FROM productos where Id_producto  = " .$_GET['id']);
$producto_get = $producto_get ->fetchAll();


if(!$categorias)
	$mensaje .= 'NO hay categorias, por favor crearlas!';
?>
<html>
    <?php include 'vista/plantillas/header.php'; ?>
    <body>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PRODUCTOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR PRODUCTO</h2><br/>
                        
                        <input type="hidden" name="id" value="<?php echo $producto_get[0]['Id_producto'];?>" />
                        
                        
						<input required type="text" name="codigos" title="Codigo del Producto:" placeholder="Codigo del Producto:" value="<?php echo $producto_get[0]['Codigo_Producto'];?>" requerid>
						
						<input required type="text" name="nombres" title="Nombre del producto:" placeholder="Nombre del producto:" value="<?php echo $producto_get[0]['Nombre_producto'];?>">
						
						<input disabled type="text" name="fechas" title="Fecha ingreso:" value="<?php echo $producto_get[0]['fecha_agrega'];?>">
						
						<input type="numeric" name="valores" title="Precio Unidad:" placeholder="Precio Unidad:" value="<?php echo $producto_get[0]['precio'];?>">
						
						<select name="categorias"> 
                        <option value="" >Seleccione categoria:</option> 
                        <?php foreach ($categorias as $Sql): 

                        if ($producto_get[0]["id_categoria"] == $Sql['idCategoria']){
                        	?>
						<?php echo "<option value='". $Sql['idCategoria']. "' selected>". $Sql['nombreCategoria']. "</option>"; ?>
						<?php}?>
						<?php } ?>	
						<?php echo "<option value='". $Sql['idCategoria']. "'>". $Sql['nombreCategoria']. "</option>"?>					
						<?php endforeach; ?>
						</select>
						
						<input type="submit" name="enviar" class="agregar" value="Actualizar">
                        <input type="reset" name="enviar" class="agregar" value="Cancelar">
        
                     </form>
                    <a style="margin-center:25%" class="btn-regresar" href="productos.php">Volver</a>
				</article>
        </div>
	</section>

</body>
</html>




