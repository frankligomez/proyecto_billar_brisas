<aside>
	<div class="wrapp">
	    <div class="widget">
			<a href="inicio.php" title="BilliardsControl"><i class="fa fa-camera-retro fa-lg"></i> Inicio</a>
			<a href="ventas.php" title="Ventas">Ventas</a>
			<a href="productos.php" title="Productos">Productos</a>
			<a href="inventario.php" title="Inventario">Inventario</a>
			<a href="caja.php" title="ReporteVentas">Reporte Ventas</a>
            
            
            <!--si el rol es=1(Activado)mostrar boton usuario si no es=1 no mostrar-->

			<?php if ($_SESSION['rol'] == 1){ ?>
			<a href="usuarios.php" title="Usuarios">Usuarios</a>
            <?php } ?>
        </div>     
	</div>
</aside>
