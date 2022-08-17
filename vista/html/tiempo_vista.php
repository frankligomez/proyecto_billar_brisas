<html>
<head>
</head>

<?php include 'vista/plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'vista/plantillas/menumesa.php'; ?>
			
				<article> 
					<div class="mensaje">
						<h2>Billiards Control</h2>
					</div>
						<p><img src="img/logo.png">
						</p><br/><br/>
							<?php include 'crono.php'; ?>
							
							<div id="productos"></div>
                            
						
						</p>
				</article>
			</div>
	</section>
	
	
	<script type="text/javascript">
		

   $( "#productos" ).load( "venta_productos.php?id=<?php echo $_GET['id'];?>" );
	</script>
</body>
</html>