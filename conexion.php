<?php
try{
	$conexion = new PDO('mysql:host=localhost;dbname=billarlasbrisas','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
?>
<!-- octopuspro282522
billarlasbrisas -->