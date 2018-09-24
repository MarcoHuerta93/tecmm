<?php
  include "../conexion.php";
  $var12 = $_POST['empresa'];
  $var0 = $_POST['folio'];
  $dateInicial = $_POST['dateInicial'];
  $var1 = $_POST['dateFinal'];
  $var2 = $_POST['nombreSolicitante'];
  $var3 = $_POST['nombreProyecto'];
  $var4 = $_POST['numeroDeOrden'];
  $var5 = $_POST['nombreCliente'];
  $var6 = $_POST['cantidadFabricar'];
  $var7 = $_POST['entregasParciales'];
  $var8 = $_POST['productosFabricar'];
  $var13 = $_POST['productosFabricarNombre'];
  $var14 = $_POST['productosDesarmar'];
  $var15 = $_POST['productosDesarmarNombre'];
  $var9 = $_POST['material'];
  $var10 = $_POST['terminadoFinal'];
  $var11 = $_POST['observaciones'];


  $sql = "INSERT INTO dbEypo.dbo.arcos (folio, fechaSolicitud, fechaEntrega, nombreSolicitante, nombreProyecto, 
  numeroOrden, nombreCliente, cantidadFabricar, entregasParciales, productoaFabricar, material, terminadoFinal, 
  observaciones, created_at, empresa, productosFabricarNombre, productosDesarmar, productosDesarmarNombre)
  VALUES ('$var0','$dateInicial','$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9','$var10',
    '$var11','$dateInicial','$var12','$var13','$var14','$var15')";

  $consultasql = sqlsrv_query($conn, $sql);

  if ($consultasql) {
    echo $respuesta =  '<div class="row" style="background-color: #b0ddb0; padding-top: 10px; padding-bottom: 10px; border-radius: 5px;">
      <div class="col-md-12">
        <span style="color: green;">Formato guardado con éxito</span>
      </div>
    </div>';
  } else {
    echo $respuesta =  '<div class="row" style="background-color: #f6bbbb; padding-top: 10px; padding-bottom: 10px; border-radius: 5px;">
      <div class="col-md-12">
        <span style="color: red;">Ocurrio un error al interntar guardar, favor de verificarlo</span>
      </div>
    </div>';
  }

 ?>
