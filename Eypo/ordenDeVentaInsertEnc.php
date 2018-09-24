<?php
  include "conexion.php";
  $dateCreate = $_POST['fecha'];
  $var6 = $_POST['cdoc'];

  $sql1 ="SELECT * FROM dbEypo.dbo.ordenes WHERE CodOferta = '$var6'";
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $stmt = sqlsrv_query( $conn, $sql1 , $params, $options );
  
  $row_count = sqlsrv_num_rows( $stmt );

  if ($row_count) {
    echo $row_count;
  } else {
  $sql = "INSERT INTO dbEypo.dbo.ordenes (CodOferta, created_at) VALUES('$var6','$dateCreate')";

  $consultasql = sqlsrv_query($conn, $sql);

  }

 ?>
