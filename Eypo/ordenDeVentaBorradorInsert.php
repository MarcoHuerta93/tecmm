<?php
    include "conexion.php";

    $usoPrincipal = $_POST['usoPrincipal'];
    $metodoPago = $_POST['metodoPago'];
    $formaPago = $_POST['formaPago'];
    $numLetra = $_POST['numLetra'];
    $tipoFactura = $_POST['tipoFactura'];
    $lab = $_POST['lab'];
    $condicionPago = $_POST['condicionPago'];
    $comentarios = $_POST['comentarios'];

    $sql = "INSERT INTO dbEypo.dbo.ordenes () 
    VALUES('$usoPrincipal','$metodoPago','$formaPago','$numLetra','$tipoFactura','$lab','$condicionPago','$comentarios')";
    $consulta = sqlsrv_query($conn, $sql);
    
?>