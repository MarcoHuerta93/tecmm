<?php 
    include "conexion.php";
    $hoy = strtotime(date("Y-m-d"));
    $nuevafecha = date("Y-m-d", strtotime('-3 month', $hoy));

    $sql3 = "SELECT DISTINCT FolioSAP, FechaContabilizacion, estatusAutorizacion, Usuario, CodOferta FROM Pruebas15nov16.dbo.IV_EY_PV_BorradoresCab bc
    LEFT JOIN dbEypo.dbo.ordenes ord ON bc.FolioInterno = ord.NuevoDocEntry
    WHERE FechaContabilizacion >= '$nuevafecha' 
    ORDER BY FechaContabilizacion DESC";

    $consulta3 = sqlsrv_query($conn, $sql3);
    while ($Row = sqlsrv_fetch_array($consulta3)) {

        $estatusAutorizacion = $Row['estatusAutorizacion'];
        switch ($estatusAutorizacion) {
            case 'CREADO':
                $respuesta = "Documento aprobado y creado";
                break;
            case 'RECHAZADO':
                $respuesta = "Documento rechazado";
                break;
            case 'NA':
                $respuesta = "NA";
                break;
            case 'PENDIENTE':
                $respuesta = "Documento en proceso de autorización";
                break;
            case 'APROBADA':
                $respuesta = "Documento aprobado pendiente de creación";
                break;
        }

        echo $tblMensajes = '
            <tr class="text-center">                                                
                <td width="100px">' . $Row['FolioSAP'] . '</td>
                <td width="270px">' . $respuesta . '</td>
                <td width="130px">' . $Row['FechaContabilizacion']->format('Y-m-d') . '</td>
                <td width="100px">' . $Row['FechaContabilizacion']->format('h:i:s') . '</td>
                <td width="100px">' . $Row['Usuario'] . '</td>
                <td style="display: none">'. $Row['estatusAutorizacion']. '</td>
                <td style="display: none">' . $Row['CodOferta'] . '</td>
                <td><i class="far fa-envelope"></i></td>
            </tr>';
    }
?>