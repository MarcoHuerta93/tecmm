<?php
include "../conexion.php";
    $cdoc = $_POST['cdoc'];
    $cont = 0;
    $sql = "SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_OrdenesVentaDet ofvd WHERE ofvd.FolioInterno = '$cdoc'";
    $consulta = sqlsrv_query($conn, $sql);
    while ($Row = sqlsrv_fetch_array($consulta)) {
      $cont++;

      echo $linea = '<tr>
                      <td>'.$cont.'</td>
                      <td>'.$Row['CodigoArticulo'].'</td>
                      <td>'.$Row['NombreArticulo'].'</td>
                      <td>'.number_format($Row['Quantity'],2,'.','').'</td>
                      <td>'.number_format($Row['PrecioUnitario'],2,'.','').'</td>
                      <td>'.number_format($Row['PrecioConDescuento'],2,'.','').'</td>
                      <td>'.number_format($Row['Impuestos'],2,'.','').'</td>
                      <td style="display: none"></td>
                      <td>'.number_format($Row['TotalLinea'],2,'.',''). '</td>
                      <td>'.$Row['Almacen'].'</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td></tr>';
  } ?>
