<?php 
    include "../conexion.php";
    $folio = $_POST['codigoCte'];

    $sql = "SELECT SOC.Nombre FROM Pruebas15nov16.dbo.IV_EY_PV_OrdenesVentaCab ORVC 
    INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_SociosNegocios SOC ON ORVC.CodigoSN = SOC.CodigoSN
    WHERE ORVC.FolioSAP = '$folio'";
    $consulta = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($consulta);

    echo $nombreCliente = $row['Nombre'];
?>