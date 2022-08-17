<?php
    ob_start();
    use Dompdf\Dompdf;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "billarlasbrisas";

    $conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }


    $mensaje = "";
    if(isset($_POST['caja_busqueda'])){
        $caja_busqueda = $_POST['caja_busqueda'];
    }else{
        $caja_busqueda ='';
    }
    
     $query = "
    SELECT a.id_entrada, a.fecha_agregada, p.Codigo_Producto, p.Nombre_producto, c.nombreCategoria,p.id_Categoria, pp.Nombre_proveedor, SUM( a.Cantidad_Ingresar) AS Cantidad, p.precio, (SUM( a.Cantidad_Ingresar*p.precio))AS Precio_Total  FROM entradas a, productos p, proveedor pp, categorias c where a.id_Producto = p.Id_producto and a.id_Proveedor = pp.Id_proveedor and p.id_categoria=c.idCategoria AND p.Nombre_producto LIKE '%$caja_busqueda%' GROUP BY p.Nombre_producto";

    if (isset($_POST['consulta'])) {
        $q = $conn->real_escape_string($_POST['consulta']);
                
        $query = "
    SELECT a.id_entrada, a.fecha_agregada, p.Codigo_Producto, p.Nombre_producto, c.nombreCategoria,p.id_Categoria, pp.Nombre_proveedor, SUM( a.Cantidad_Ingresar) AS Cantidad, p.precio, (SUM( a.Cantidad_Ingresar*p.precio))AS Precio_Total  FROM entradas a, productos p, proveedor pp, categorias c where a.id_Producto = p.Id_producto and a.id_Proveedor = pp.Id_proveedor and p.id_categoria=c.idCategoria GROUP BY p.Nombre_producto";
        
       

    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
        $mensaje.="<table border=1 class=tabla_datos>
                <thead>
                    <tr id=titulo>
                            <th>Codigo Inventario</th>
                            <th>Fecha Ingreso</th>
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Valor Unitario</th>
                            <th>Cantidad Existente</th>
                            <th>Valor Total</th>
                          </tr>

                </thead>
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $mensaje.="<tr>
                        <td>".$fila['id_entrada']."</td>
                        <td>".$fila['fecha_agregada']."</td>
                        <td>".$fila['Codigo_Producto']."</td>
                        <td>".$fila['Nombre_producto']."</td>
                        <td>".$fila['nombreCategoria']."</td>
                        <td>".$fila['Nombre_proveedor']."</td>
                        <td>".$fila['precio']."</td>
                        <td>".$fila['Cantidad']."</td>
                        <td>".$fila['Precio_Total']."</td>
                    </tr>";

        }
        $mensaje.="</tbody></table>";
    }else{
        $mensaje .= 'NO HAY PRODUCTOS PARA MOSTRAR';
    }


    echo $mensaje;
    
    require_once 'dompdf/autoload.inc.php';
    $dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = "reporte_inventario".time().'.pdf';
    file_put_contents($filename, $pdf);
    $dompdf->stream($filename);

    $conn->close();



?>