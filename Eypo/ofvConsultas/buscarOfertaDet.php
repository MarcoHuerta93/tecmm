<?php
	include "../conexion.php";
	$cdoc = $_POST['cdoc'];
  $sql = "SELECT * FROM dbEypo.dbo.ofertaDet WHERE DocNum = '$cdoc'";
	$consulta = sqlsrv_query($conn, $sql);
	while ($Row = sqlsrv_fetch_array($consulta)) {

		echo $linea = '<tr>
										<td>'.$Row['articulo'].'</td>
										<td>'.$Row['descripcion'].'</td>
										<td>'.$Row['cantidad'].'</td>
										<td>'.$Row['precioUnidad'].'</td>
										<td>'.$Row['descuento'].'</td>
										<td>'.$Row['impu'].'</td>
										<td style="display: none">'.$Row['impuesto'].'</td>
										<td>'.$Row['total'].'</td>
										<td>'.$Row['almacen'].'</td>
										<td>'.$Row['cantidadPendiente'].'</td>
										<td>'.$Row['codigoPlanificacionSAP'].'</td>
										<td>'.$Row['unidadMedidaSAP'].'</td>
										<td>'.$Row['comentarioPartida1'].'</td>
										<td>'.$Row['comentarioPartida2'].'</td></tr>';
 }

 ?>
