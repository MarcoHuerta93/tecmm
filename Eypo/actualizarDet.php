<?php
include "conexion.php";

$DocNum = $_POST['DocNum'];
$articulo = $_POST['articulo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$impu = $_POST['impu'];
$impuesto = $_POST['impuesto'];
$total = $_POST['total'];
$almacen = $_POST['almacen'];
$pendiente = $_POST['pendiente'];
$codigoPlanificacionSAP = $_POST['codigoPlanificacionSAP'];
$unidadMedidaSAP = $_POST['unidadMedidaSAP'];
$comentario1 = $_POST['comentario1'];
$comentario2 = $_POST['comentario2'];

$numArray = count($articulo);
  //  $na = $numArray - 1;
$consulta2 = "DELETE  FROM dbEypo.dbo.ofertadet WHERE DocNum = '$DocNum'";
$que = sqlsrv_query($conn, $consulta2);

for ($index = 0; $index < $numArray; $index++) {
    $sql = "'" . $DocNum;
    $sql = $sql . "','" . $articulo[$index];
    $sql = $sql . "','" . $descripcion[$index];
    $sql = $sql . "','" . $cantidad[$index];
    $sql = $sql . "','" . $precio[$index];
    $sql = $sql . "','" . $descuento[$index];
    $sql = $sql . "','" . $impu[$index];
    $sql = $sql . "','" . $impuesto[$index];
    $sql = $sql . "','" . $total[$index];
    $sql = $sql . "','" . $almacen[$index];
    $sql = $sql . "','" . $pendiente[$index];
    $sql = $sql . "','" . $codigoPlanificacionSAP[$index];
    $sql = $sql . "','" . $unidadMedidaSAP[$index];
    $sql = $sql . "','" . $comentario1[$index];
    $sql = $sql . "','" . $comentario2[$index]
        .
        "'";





    $consulta = "INSERT INTO dbEypo.dbo.ofertadet (DocNum, articulo, descripcion, cantidad, precioUnidad, 
     descuento, impu, impuesto, total, almacen, Cantidadpendiente, codigoPlanificacionSAP, unidadMedidaSAP, comentarioPartida1, comentarioPartida2)
       VALUES" . "(" . $sql . ")";
    $que = sqlsrv_query($conn, $consulta);

}
if (!$que) {
    echo "Algo Falló a la hora de guardar los valores de la tabla";
} else {
    echo "Actualizada correctamente";
}
?>
