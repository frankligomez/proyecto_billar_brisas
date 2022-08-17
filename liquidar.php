<?php 
	extract ($_REQUEST);
	require 'conexion.php';

		$precios = $conexion -> query(
			"SELECT SUM(p.precio * d.cantidad) AS precio_total FROM detalleventa d 
			LEFT JOIN  entradas e ON d.id_entrada = e.Id_Entrada 
			LEFT JOIN  productos p ON e.id_Producto = p.Id_producto 
			where d.id_mesa =" .$_GET['id']." AND d.cierre = 1");

		$resultado = $precios->fetch();
		$horas = $_POST['horas'];
		$minutos = $_POST['minutos'];
		$segundos = $_POST['segundos'];	
		$mesa = $_GET['id'];

		if($horas == '' || $minutos == '' || $segundos == ''){
			echo "<script>
	                alert('No ha iniciado una partida');
	    </script>";

		}else{
		echo '<script> $( "#liquidar" ).click(function() {
        var numero2 = parseInt(prompt("¿Esta seguro de liquidar la mesa?", 0));
   		})</script>';	
		if(($_GET['id'] == 1 or $_GET['id'] == 3) and $_POST['juego_libre'] == ''){
			if($resultado[0]==''){
				if ($_POST['juegos']==''){
			$juegos= 1*700;
		}else{
		$juegos = $_POST['juegos'] * 700;
		}
				$statement = $conexion->prepare(
		'INSERT INTO detalleventa (id_mesa,tiempo,precio ) values(:mesa,:tiempo,:precio)');

			$statement ->execute(array(
			':mesa'=>$mesa,
			':tiempo'=> $horas.$minutos.$segundos,
			':precio'=>$juegos
	       	));
	        echo "<script>
	                alert('Se ha liquidado la mesa con un valor de ". $juegos."');
	    </script>";
				}else{
					if ($_POST['juegos']==''){
			$juegos= 1*700 + $resultado['precio_total'];
		}else{
		$juegos = $_POST['juegos'] * 700 + $resultado['precio_total'];
		}

					$statement = $conexion->query(
					"UPDATE detalleventa
			        SET tiempo = ".$horas.$minutos.$segundos.", 
					precio =".$juegos." 
					WHERE cierre = 1 AND id_mesa = ".$_GET['id']);
					$mensaje = "Valor a pagar es de". $juegos;
					echo "<script>
			                alert('$mensaje');
			    			</script>";
							
				}
		
    	}else{
    		if($resultado[0]==''){
				$statement = $conexion->prepare(
		'INSERT INTO detalleventa (id_mesa,tiempo,precio ) values(:mesa,:tiempo,:precio)');
			if($segundos <= 10){
				$juegos = 1000;
			}else if($segundos <= 20 && $segundos >= 11){
				$juegos = 2000;
			}else if($segundos <= 30 && $segundos >= 21){
				$juegos = 3000;
			}else if($segundos <= 40 && $segundos >= 31) {
				$juegos = 4000;
			}
			$statement ->execute(array(
			':mesa'=>$mesa,
			':tiempo'=> $horas.$minutos.$segundos,
			':precio'=>$juegos
	       	));
	        echo "<script>
	                alert('Se ha liquidado la mesa con un valor de ". $juegos."');
	                window.location= 'agregarventas.php?id=".$_GET['id']."';
	    </script>";
				}else{
					if($segundos <= 10){
				$juegos = 1000;
			}else if($segundos <= 20 && $segundos >= 11){
				$juegos = 2000;
			}else if($segundos <= 30 && $segundos >= 21){
				$juegos = 3000;
			}else if($segundos <= 40 && $segundos >= 31) {
				$juegos = 4000;
			}
			$precio2 = $resultado['precio_total']+$juegos;
					$statement = $conexion->query(
					"UPDATE detalleventa
			        SET tiempo = ".$horas.$minutos.$segundos.", 
					precio =".$precio2." 
					WHERE tiempo IS NULL and precio IS NULL AND id_mesa = ".$_GET['id']);
					$mensaje = "Valor a pagar es de". $precio2;
					echo "<script>
			                alert('$mensaje');
			    			</script>";
							}
    	}
    }
	require 'agregarventas.php';
?>