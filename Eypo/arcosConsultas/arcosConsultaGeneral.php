<?php 
	include "../conexion.php";

	$folio = $_POST['folio'];
	$sql = "SELECT * FROM dbEypo.dbo.arcos WHERE folio = '$folio'";
	$consulta = sqlsrv_query($conn, $sql);
	$Row = sqlsrv_fetch_array($consulta);

	$consultaunoatras = [
		"folio" => $Row['folio'],
		"fechaSolicitud" => $Row['fechaSolicitud'],
		"fechaEntrega" => $Row['fechaEntrega'],
		"nombreSolicitante" => $Row['nombreSolicitante'],
		"nombreProyecto" => $Row['nombreProyecto'],
		"numeroOrden" => $Row['numeroOrden'],
		"nombreCliente" => $Row['nombreCliente'],
		"cantidadFabricar" => $Row['cantidadFabricar'],
		"entregasParciales" => $Row['entregasParciales'],
		"productoaFabricar" => $Row['productoaFabricar'],
		"material" => $Row['material'],
		"terminadoFinal" => $Row['terminadoFinal'],
		"observaciones" => $Row['observaciones'],
		"empresa" => $Row['empresa'],
		"productoFabricarNombre" => $Row['productosFabricarNombre'],
		"productosDesarmar" => $Row['productosDesarmar'],
		"productosDesarmarNombre" => $Row['productosDesarmarNombre'],
	];

	echo json_encode($consultaunoatras);
?>