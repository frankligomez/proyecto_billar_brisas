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
      
    
    
      $query = "SELECT p.estado,Id_producto,Codigo_Producto, Nombre_producto, fecha_agrega, precio, nombreCategoria FROM productos AS p INNER JOIN categorias AS c ON p.id_categoria = c.idCategoria  ORDER By Id_producto";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	        
        $query = "SELECT p.estado,Id_producto,Codigo_Producto, Nombre_producto, fecha_agrega, precio, nombreCategoria FROM productos AS p INNER JOIN categorias AS c ON p.id_categoria = c.idCategoria WHERE Codigo_Producto LIKE '%$q%' OR Nombre_producto LIKE '%$q%' OR fecha_agrega LIKE '%$q%' OR precio LIKE '%$q%' OR nombreCategoria LIKE '%$q%'";
        
        

    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$mensaje.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id='titulo'>
    					<td>Codigo</td>
    					<td>Nombre</td>
    					<td>Fecha Ingreso</td>
    					<td>Valor Unidad</td>
                        <td>Categoria</td>
    					<td>Opcion</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
            $estado='';
            if ($fila['estado'] == 1){
              $estado= "<td class='centrar'><a href='actualizarproducto.php?id=".$fila['Id_producto']."' class='editar'> Editar</a> "." <a href='eliminar_producto.php?id=".$fila['Id_producto']."' class='eliminar'>Deshabilitar</a>". " </td>"; 
              }else{ 
              $estado= "<td class='centrar'><a href='actualizarproducto.php?id=".$fila['Id_producto']."' class='editar'> Editar</a> "." <a href='activar_producto.php?id=".$fila['Id_producto']."' class='eliminar'>Habilitar</a>". " </td>"; 
              } 
    		$mensaje.="<tr>
    					<td>".$fila['Codigo_Producto']."</td>
    					<td>".$fila['Nombre_producto']."</td>
    					<td>".$fila['fecha_agrega']."</td>
    					<td>".$fila['precio']."</td>
                        <td>".$fila['nombreCategoria']."</td>
                        ".$estado."

    				</tr>";


    	}
    	$mensaje.="</tbody></table>";
    }else{
    	$mensaje .= 'NO HAY PRODUCTOS PARA MOSTRAR';
    }


    echo $mensaje;

    $conn->close();



?>