<?php

require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Producto-Billiards Control</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/tabla.css">
	<link rel="icon" type="image/x-ico" href="img/billar.ico">
</head>
<body>
    <!--se llama ese archivo por metodo include(incluye) encabezado-->
<?php include 'vista/plantillas/header.php'; ?>
	<section class="main2">
		<div class="wrapp">
		
                <!--se llama ese archivo por metodo include(incluye) menu-->
            <?php include 'vista/plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Categorias</h2>
					</div>
                    
                    <!--incluye caracter especiales-->
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar categoria</h2>
						
                        <!-- informacion requerida obligatoria para rellenar la tabla categoria-->
						<input required type="text" name="nombre" title="Nombre Categoria:" placeholder="Nombre Categoria:">
						
                        
                        <!-- informacion requerida obligatoria para rellenar la tabla categoria-->
						
						<input required type="text" name="descripcion" title="Descripcion de Categoria:" placeholder="Descripcion de Categoria:">
						
						
                        
                        <input type="submit" name="enviar" class="agregar" value="Agregar Categoria">
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
                    <br>
					<a style="margin-right:44%" class="btn-regresar" href="productos.php">Volver</a>
						
						<!--mostrar tabla completa de categorias en busqueda-->
						<div class="formulario">  
		
                            <!--mostrar campo de la caja de busqueda-->
						
		                 <label for="caja_busquedasca">Buscar Categorias:</label>
		                 <input type="text" name="caja_busquedasca" id="caja_busquedasca">
                            </input>

                        </div>
                       
                       <!--llama la funcion de busqueda-->
						<div id="categorias"></div>
	
            <!--libreria para la busqueda-->
						</section>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/categoria.js"></script>

         </article>	    
</body>
</html>