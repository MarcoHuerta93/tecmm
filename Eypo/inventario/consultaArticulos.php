<?php
  include "../conexion.php";
  $codigoSN = $_POST['code'];
  $sql ="SELECT TOP 1 * FROM Pruebas15nov16.dbo.IV_EY_PV_Articulos art 
  INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_ListasPrecios lp ON art.CodigoArticulo = lp.CodigoArticulo 
  INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_Stock stock ON art.CodigoArticulo = stock.CodigoArticulo
  INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_Almacenes al ON stock.CodigoAlmacen = al.CodigoAlmacen
  INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_GruposUnidadesMedida gum ON  art.CodigoGrupoUnidadMedida = gum.CodigoGrupoUnidadMedida 
  INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_Fabricantes fab ON art.CodigoFabricante = fab.CodigoFabricante
  WHERE art.CodigoArticulo = '$codigoSN'";
  $consulta = sqlsrv_query($conn, $sql);
  $Row = sqlsrv_fetch_array($consulta);

  $consultaunoatras = [   
    "gruposArticulos" => $Row['DescGrupoArticulo'],
    "codigoListaPrecios" => $Row['CodigoListaPrecios'],
    "clasificacionSATCodigo" => $Row['ClasificacionSatCodigo'],
    "codigoAlmacen" => $Row['CodigoAlmacen'],
    "nombreAlmacen" => utf8_encode($Row['NombreAlmacen']),
    "bloqueo" => $Row['Bloqueo'],
    "stock" => number_format($Row['EnStock'], 2, '.', ' '),
    "pedido" => number_format($Row['Solicitado'], 2, '.', ' '),
    "primeraUbicacion" => $Row['PrimeraUbicacion'],
    "ubicacionPorDef" => $Row['UbicacionPorDef'],
    "ejecUbiEstandar" => $Row['EjecUbiEstandar'],
    "disponible" => number_format($Row['Disponible'], 2, '.', ' '),
    "comprometido" => number_format($Row['Comprometido'], 2, '.', ' '),
    "descripcionUnidadMedida" => $Row['Descripcion'],
    "fabricante" => $Row['NombreFabricante'], 
    "sujetoImpuesto" => $Row['AplicaImpuesto'],
    "noAplicaGrupoDesc" => $Row['NoAplicaGrupDesc'],
    "idAdicional" => $Row['IdAdicional'],
    "codigoPredeterminado" => $Row['CodigoProveedor'],
    "NumCatFabricante" => $Row['NumCatFabricante'],
    "CantidadPaq_Com" => number_format($Row['CantidadPaq_Com'],2,'.',' '),
    "ComprasUM" => $Row['ComprasUM'],
    "InvUM" => $Row['InvUM'],
    "gestionPor" => $Row['GestionPor'], 

];

   echo json_encode($consultaunoatras);




?>
