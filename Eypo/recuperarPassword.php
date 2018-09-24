<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Eypo</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #005580">
		<a class="navbar-brand" href="login.php" style="width: 8%"> <img src="img/tituloEypo.png" alt="" style="width: 100%"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-3" style="background-color: #f4f4f4; border-radius: 5px">
					<br>
					<center>

				        <img src="img/tituloEypoAzul.png" alt="" style="width: 50%"><br>
				       	<span style="color: #005580">Recuperar Contraseña</span><br><br>

				    </center>
					<form action="enviarCorreoPassword.php" method="post">
				        <br>
				        <div class="form-group">
				          <label style="color: #808080"> Escribe el email registrado a la cuenta </label>
				          <input type="email" class="form-control" name="email" placeholder="ejemplo@algo.com" required>
				        </div><br><br>

				        <div class="form-group text-center">
				          <input type="submit" class="btn btn-primary" value="Recuperar"><br>
				          <p style="color: #808080"> ¿Ya recordaste? <a href="login.php">Inicia sesión</a></p>
				        </div>
					</form>
				</div>
			</div>
		</div>


<?php include "footer.php"; ?>

</body>
</html>
