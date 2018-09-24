<?php 

$idUsuario = $_SESSION['idUsuario'];
session_start();

session_destroy();

if (!$idUsuario) {
    print "<script>window.location='login.php';</script>";
} else {
    print "<script>alert(\"No se pudo cerrar sesión, intentelo mas tarde.\");window.location='index.php';</script>";
}

?>