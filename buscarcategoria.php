<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "billarlasbrisas";

	$cone = new mysqli($servername, $username, $password, $dbname);
      if($cone->connect_error){
        die("Conexión fallida: ".$cone->connect_error);
      }


    $mens = "";
      
//busqueda de la tabla categoria de todos los campos se agrupen por categoria
    $query = "SELECT * FROM categorias WHERE nombreCategoria NOT LIKE '' ORDER By idCategoria LIMIT 25";
    
     // recibe los campos del formulario para su busqueda en la tabla categorias 
    if (isset($_POST['consultasca'])) {
    	$c = $cone->real_escape_string($_POST['consultasca']);  
    	$query = "SELECT * FROM categorias WHERE nombreCategoria LIKE '%$c%' OR descripcionCategoria LIKE '%$c%' OR fecha LIKE '%$c%'"; //la variable c es la que va a recibir la busqueda y simplemente en cada campo se buscara lo que se fue escrito.
        
        
        
        

    }

    $resulta = $cone->query($query);


//num_rows es el que obtiene los resultados de la busqueda  
    if ($resulta->num_rows>0) {
    	$mens.="<table border=1 class=tabla_datos>
    			<thead>
    				<tr id='titulo'>
    					<td>Nombre Categoria</td>
    					<td>Descripcion Categoria</td>
                        <td>Fecha Creacion</td>
    					<td>Opcion</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($cat = $resulta->fetch_assoc()) {
            $estado='';
            if ($cat['estado'] == 1){
              $estado= "<td class='centrar'><a href='actualizarcategoria.php?id=".$cat['idCategoria']."' class='editar'> Editar</a> "." <a href='eliminar_categoria.php?id=".$cat['idCategoria']."' class='eliminar'>Deshabilitar</a>". "</td>"; 
              }else{ 
              $estado= "<td class='centrar'> <a href='actualizarcategoria.php?id=".$cat['idCategoria']."' class='editar'> Editar</a>"." <a href='activar_categoria.php?id=".$cat['idCategoria']."' class='eliminar'>Habilitar</a>". "</td>"; 
              } 
            
            //variable cat agrupa toda la consultay muestra el resultado de la tabla de la base de datos
    		$mens.="<tr>
    					<td>".$cat['nombreCategoria']."</td>
    					<td>".$cat['descripcionCategoria']."</td>
    					<td>".$cat['fecha']."</td>
                        ".$estado."
                    </tr>";

    	}
    	$mens.="</tbody></table>";
    }else{
    	$mens .= 'NO HAY CATEGORIAS PARA MOSTRAR';
    }


    echo $mens;

    $cone->close();



?>