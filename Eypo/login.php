<!DOCTYPE html>
<html>
<head>
	<title>Eypo Login</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #005580">
  	<a class="navbar-brand" href="login.php" style="width: 8%">
			<img src="img/tituloEypo.png" alt="" style="width: 100%">
		</a>
	</nav>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-5 offset-md-3" style="border-radius: 5px; background-color: #f4f4f4">
				<br>

				<div class="mensajeRespuesta" style="text-align: center;"></div>
				<br>
				<center>
					<i class="fas fa-user-circle" style="font-size: 8rem; color: #005580"></i><br>
					<span style="color: #005580">Inicia Sesión</span>
				</center>
				<br>
				<div class="text-center">
					<img src="img/tituloEypoAzul.png" alt="" style="width: 50%;">
				</div>
				<br>
				<div class="form-group">
					<input  type="text" class="form-control inEnter" id="user" placeholder="Usuario">
			  </div>
			  <div class="form-group" style="margin-bottom: 0px;">
					<input type="password" class="form-control inEnter" id="pass" maxlenght="20" placeholder="Password">
				</div>
				<div class="row" style="margin: auto;">
					<a href="recuperarPassword.php">
						<span style="color: grey;">¿Olvidaste tu password?</span>
					</a>
				</div>
				<div class=" text-center">
					<br><br>
					<button class="btn btn-success btn-block" type="button" id="iniciarSesion">Iniciar Sesión</button>
				</div>
					<br>
			</div>
		</div>
	</div>
  <?php include "footer.php"; ?>
</body>
<script type="text/javascript">

	function	iniciarSesion(){
		var user = $('#user').val();
		var pass = $('#pass').val();

		$.ajax({
			type: 'post',
			url: 'validalogin.php',
			data: {
				user: user,
				pass: pass
			},
			success: function(res){
				$(".mensajeRespuesta").empty();
				$(".mensajeRespuesta").show();
				$(".mensajeRespuesta").append(res);
			}
		});
	}

	$("#iniciarSesion").on('click', function(){
		iniciarSesion();
	});

	var input = document.getElementById("user");
	input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("iniciarSesion").click();
    }
	});

	var input = document.getElementById("pass");
	input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("iniciarSesion").click();
    }
	});


</script>
</html>
