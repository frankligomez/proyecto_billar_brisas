<?php
$mensaje='';
require 'conexion.php';

//CARGAR mesas EN EL SELECT
$mesas = $conexion -> prepare("SELECT * FROM mesa");

$mesas ->execute();
$mesas = $mesas ->fetchAll();

$productos = $conexion -> prepare("SELECT * FROM entradas e,productos p where e.id_Producto = p.Id_producto AND p.estado = 1 " );

$productos ->execute();
$productos = $productos ->fetchAll();


if(!$mesas)
	$mensaje .= 'NO hay mesas, por favor crearlas!';

if (!isset($_GET['id'])){
    $_GET['id'] = $_POST['mesa'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Producto-Billiards Control</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/tabla.css"> 
	<link rel="icon" type="image/x-ico" href="img/billar.ico">
</head>
<body>
	<section class="main">
		<div class="wrapp">

				<article>
					<div class="mensaje">
						<h2>Ventas de la Mesa N° <?php echo $_GET['id'];?></h2>
					</div>
					<form id="formularios" method="POST">
						<h2>Agregar producto</h2>
						<input type="hidden" id="id_entrada" name="id_entrada" value="">
						<select disabled name="mesa"> 
						<option id="mesa"  value="<?php echo $_GET['id'];?>">Mesa N° <?php echo $_GET['id'];?></option>
						</select>

						<select id="producto" name="producto"> 
                        <option value="" >Seleccione producto:</option> 
                        <?php foreach ($productos as $Sql): ?>
						<?php echo "<option value='". $Sql['id_Producto']."-".$Sql['Id_Entrada']. "'>". $Sql['Nombre_producto']." - $" .$Sql['precio']. "</option>"; ?>
						<?php endforeach; ?>
						</select>

						<input required type="text" id="cantidad" name="cantidad" title="Cantidad del Producto:" placeholder="Cantidad del Producto:">			
						
						<!-- <input type="button" id="enviar" name="enviar" value="Agregar Producto"> -->
						<button type="button" id="enviar" class="boton_agregar" name="enviar" >Agregar Producto</button>
						<input type="reset" name="" class="agregar" value="Cancelar">
										
					</form>
					
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>



						<div class="formulario">
		
		                 <label for="caja_busqueda">Buscar Productos:</label>
		                 <input type="text" name="caja_busqueda" id="caja_busqueda"/>

                        </div>

	                   <div id="datos"></div>
	                   <div>
	                   		<a class="btn-regresar" href="cierre_mesa.php?id=<?php echo $_GET['id'];?>" name="cerrar_mesa">Cerrar Mesa</a>
	                   </div>

	                   <div id="mensaje"></div>
	

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ventas.js"></script>
				</article>
        </div>
	</section>
<script type="text/javascript">
	$( "#enviar" ).click(function() {
		var dataString = 
                                "mesa=" + $("#mesa").val() +
                                "&producto=" + $("#producto").val() +
                                "&cantidad=" + $("#cantidad").val();
                $.ajax({

                    type: "POST",
                    url: "venta_productos.php",
                    data: dataString,
                    cache: false,
 
                    success: function (html) {
                    	$("#mensaje").html(html);
                      $( "#productos" ).load( "venta_productos.php?id="+$("#mesa").val() );
                    }
                });
                
              
              return false;
   });
</script>
</body>
</html>