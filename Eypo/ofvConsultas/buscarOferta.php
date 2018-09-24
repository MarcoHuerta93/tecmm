<?php
include "../conexion.php";
$cdoc = $_POST['codigo'];
  $sql = "SELECT vofv.Estatus as EstatusOFV, * FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasCab vofv
  LEFT JOIN dbEypo.dbo.ofertas ofer ON ofer.DocNum = vofv.FolioSAP 
  WHERE FolioSAP = '$cdoc'";
  $consulta = sqlsrv_query($conn, $sql );
  $Row = sqlsrv_fetch_array($consulta);
  if ($Row['FEntrega'] == null) {
    $feDate = date("Y-m-d", strtotime("1900-01-01"));
  } else {
    $feDate = $Row['FEntrega']->format('Y-m-d');
  }
      $consultaunoatras = [
        "CodCliente" => $Row['CodigoSN'],
        "NombreC" => $Row['NombreC'],
        "ListContactos" => $Row['ListContactos'],
        "OrdCompra" => $Row['OrdCompra'],
        "TipoMoneda" => $Row['Moneda'],
        "usoPrincipal" => $Row['UsoPrincipal'],
        "metodoPago" => $Row['MetodoPago'],
        "formaPago" => $Row['IdFormaPago'],

        "NDoc" => $Row['NDoc'],
        "DocNum" => $Row['FolioSAP'],
        "Status" => $Row['EstatusOFV'],
        "FConta" => $Row['FechaContabilizacion']->format('Y-m-d'),
        "FEntrega" => $feDate,
        "FDoc" => $Row['FechaDocumento']->format('Y-m-d'),
        "Fvencimiento" => $Row['FechaVencimiento']->format('Y-m-d'),

        "numLetra" => $Row['numLetra'],
        "TipoFactura" => $Row['TipoFactura'],
        "Lab" => $Row['Lab'],
        "CondicionPago" => $Row['CondicionPago'],

        "proyectoSN" => $Row['ProyectoSN'],
        "ventasAdic" => $Row['VentasAdic'],
        "Promotor" => $Row['Promotor'],
        "cordVenta" => $Row['CordVenta'],
        "comentarios" => $Row['Comentarios'],

        "totalDescuento" => $Row['SubTotalDocumento'],
        "descNum" => $Row['DescNum'],
        "desAplicado" => $Row['DesAplicado'],
        "redondeo" => $Row['Redondeo'],
        "impuesto" => $Row['SumaImpuestos'],
        "totalDelDocumento" => $Row['TotalDocumento'],
      ];
      echo json_encode($consultaunoatras);
  ?>
