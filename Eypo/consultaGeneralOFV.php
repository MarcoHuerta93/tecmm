<?php
  include "conexion.php";
  $us = $_POST['us'];
  // $valor = $_POST['valor'];
  $sql = "SELECT * FROM  dbEypo.dbo.ofertas WHERE Usuario = '$us' "; 
  $consulta = sqlsrv_query($conn, $sql);

  while($Row = sqlsrv_fetch_array($consulta)){
    echo $tblOfertaGeneral = '<tr>
                    <td>'.$Row['DocNum'].'</td>
                    <td>'.$Row['CodCliente'].'</td>
                    <td>'.$Row['created_at']->format('Y-m-d').'</td>
                    <td>'.$Row['Status'].'</td>';
  }
?>
