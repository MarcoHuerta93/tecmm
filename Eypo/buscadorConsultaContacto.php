<?php
include "conexion.php";

$valor = $_POST['valor'];
$cont=0;
$consultasql = sqlsrv_query($conn,"SELECT  CodigoSN, CodigoContacto  FROM IV_EY_PV_SN_Contactos WHERE CodigoSN LIKE '%$valor%' or CodigoContacto LIKE '%$valor%'") ;
while ($Row = sqlsrv_fetch_array($consultasql)) {
  $cont++;
?>
  <tr>
    <td><?php echo $cont;?></td>
    <td ><?php echo $Row['CodigoSN'];?></td>
    <td ><?php echo $Row['CodigoContacto'];?></td>   
  </tr>
<?php } ?>
