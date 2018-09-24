<?php 
	include "../conexion.php";
	$folio = $_POST['folio'];

	$sql ="SELECT ArmadoDesarmado FROM dbEypo.dbo.arcosDet WHERE Folio = '$folio'";
	$consulta = sqlsrv_query($conn, $sql);
	$Row = sqlsrv_fetch_array($consulta);

	$variables = [
		"estado" => $Row['ArmadoDesarmado'],
	]; 

	echo json_encode($variables);
 ?>