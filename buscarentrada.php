<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "billarlasbrisas";


	$con = new mysqli($servername, $username, $password, $dbname);
      if($con->connect_error){
        die("Conexión fallida: ".$con->connect_error);
      }

    $mensaje = "";

    $query = "SELECT e.Id_Entrada, p.Nombre_producto, pr.Nombre_proveedor, e.Cantidad_Ingresar, e.fecha_agregada FROM entradas AS e INNER JOIN productos AS p ON e.id_Producto=p.Id_producto INNER JOIN proveedor AS pr ON e.id_Proveedor=pr.Id_proveedor WHERE Id_Entrada NOT LIKE '' ORDER By Id_Entrada LIMIT 25";

    if (isset($_POST['consultas'])) {
    	$f = $con->real_escape_string($_POST['consultas']);
    	$query = "SELECT e.Id_Entrada, p.Nombre_producto, pr.Nombre_proveedor, e.Cantidad_Ingresar, e.fecha_agregada FROM entradas AS e INNER JOIN productos AS p ON e.id_Producto=p.Id_producto INNER JOIN proveedor AS pr ON e.id_Proveedor=pr.Id_proveedor WHERE  Id_Entrada LIKE '%$f%' OR Nombre_producto LIKE '%$f%' OR Nombre_proveedor LIKE '%$f%' OR fecha_agregada LIKE '%$f%' OR Cantidad_Ingresar LIKE '$f'";
    }

    $result = $con->query($query);

    if ($result->num_rows>0) {
    	$mensaje.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id='titulo'>
    					<td>Codigo Entrada</td>
    					<td>Nombre Producto</td>
    					<td>Nombre Proveedor</td>
    					<td>Cantidad Ingresada</td>
    					<td>Fecha de Ingreso</td>
                                              
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($filas = $result->fetch_assoc()) {
    		$mensaje.="<tr>
    					<td>".$filas['Id_Entrada']."</td>
    					<td>".$filas['Nombre_producto']."</td>
    					<td>".$filas['Nombre_proveedor']."</td>
    					<td>".$filas['Cantidad_Ingresar']."</td>
    					<td>".$filas['fecha_agregada']."</td>
      				   </tr>";

    	}
    	$mensaje.="</tbody></table>";
    }else{
    	$mensaje .= 'NO HAY ENTRADAS PARA MOSTRAR';
    }


    echo $mensaje;

    $con->close();



?>