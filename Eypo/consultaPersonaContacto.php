<?php
include "conexion.php";
$code = $_POST['code'];
$sql = "SELECT * FROM IV_EY_PV_SN_Contactos WHERE CodigoSN = '$code'";
$consulta = sqlsrv_query($conn, $sql);
while ($Row = sqlsrv_fetch_array($consulta)) {

echo  $algo = '<option value="'. $Row['CodigoContacto'] .'">'. $Row['CodigoContacto'] .'</option>';
	} ?>
