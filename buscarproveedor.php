<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "billarlasbrisas";

	$conex = new mysqli($servername, $username, $password, $dbname);
      if($conex->connect_error){
        die("Conexión fallida: ".$conex->connect_error);
      }


    $mensaj = "";
      
    $query = "SELECT * FROM proveedor WHERE Nombre_proveedor NOT LIKE '' ORDER By Id_proveedor LIMIT 25";
    
     
    if (isset($_POST['consultaspro'])) {
    	$p = $conex->real_escape_string($_POST['consultaspro']);
    	$query = "SELECT * FROM proveedor WHERE Nombre_proveedor LIKE '%$p%' OR telefono_proveedor LIKE '%$p%' OR correo_proveedor LIKE '$p'";
        
        
        
        

    }

    $res = $conex->query($query);

    if ($res->num_rows>0) {
    	$mensaj.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id='titulo'>
    					<td>Nombre Proveedor</td>
    					<td>Telefono Proveedor</td>
                        <td>Correo Electronico Proveedor</td>
    					<td>Opcion</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($pro = $res->fetch_assoc()) {
            $estado='';
            if ($pro['estado'] == 1){
              $estado= "<td class='centrar'><a href='actualizarproveedor.php?id=".$pro['Id_proveedor']."' class='editar'> Editar</a> "." <a href='eliminar_proveedor.php?id=".$pro['Id_proveedor']."' class='eliminar'>Deshabilitar</a>". "</td>"; 
              }else{ 
              $estado= "<td class='centrar'> <a href='actualizarproveedor.php?id=".$pro['Id_proveedor']."' class='editar'> Editar</a>"." <a href='activar_proveedor.php?id=".$pro['Id_proveedor']."' class='eliminar'>Habilitar</a>". "</td>"; 
              } 
    		$mensaj.="<tr>
    					<td>".$pro['Nombre_proveedor']."</td>
    					<td>".$pro['telefono_proveedor']."</td>
    					<td>".$pro['correo_proveedor']."</td>
                        ".$estado."
                      </tr>";

    	}
    	$mensaj.="</tbody></table>";
    }else{
    	$mensaj.= 'NO HAY PROVEEDORES PARA MOSTRAR';
    }


    echo $mensaj;

    $conex->close();



?>