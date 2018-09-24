<?php
include "../conexion.php";
$cdoc = $_POST['cdoc'];
$cont = 0;
$sql = "SELECT distinct ofvd.*, ofdet.codigoPlanificacionSAP,ofdet.cantidadPendiente ,ofdet.unidadMedidaSAP, 
        ofdet.comentarioPartida1, ofdet.comentarioPartida2 
        FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasDet ofvd
        LEFT  JOIN dbEypo.dbo.ofertadet ofdet ON ofvd.FolioInterno = ofdet.DocNum
        WHERE ofvd.FolioInterno = '$cdoc'";
$consulta = sqlsrv_query($conn, $sql);
while ($Row = sqlsrv_fetch_array($consulta)) {
  $cont++;

  echo $linea = '<tr>
                    <th><a href="#" style="color: red" id="eliminarFila"><i class="fas fa-trash-alt"></i></a></th>
                    <td>' . $cont . '</td>
                    <td class="narticulo">' . $Row['CodigoArticulo'] . '</td>   
                    <td class="darticulo">' . $Row['NombreArticulo'] . '</td>   
                    <td class="cantidad">' . number_format($Row['Quantity']) . '</td>
                    <td class="precio">' . number_format($Row['PrecioUnitario'], 2, '.', '') . '</td>
                    <td class="descuento">' . number_format($Row['PrecioConDescuento'], 2, '.', '') . '</td>
                    <td class="impu">' . number_format($Row['Impuestos'], 2, '.', '') . '</td>
                    <td style="display: none" class="impuesto">' . number_format($Row['PrecioConDescuento'], 2, '.', '') . '</td>
                    <td class="total">' . number_format($Row['TotalLinea'], 2, '.', '') . '</td>
                    <td class="almacen">' . $Row['Almacen'] . '</td>
                    <td class="pendiente">' . $Row['cantidadPendiente'] . '</td>
                    <td class="codigoPlanificacionSAP">' . $Row['codigoPlanificacionSAP'] . '</td>
                    <td class="unidadMedidaSAP">' . $Row['unidadMedidaSAP'] . '</td>
                    <td class="comentario1">' . $Row['comentarioPartida1'] . '</td>
                    <td class="comentario2">' . $Row['comentarioPartida2'] . '</td></tr>';
} ?>     
