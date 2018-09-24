<?php
  include "conexion.php";
  $codigo =$_POST['code'];
  $sql ="SELECT ClasificacionSatCodigo FROM IV_EY_PV_Articulos WHERE CodigoArticulo = '$codigo'";
  $consulta = sqlsrv_query($conn, $sql);
  while ($row = sqlsrv_fetch_array($consulta)) {
    echo $ClasificacionSatCodigo = $row['ClasificacionSatCodigo'];
  }

 ?>
