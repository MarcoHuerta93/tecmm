<?php
include "../conexion.php";
$valor = $_POST['valor'];
$sql="SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasCab WHERE FolioSAP LIKE '%$valor%' OR CodigoSN LIKE '%$valor%' OR Estatus LIKE '%$valor%' ORDER BY FolioSAP DESC";
$consulta = sqlsrv_query($conn, $sql);
while ($Row = sqlsrv_fetch_array($consulta)) {

?>
  <tr class="GridViewScrollItem">
    <td width="70px"><?php echo $Row['FolioSAP'];?></td>
    <td width="130px"><?php echo $Row['CodigoSN'];?></td>
    <td width="150px"><?php echo $Row['FechaContabilizacion']->format('Y-m-d');?></td>
    <td width="110px"><?php echo $Row['Estatus'];?></td>
  </tr>

<?php } ?>
