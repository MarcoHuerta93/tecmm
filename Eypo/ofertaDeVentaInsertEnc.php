<?php
  include "conexion.php";
  $dateCreate = $_POST['fecha'];
  $var0 = $_POST['cliente'];
  $var1 = $_POST['nombre'];
  $var2 = $_POST['personaContacto'];
  $var3 = $_POST['ordenCompra'];
  $var4 = $_POST['tipoMoneda'];
  $var15 = $_POST['usoPrincipal'];
  $var16 = $_POST['metodoPago'];
  $var17 = $_POST['formaPago'];
  $var5 = $_POST['ndoc'];
  $var6 = $_POST['cdoc'];        
  $var7 = $_POST['estado'];
  $var8 = $_POST['fconta'];
  $var9 = $_POST['fentrega'];
  $var10 = $_POST['fdoc'];
  $fvencimiento = $_POST['fvencimiento'];
  $var11 = $_POST['numLetra'];
  $var12 = $_POST['tipoFactura'];
  $var13 = $_POST['lab'];
  $var14 = $_POST['condicionPago'];
  $empleado = $_POST['empleado'];
  $NombrePropietario = $_POST['NombrePropietario'];
  $proyectoSN = $_POST['proyectoSN'];
  $ventasAdic = $_POST['ventasAdic'];
  $promotor = $_POST['promotor'];
  $cordVenta = $_POST['cordVenta'];
  $comentarios = $_POST['comentarios'];
  $totalAntesDescuento = $_POST['totalAntesDescuento'];
  $descNum = $_POST['descNum'];
  $descAplicado = $_POST['descAplicado'];
  $redondeo = $_POST['redondeo'];
  $impuesto = $_POST['impuesto'];
  $totalDelDocumento = $_POST['totalDelDocumento'];
  $actualizar = "N";
  $estatusActualizar = 0;
  $cancelar = "N";
  $estatusCancelar = 0;

  $sql1 ="SELECT * FROM dbEypo.dbo.ofertas WHERE DocNum = '$var6'";
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $stmt = sqlsrv_query( $conn, $sql1 , $params, $options );
  
  $row_count = sqlsrv_num_rows( $stmt );

  if ($row_count) {
    echo $row_count;
  } else {

   echo $sql = "INSERT INTO dbEypo.dbo.ofertas (DocNum, CodCliente, created_at, NombreC, ListContactos, OrdCompra, TipoMoneda, status, FConta, FEntrega, FDoc, Fvencimiento, NDoc, numLetra, TipoFactura, Lab, CondicionPago, UsoPrincipal, MetodoPago, FormaPago, Usuario, NombreUsuario, ProyectoSN, VentasAdic,
    Promotor, CordVenta, Comentarios, TotalDescuento, DescNum, DesAplicado, Redondeo, Impuesto, totalDelDocumento, Actualizar, EstatusActualizar, Cancelar, EstatusCancelar)
    VALUES ('$var6','$var0','$dateCreate','$var1','$var2','$var3','$var4','$var7','$var8','$var9','$var10', '$fvencimiento','$var5','$var11','$var12','$var13','$var14','$var15','$var16','$var17','$empleado',
      '$NombrePropietario','$proyectoSN','$ventasAdic','$promotor','$cordVenta','$comentarios',
      '$totalAntesDescuento','$descNum','$descAplicado','$redondeo','$impuesto','$totalDelDocumento','$actualizar','$estatusActualizar','$cancelar','$estatusCancelar')";

    $consultasql = sqlsrv_query($conn, $sql);

    
  }

  

 ?>
