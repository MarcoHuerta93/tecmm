<?php
include "conexion.php";

$valor = $_POST['valor'];
$cont=0;
$consultasql = sqlsrv_query($conn,"SELECT DISTINCT lp.CodigoArticulo, lp.Precio, art.NombreArticulo, st.CodigoAlmacen, st.EnStock, st.Comprometido, st.Solicitado, al.NombreAlmacen
FROM ((( Pruebas15nov16.dbo.IV_EY_PV_Articulos art
INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_ListasPrecios lp ON art.CodigoArticulo = lp.CodigoArticulo)
INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_Stock st ON lp.CodigoArticulo = st.CodigoArticulo)
INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_Almacenes al ON st.CodigoAlmacen = al.CodigoAlmacen) WHERE art.CodigoArticulo LIKE '%$valor%' OR art.NombreArticulo LIKE '%$valor%'");
while ($Row = sqlsrv_fetch_array($consultasql)) {
  $cont++;

  $Nalmacen = utf8_encode($Row['NombreAlmacen']);
?>
<tr>
  <td><?php echo $cont;?></td>
  <td><?php echo utf8_encode($Row['CodigoArticulo']);?></td>
  <td><?php echo utf8_encode($Row['NombreArticulo']);?></td> 
  <td style="display: none"><?php echo $Row['Precio'];?></td>
  <td><?php echo number_format($Row['EnStock'],2,'.','');?></td>
  <td><?php echo number_format($Row['Comprometido'],2,'.','');?></td>
  <td><?php echo number_format($Row['Solicitado'],2,'.','');?></td>
  <td><?php echo $Row['CodigoAlmacen'];?></td>
  <td><?php echo $Nalmacen; ?></td>

</tr>
<?php } ?>
