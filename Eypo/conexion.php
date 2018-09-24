<?php
$serverName = "MARCO\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Pruebas15nov16", "UID"=>"sa", "PWD"=>"root2242");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     // echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br/>";
     die( print_r( sqlsrv_errors(), true));
}
?>
