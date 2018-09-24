<?php
include "conexion.php";
$user = $_POST['user'];
$pass = $_POST['pass'];


$sql = "SELECT * FROM  IV_EY_PV_Usuarios WHERE [User] = '$user' AND Password = '$pass'";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$consulta = sqlsrv_query( $conn, $sql , $params, $options );
$row_count = sqlsrv_num_rows( $consulta );

if ($row_count === 0) {
	echo $algo = '<span style="color: red; border-radius: 5px; padding-top: 10px; padding-bottom: 10px;">Credenciales invalidas, favor de verificarlo.</span>';
} else {
		session_start();
		$_SESSION['usuario'] = $user;
		echo "<script>window.location='ofertaDeVenta.php';</script>";
}


 ?>
