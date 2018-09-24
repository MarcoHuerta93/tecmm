<?php 
    include "../conexion.php";
    $folio = $_POST['folio'];
    $sql = "SELECT * FROM dbEypo.dbo.arcos WHERE folio = '$folio'";
    $consulta = sqlsrv_query($conn, $sql);
    $Row = sqlsrv_fetch_array($consulta);

    echo $empresa = $Row['empresa'];

?>