<?php
include "conexion.php";
$CodigoSN = $_POST['CodigoSN'];

$sql = "SELECT DISTINCT DescFormaPago FROM Pruebas15nov16.dbo.IV_EY_PV_SN_FormasPago sn
		INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_FormasPago fp ON sn.CodigoFormaPago = fp.CodigoFormaPago
		WHERE CodigoSN = '$CodigoSN' AND Activo = 'Y'";
        $consulta = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($consulta)) {
            echo $respuesta = '<option value="'.$row['DescFormaPago'].'">'.$row['DescFormaPago'].'</option>';                
        } 
?>