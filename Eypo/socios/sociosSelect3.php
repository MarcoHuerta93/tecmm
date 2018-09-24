<?php
include "../conexion.php";
$CodigoSN = $_POST['CodigoSN'];
$sql ="SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_SN_Direcciones WHERE CodigoSN = '$CodigoSN' ";
$consulta = sqlsrv_query($conn, $sql);
$Row = sqlsrv_fetch_array($consulta);

$ciudad = $Row['Ciudad'];
$calle = $Row['Calle'];
$cpostal = $Row['CP'];
$colonia = $Row['Colonia'];
$estado = $Row['Estado'];
$pais = $Row['Pais'];  
$idd = $Row['IdDireccion'];


$consultaDire = [  
  "ciudad" => $ciudad,
  "calle" => $calle,
  "cpostal" => $cpostal,
  "colonia" => $colonia,
  "estado" => $estado,
  "pais" => $pais,
  "idd" => $idd,
  
];

 echo json_encode($consultaDire);

 ?>