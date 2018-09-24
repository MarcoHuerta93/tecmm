<?php
include "../conexion.php";
$CodigoSN = $_POST['CodigoSN'];
$sql ="SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_SociosNegocios WHERE CodigoSN = '$CodigoSN' ";
$consulta = sqlsrv_query($conn, $sql);
$Row = sqlsrv_fetch_array($consulta);

$grupo = $Row['GrupoSN'];
$moneda = $Row['Moneda'];
$rfc = $Row['RFC'];
$saldoCuenta = $Row['SaldoTotal'];
$saldoEntrega = $Row['SaldoEntrega'];
$saldoPedidos = $Row['SaldoPedidos'];
$telefono1 = $Row['Tel1'];
$correoElectronico = $Row['Email'];
$tipo = $Row['Tipo'];
$condicionesPago = $Row['CondicionesPago'];

$listaPrecios = $Row['CodigoListaPrecios'];
$limiteCredito = $Row['LineaCredito'];
// $limiteComprometido = $Row[''];


$consultaunoatras = [
  "grupo" => $grupo,
  "moneda" => $moneda,
  "rfc" => $rfc,
  "saldoCuenta" => $saldoCuenta,
  "saldoEntrega" => $saldoEntrega,
  "saldoPedidos" => $saldoPedidos,
  "telefono1" => $telefono1,
  "correoElectronico" => $correoElectronico,
  "tipo" => $tipo,
  "condicionesPago" => $condicionesPago,
  "listaPrecios" => $listaPrecios,
  "limiteCredito" => $limiteCredito,
  // "codigoImpuesto" => $limiteComprometido,
];

 echo json_encode($consultaunoatras);



 ?>
