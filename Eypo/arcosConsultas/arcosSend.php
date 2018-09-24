<?php 	
	include "../conexion.php";
	$cte = $_POST["cte"];
	
	$consultasql = sqlsrv_query($conn,"SELECT Nombre FROM IV_EY_PV_SociosNegocios WHERE CodigoSN = '$cte'");
	$Row = sqlsrv_fetch_array($consultasql);
	echo $Row["Nombre"];
?>