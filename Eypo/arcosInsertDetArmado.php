<?php
  include "conexion.php";

  $folio = $_POST['folio'];
  $codigoArt = $_POST['codigoArt'];
  $nombreArt = $_POST['nombreArt'];
  $armadoDesarmado = $_POST['armadoDesarmado'];
   // print_r($total);

  echo $numArray =  count($codigoArt);
  $numa = $numArray - 2;

    for ($index=0; $index < $numa ; $index++) {
      $sql = "'".$folio;
      $sql = $sql."','".$codigoArt[$index];
      $sql = $sql."','".$nombreArt[$index];
      $sql = $sql."','".$armadoDesarmado[$index]."'";

       $consulta = "INSERT INTO dbEypo.dbo.arcosDet (Folio, NombreArt, CodigoArt, ArmadoDesarmado)
       VALUES"."(".$sql.")";
       $que = sqlsrv_query($conn, $consulta);
    }
    
 ?>
