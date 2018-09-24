

<?php 
include "../conexion.php";
	$prod = $_POST["productoFabricar"];
	$consultasql = sqlsrv_query($conn,"SELECT ItemName FROM OITM WHERE ItemCode = '$prod'");
	$Row = sqlsrv_fetch_array($consultasql);
	$itemName = $Row["ItemName"];
	echo $itemName;
 ?>