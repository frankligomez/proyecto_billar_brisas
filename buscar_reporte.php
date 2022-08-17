<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "billarlasbrisas";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }


    $mensaje = "";
      
    
    
      $query = "
   SELECT  d.id_mesa, p.Nombre_producto, d.cantidad,d.tiempo, d.precio, d.fecha FROM detalleventa AS d LEFT JOIN entradas AS e ON d.id_entrada=e.Id_Entrada LEFT JOIN productos AS p ON e.id_Producto= p.Id_producto ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	        
        $query = "
    SELECT  d.id_mesa, p.Nombre_producto,d.cantidad,d.tiempo, d.precio, d.fecha FROM detalleventa AS d LEFT JOIN entradas AS e ON d.id_entrada=e.Id_Entrada LEFT JOIN productos AS p ON e.id_Producto= p.Id_producto WHERE fecha  LIKE '%$q%'";
        
        

    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$mensaje.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id=titulo>
                            <th>MESA</th>
                            <th>NOMBRE DEL PRODUCTO</th>
                            <th>CANTIDAD DE PRODUCTOS VENDIDOS</th>
                            <th>TIEMPO JUGADO</th>
                            <th>PRECIO</th>
                            <th>FECHA</th>
                          </tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
            if($fila['cantidad'] == ''){
                $nombre='No se vendio ningun producto';
            }else{
                $nombre = $fila['Nombre_producto'];
            }

            if($fila['cantidad']==''){
                $cantidad = 'No se vendio ningun producto';
            }else{
                $cantidad = $fila['cantidad'];
            }
    		$mensaje.="<tr>
                        <td>".$fila['id_mesa']."</td>
    					<td>".$nombre."</td>
    					<td>".$cantidad."</td>
                        <td>".$fila['tiempo']."</td>
    					<td>".$fila['precio']."</td>
    					<td>".$fila['fecha']."</td>
    				</tr>";

    	}
    	$mensaje.="</tbody></table>";
    }else{
    	$mensaje .= 'NO HAY PRODUCTOS PARA MOSTRAR';
    }


    echo $mensaje;

    $conn->close();



?>