<?php
require 'conexion.php';
$mensaje='';

if (!isset($_GET['id'])){
	$_GET['id'] = $_POST['id'];
}
$categoria_get = $conexion -> query("SELECT * FROM categorias where idCategoria  = " .$_GET['id']);
$categoria_get = $categoria_get ->fetchAll();

?>
<html>
    
<?php include 'vista/plantillas/header.php'; ?>
    <body>
	<section class="main2">
		<div class="wrapp">
			<?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CATEGORIAS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR CATEGORIA</h2><br/>
                        
                        <input type="hidden" name="id" value="<?php echo $categoria_get[0]['idCategoria'];?>" />
                        
                        <input required type="text" name="nombre" title="Nombre Categoria:" placeholder="Nombre Categoria:" value="<?php echo $categoria_get[0]['nombreCategoria'];?>" requerid>

						<input required type="text" name="descripcion" title="Descripcion de Categoria:" placeholder="Descripcion de Categoria:" value="<?php echo $categoria_get[0]['descripcionCategoria'];?>" requerid>
						
						<input disabled type="text" name="descripcion" title="Fecha Ingreso:" placeholder="Fecha Ingreso:" value="<?php echo $categoria_get[0]['fecha'];?>" requerid>
						
                        
						<input type="submit" class="agregar" name="enviar" value="Actualizar Categoria">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
            <br>
					<a style="margin-left:25%" class="btn-regresar" href="agregarcategorias.php">Volver</a>
						
						

	                   <div id="categorias"></div>
                
	
            </article>
            
        </div>
        </section>
        
    </body>
</html>