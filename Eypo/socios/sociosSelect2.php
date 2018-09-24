<?php
include "../conexion.php";
$CodigoSN = $_POST['CodigoSN'];
$sql ="SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_SN_Contactos WHERE CodigoSN = '$CodigoSN' ";
$consulta = sqlsrv_query($conn, $sql);
$Row = sqlsrv_fetch_array($consulta);

$cargos = $Row['Posicion'];
$codigo = $Row['CodigoContacto'];
$nombre = $Row['Nombre'];



$consultaunoatrass = [  
  "cargos" => $cargos,
  "codigo" => $codigo,
  "nombre" => $nombre,
  
];

 echo json_encode($consultaunoatrass);

 ?>