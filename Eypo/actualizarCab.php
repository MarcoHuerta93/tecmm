<?php
include "conexion.php";
$var1 = $_POST['cdoc'];
$var2 = $_POST['usoPrincipal'];
$var3 = $_POST['metodoPago'];
$var4 = $_POST['formaPago'];
$var5 = $_POST['condicionPago'];
$var6 = $_POST['numLetra'];
$var7 = $_POST['tipoFactura'];
$var8 = $_POST['lab'];
$updated_at = $_POST['hoy'];
$comentarios = $_POST['comentarios'];
$updateOferta = 0;
$actualizar = 'S';

$sql = "UPDATE dbEypo.dbo.ofertas SET UsoPrincipal = '$var2', MetodoPago = '$var3', FormaPago = '$var4',
CondicionPago = '$var5', numLetra = '$var6', TipoFactura = '$var7', Lab = '$var8', updated_at = '$updated_at', 
Comentarios = '$comentarios', Actualizar = '$actualizar', EstatusActualizar = '$updateOferta' WHERE DocNum = '$var1'";

$consultasql = sqlsrv_query($conn, $sql);

if ($consultasql) {
  echo "Actualizado Correctamente";
} else {
  echo "Ocurrio un error, favor de verificarlo";

}

?>
