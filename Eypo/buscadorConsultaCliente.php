<?php
include "conexion.php";

$valor = $_POST['valor'];
$cont=0;
$consultasql = sqlsrv_query($conn,"SELECT  CodigoSN, Nombre  FROM IV_EY_PV_SociosNegocios WHERE CodigoSN LIKE '%$valor%' or Nombre LIKE '%$valor%'") ;
while ($Row = sqlsrv_fetch_array($consultasql)) {
  $cont++;
?>
  <tr>
    <td width="50px"><?php echo $cont;?></td>
    <td width="120px"><?php echo $Row['CodigoSN'];?></td>
    <td width="350px" ><?php echo $Row['Nombre'];?></td>
  </tr>
<?php } ?>    
