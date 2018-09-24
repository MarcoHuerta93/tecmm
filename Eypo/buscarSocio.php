<?php
include "conexion.php";

$socio = $_POST['socio'];
$cont=0;
$consultasql = sqlsrv_query($conn,"SELECT  CodigoSN, Nombre, Activo  FROM IV_EY_PV_SociosNegocios WHERE CodigoSN LIKE '%$socio%' or Nombre LIKE '%$socio%' or Activo LIKE '%$socio%'") ;
while ($Row = sqlsrv_fetch_array($consultasql)) {
  $cont++;
?>
  <tr>
    <td><?php echo $cont;?></td>
    <td ><?php echo $Row['CodigoSN'];?></td>
    <td ><?php echo $Row['Nombre'];?></td>
    <td ><?php echo $Row['Activo'];?></td>
  </tr>
<?php } ?>
