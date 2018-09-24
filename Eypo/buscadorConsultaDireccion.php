<?php
include "conexion.php";

$valor = $_POST['valor'];
$cont=0;
$consultasql = sqlsrv_query($conn,"SELECT  CodigoSN, IdDireccion  FROM IV_EY_PV_SN_Direcciones WHERE CodigoSN LIKE '%$valor%' OR IdDireccion LIKE '%$valor%'") ;
while ($Row = sqlsrv_fetch_array($consultasql)) {
  $cont++;
?>
  <tr>
    <td><?php echo $cont;?></td>
    <td ><?php echo $Row['CodigoSN'];?></td>
    <td ><?php echo $Row['IdDireccion'];?></td>
  </tr>
<?php } ?>