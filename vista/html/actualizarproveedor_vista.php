<?php
require 'conexion.php';
$mensaje='';

if (!isset($_GET['id'])){
	$_GET['id'] = $_POST['id'];
}
$proveedor_get = $conexion -> query("SELECT * FROM proveedor where Id_proveedor  = " .$_GET['id']);
$proveedor_get = $proveedor_get ->fetchAll();

?>
<html>
<?php include 'vista/plantillas/header.php'; ?>
<body>    
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PROVEEDORES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR PROVEEDOR</h2><br/>

                        <input type="hidden" name="id" value="<?php echo $proveedor_get[0]['Id_proveedor'];?>">
                        
                        <input required type="text" name="nombre" title="Nombre del proveedor:" placeholder="Nombre del proveedor:" value="<?php echo $proveedor_get[0]['Nombre_proveedor'];?>">
						
						<input required type="text" name="telefono" title="Telefono proveedor:" placeholder="Telefono del proveedor:" value="<?php echo $proveedor_get[0]['telefono_proveedor'];?>">
						
						<input type="text" name="correo" title="Correo proveedor:" placeholder="Correo electronico proveedor:" value="<?php echo $proveedor_get[0]['correo_proveedor'];?>">
						
						<input type="submit" name="enviar" value="Actualizar Proveedor">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-left:25%"class="btn-regresar" href="agregarcategorias.php">Volver</a>
						
						

	                   <div id="categorias"></div>
	
	              

         </article>	
        </div>
        </section>

</body>
</html>
