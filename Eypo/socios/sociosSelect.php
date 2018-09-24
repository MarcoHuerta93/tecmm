  <?php
  include "../conexion.php";
  $CodigoSN = $_POST['CodigoSN'];
  $sql ="SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_SociosNegocios
  WHERE CodigoSN = '$CodigoSN' ";
  $consulta = sqlsrv_query($conn, $sql);
  $Row = sqlsrv_fetch_array($consulta);

  $consultaunoatras = [
    "grupo" => $Row['GrupoSN'],
    "moneda" => $Row['Moneda'],
    "rfc" => $Row['RFC'],
    "saldoCuenta" => number_format($Row['SaldoTotal'], 2, '.', ' '),
    "saldoEntrega" => number_format($Row['SaldoEntrega'], 2, '.', ' '),
    "saldoPedidos" => number_format($Row['SaldoPedidos'], 2, '.', ' '),
    "telefono1" => $Row['Tel1'],
    "telefono2" => $Row['Tel2'],
    "correoElectronico" => $Row['Email'],
    "tipo" => $Row['Tipo'],
    "condicionesPago" => $Row['CondicionesPago'],
    "listaPrecios" => number_format($Row['CodigoListaPrecios'], 2, '.', ' '),
    "limiteCredito" => number_format ($Row['LimiteCredito'], 2, '.', ' '),
    "limiteComprometido" => number_format($Row['LimiteComprometido'], 2, '.', ' '),
    "personaContacto" => $Row['PersonaContacto'],
    "curp" => $Row['Curp'],
    "vendedor" => $Row['Vendedor'],
    "idFiscalFederalUnificado" => $Row['IdFiscalFederalUn'],

  ];

  echo json_encode($consultaunoatras);

  ?>
