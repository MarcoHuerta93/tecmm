<?php
include "../conexion.php";
$cdoc = $_POST['codigo'];
  $sql = "SELECT TOP 1 * FROM Pruebas15nov16.dbo.IV_EY_PV_OrdenesVentaCab orv
    INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_SociosNegocios soc ON orv.CodigoSN = soc.CodigoSN
    LEFT JOIN Pruebas15nov16.dbo.IV_EY_PV_SN_Contactos con ON orv.CodigoSN = con.CodigoSN
    WHERE orv.FolioSAP = '$cdoc'";
  $consulta = sqlsrv_query($conn, $sql );
  $Row = sqlsrv_fetch_array($consulta);  	

$consultaunoatras = [
    "CodCliente" => $Row['CodigoSN'],
    "NombreC" => $Row['Nombre'],
    "ListContactos" => $Row['CodigoContacto'],
    "OrdCompra" => $Row['Referencia'],
    "TipoMoneda" => $Row['Moneda'],
    "usoPrincipal" => $Row['UsoCFDi'],
    "metodoPago" => $Row['MetodoPago'],
    "formaPago" => $Row['IdFormaPago'],
	// "NDoc" => $Row['NDoc'],
    "DocNum" => $Row['FolioSAP'],
    "Status" => $Row['Estatus'],
    "FConta" => $Row['FechaContabilizacion']->format('Y-m-d'),
	// "FEntrega" => $feDate,
    "FDoc" => $Row['FechaDocumento']->format('Y-m-d'),
    "Fvencimiento" => $Row['FechaVencimiento']->format('Y-m-d'),
    "numLetra" => $Row['NumeroLetra'],
    "TipoFactura" => $Row['TipoFactura'],
    "Lab" => $Row['LAB'],
    "CondicionPago" => $Row['DescCondicionesPago'],

    "comentarios" => $Row['Comentarios'],
    "totalDescuento" => $Row['SubTotalDocumento'],
	// "descNum" => $Row['DescNum'],
	// "desAplicado" => $Row['DesAplicado'],
	// "redondeo" => $Row['Redondeo'],
    "impuesto" => $Row['SumaImpuestos'],
    "totalDelDocumento" => $Row['TotalDocumento'],
  ];
  echo json_encode($consultaunoatras);
  ?>
