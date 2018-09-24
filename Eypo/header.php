<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/favicon.ico"/>
	<!-- <link rel="stylesheet"  href="css/normalize.css"> -->

	<?php include "conexion.php"; ?>

</head>

<body>


	<nav class="navbar navbar-expand-lg" style="background-color: #005580">
	  <a class="navbar-brand" href="ofertaDeVenta.php" style="width: 8%"> <img src="img/tituloEypo.png" alt="" style="width: 100%"> </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="ofertaDeVenta.php" id="btnOfertaDeVenta" title="Oferta de venta"><b>Oferta de venta</b></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ordenDeVenta.php" id="btnOrdenDeVenta" title="Orden de venta"><b>Orden de venta</b></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ofertaDeCompra.php" id="btnOfertaDeCompra" title="Oferta de compra"><b>Solicitud de compra</b></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" id="btnOrdenDeCompra" title="Orden de compra"><b>Orden de compra</b></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="arcos.php" id="btnArcos" title="Armado/Fabricación"><b>Armado/Fabricación</b></a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="socios.php" id="btnSocios" title="Socios"><b>Socios</b></a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="inventario.php" id="btnInventario" title="Inventario"><b>Inventario</b></a>
	      </li>
				<li class="nav-item">
					<a class="nav-link text-right" href="destroySession.php" id="btnCerrarSesion" title="Cerrar sesión"><b>Cerrar sesión</b></a>
	      </li>
	    </ul>
	  </div>

	</nav>

</body>


</html>
