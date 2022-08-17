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
    $mensaje1 = "";
      
    
      $query = "SELECT v.id_mesa, v.cierre, v.tiempo, v.cantidad, v.precio AS precio_total , p.Nombre_producto, p.precio FROM detalleventa v INNER JOIN entradas e ON v.id_entrada = e.Id_Entrada INNER JOIN productos p ON e.id_Producto=p.Id_producto WHERE v.id_mesa =".$_GET['id']." AND cierre = 1 ORDER By v.id_mesa ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);

        $query = "SELECT v.id_mesa, v.cierre, v.tiempo, v.cantidad, v.precio AS precio_total , p.Nombre_producto, p.precio FROM detalleventa v INNER JOIN entradas e ON v.id_entrada = e.Id_Entrada INNER JOIN productos p ON e.id_Producto=p.Id_producto WHERE v.id_mesa =".$_GET['id']." AND cierre = 1 AND p.Nombre_producto LIKE '%$q%' ";     
        

    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$mensaje.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id='titulo'>
    					<td>Mesa</td>
    					<td>Nombre Producto</td>
    					<td>Precio Unitario</td>
    					<td>Cantidad</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
            if (empty($fila['precio_total']) or empty($fila['tiempo'])){
                $fila['precio_total'] = 'Aun sin Liquidar';
                $fila['tiempo'] = 'Aun sin Liquidar';
            }
    		$mensaje.="<tr>
    					<td>".$fila['id_mesa']."</td>
    					<td>".$fila['Nombre_producto']."</td>
    					<td>".$fila['precio']."</td>
    					<td>".$fila['cantidad']."</td>
    				</tr>";
                    
            if($fila['cierre'] == 1){
            $mensaje1="<table border=1 class=tabla_datos>
                <thead>
                    <tr id='titulo'>
                        <td>Tiempo Jugado</td>
                        <td>Precio Total</td>
                    </tr>

                </thead>
                

        <tbody>
        <tr>
                        <td style='background-color:green; text-align:center;'>".$fila['tiempo']."</td>
                        <td style='background-color:green; text-align:center;'>$".$fila['precio_total']."</td>
        </tr>
        ";
}
    	}
    	$mensaje.="</tbody></table>";
    }else{
    	$mensaje .= 'NO HAY PRODUCTOS PARA MOSTRAR';
    }

    


    echo $mensaje;
    
    echo $mensaje1;

    $conn->close();



?>