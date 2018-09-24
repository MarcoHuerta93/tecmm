<?php
include "conexion.php";
session_start();
$_SESSION['usuario'];

$empleadoVentas = $_SESSION['usuario'];

$sql = "SELECT lastName, firstName, middleName FROM OHEM WHERE U_IV_EY_PV_User = '$empleadoVentas'";
$consulta = sqlsrv_query($conn, $sql);
while ($Row = sqlsrv_fetch_array($consulta)) {
	$nombre = $Row['firstName'];
	$sNombre = $Row['middleName'];
	$apellido = $Row['lastName'];
}
$nombreCompleto = $nombre . " " . $sNombre . " " . $apellido;


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Eypo Arcos</title>
	</head>
	<body>
		<?php include "header.php"; ?>
		<?php include "modales.php" ?>
		<div class="container" id="contenedorDePagina">
		<br>
		<div class="mensaje"></div>
		<br>

		<?php include "btnEncaArcos.php"; ?>
		<div class="novaluxEnca">
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-9" style="background-color: #005580; text-align: center;">
					<img src="img/tituloEypo.png" alt="EYPO" style="max-width: 20%">
				</div>

				<div class="col-md-3" style="border: 1px solid; text-align: center;">
					<img id="imgChange" src="img/pecPuebla.png" alt="EYPO" style="max-width: 38%">
					<input type="hidden" id="empresa" value="pec">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="color: white; background-color: #005580">
					<span style="font-size: 1.3rem">FORMATO DE FABRICACIÓN DE PRODUCTO NOVALUX - EYPO</span>
					<?php
						$sql ="SELECT TOP 1 folio FROM dbEypo.dbo.arcos ORDER BY folio DESC";
						$consultasql = sqlsrv_query($conn, $sql);
						$Row = sqlsrv_fetch_array($consultasql);
						$numRes = sqlsrv_num_rows($consultasql);
						$folio = $Row['folio'];
						if ($numRes) {
							$folio = 0;
						}
						$folio++;
					?>
					<input type="text" value="<?php echo "$folio"; ?>" id="folio" style="float: right; font-size: 1.3rem; background: none; border: none; width: 13%; text-align: center; color: white">
					<span style="float: right; font-size: 1.3rem" >Folio:</span>
				</div>
			</div>
		</div>
      	<br>
		<div id="desarmeArme">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
			      		<label class="col-sm-4 col-form-label col-form-label-sm">Fecha Solicitud: </label>
				      	<div class="col-sm-7">
							<input id="dateInicial" type="date" value="">
				      	</div>
				    </div>
				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Fecha Entrega Requerida: </label>
				      	<div class="col-sm-7">
				        	<input type="date" id="dateFinal">
							<span id="cursor" title="Sujeto a programa de planta" style=" font-size: 1.5rem;">*</span>
				      	</div>
				    </div>
				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Solicitante: </label>
				      	<div class="col-sm-7">
				        	<input type="text"  id="nombreSolicitante" value="<?php echo "$nombreCompleto"; ?> ">
				      	</div>
				    </div>
				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Proyecto: </label>
				      	<div class="col-sm-7">
				        	<input type="text" value="" id="nombreProyecto"	>
				      	</div>
				    </div>
				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm"	>Numero Orden Venta SAP: </label>
				      	<div class="col-sm-7">
							<select name="" id="numeroDeOrden">
								<option value="" disabled selected>Selecciona Orden</option>
								<?php
							$consultasql = sqlsrv_query($conn, "SELECT FolioSAP FROM IV_EY_PV_OrdenesVentaCab");
							while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
								<option value="<?php echo $Row['FolioSAP']; ?>"><?php echo $Row['FolioSAP']; ?></option>
									<?php 
							} ?>
							</select>
			      		</div>
			    	</div>
			    	<div class="row">
		      			<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Cliente SAP: </label>
				      	<div class="col-sm-7">
				        	<input type="text" value="" id="nombreCliente">
		      			</div>
		   			</div>
					<div class="row">
			      		<label class="col-sm-4 col-form-label col-form-label-sm">Cantidad a Fabricar: </label>
				      	<div class="col-sm-7">
							<input type="text" class="col-sm-3" id="cantidadFabricar" placeholder="$" style="display: inline-block">
							<!-- <input type="text"> -->
				      	</div>
				    </div>
				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Entregas Parciales Aceptadas Especifique: </label>
				      	<div class="col-sm-7">
				        	<select name="entregasParciales" id="entregasParciales">
				        		<option value="" disabled selected>Seleccione</option>
				        		<option value="si">Si</option>
				        		<option value="no">No</option>
				        	</select>
				      	</div>
					</div>

					<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Código y Descripción del Producto: </label>
				      	<div class="col-sm-7">
							<input type="text" value="" id="codigoProducto" class="col-sm-3" placeholder="Codigo">
							<input type="text" value="" id="descripcionProducto" placeholder="Descripcion">
							<a href="#" data-toggle="modal" data-target="#myModalArticulos">
								<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Cliente"></i>
							</a>
				      	</div>
				    </div>

				    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Descripción (Detallado): </label>
				      	<div class="col-sm-7">
							<input type="text" value="" id="productosFabricarNombre" style="width: 100%">
				      	</div>
				    </div>
					<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Terminado Final: </label>
				      	<div class="col-sm-7">
				        	<select name="" id="terminadoFinal" >
				        		<option value=""></option>
				        		<option value="acero Negro">Acero Negro</option>
				        		<option value="acero galvanizado en frio">Acero Galvanizado en Frio</option>
				        		<option value="acero galvanizado en caliente">Acero Galvanizado en caliente</option>
				        		<option value="primario Rojo Oxido">Primario Rojo Oxido</option>
				        		<option value="pintado en blanco con electroestatica">Pintado en blanco con electroestatica</option>
				        		<option value="otros">Otros</option>
				        	</select>
				      	</div>
					</div>
				  	<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Observaciones: </label>
				      	<div class="col-sm-7">
				        	<textarea name="" id="observaciones" cols="49%" rows="1"></textarea>
				      	</div>
				  	</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10">
				<table class="table table-bordered text-center">
					<td></td>
					<th>Pieza Muestra</th>
					<th>Ficha Técnica</th>
					<th>Dibujo</th>
					<th>Diagrama</th>
					<th>Otro</thtext-align:>

					<tr>
						<th>Se entrega Para Fabricación</th>
						<td>
							<select name="" id="SePM" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="SeFt" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="SeDib" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="SeDia" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="SeOtr" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Se Termina de Fabricar</th>
						<td>
							<select name="" id="StPM" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="StFt" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="StDib" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="StDia" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="StOtr" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Fabricado por</th>
						<td>
							<select name="" id="FabPM" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="FabFt" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="FabDib" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="FabDia" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
						<td>
							<select name="" id="FabOtr" class="form-control" >
								<option value="no">No</option>
								<option value="si">Si</option>
							</select>
						</td>
					</tr>
				</table>
			</div>
		</div>
	   	<?php include "footer.php"; ?>
    </body>

    <?php
		if(!empty($_GET['folio'])){
			$folio = $_GET['folio']; ?>

			<script>
				var folio = <?php echo "$folio"; ?>;

				$.ajax({
					url:'arcosConsultas/arcosConsultaGeneral.php',
					type:'post',
					dataType:'json',
					data: {folio: folio },
					success: function(resp){
						$("#dateInicial").val(resp['fechaSolicitud'])
						$("#dateFinal").val(resp['fechaEntrega'])
						$("#nombreSolicitante").val(resp['nombreSolicitante'])
						$("#nombreProyecto").val(resp['nombreProyecto'])
						$("#numeroDeOrden").val(resp['numeroOrden'])

						$("#nombreCliente").val(resp['nombreCliente'])
						$("#cantidadFabricar").val(resp['cantidadFabricar'])
						$("#entregasParciales").val(resp['entregasParciales'])

						$("#productosFabricarNombre").val(resp['productosFabricarNombre'])

						$("#material").val(resp['material'])
						$("#terminadoFinal").val(resp['terminadoFinal'])
						$("#observaciones").val(resp['observaciones'])

					},
				});
			</script>  
	<?php }	?>

  		<script>

		$("#numeroDeOrden").on('change', function(){
				var valor = this.value;

				$.ajax({
					url: 'arcosConsultas/sacarNombreCliente.php',
					type: 'POST',
					data: {codigoCte : valor}

				}).done(function(response) {
					$("#nombreClientecant").val(response);
				});
		});

		$("#btnGuardar").on('click', function(){
			var folio = $('#folio').val();
			var dateInicial = $('#dateInicial').val();
			var dateFinal = $('#dateFinal').val();
			var nombreSolicitante = $('#nombreSolicitante').val();
			var nombreProyecto = $('#nombreProyecto').val();
			var numeroDeOrden = $('#numeroDeOrden').val();

			var nombreCliente = $('#nombreCliente').val();
			var cantidadFabricar = $('#cantidadFabricar').val();
			var entregasParciales = $('#entregasParciales').val();
			var codigoProducto = $('#codigoProducto').val();
			var descripcionProducto = $('#descripcionProducto').val();
			var productosFabricarNombre = $('#productosFabricarNombre').val();

			// var material = $('#material').val();
			var terminadoFinal =  $('#terminadoFinal').val();
			var observaciones = $('#observaciones').val();
			var empresa = $('#empresa').val();

			var SePM = $ ('#SePM').val();
			var SeFt = $ ('#SeFt').val();
			var SeDib = $ ('#SeDib').val();
			var SeDia = $ ('#SeDia').val();
			var SeOtr = $ ('#SeOtr').val();

			var StPM = $ ('#StPM').val();
			var StFt = $ ('#StFt').val();
			var StDib = $ ('#StDib').val();
			var StDia = $ ('#StDia').val();
			var StOtr = $ ('#StOtr').val();

			var FabPM = $ ('#FabPM').val();
			var FabFt = $ ('#FabFt').val();
			var FabDib = $ ('#FabDib').val();
			var FabDia = $ ('#FabDia').val();
			var FabOtr = $ ('#FabOtr').val();



			$.ajax({
			  	type:'post',
				url:"arcosInsertManual.php",
				data:{
				    folio: folio,
					dateInicial: dateInicial,
				    dateFinal: dateFinal,
				    nombreSolicitante: nombreSolicitante,
				    nombreProyecto: nombreProyecto,
				    numeroDeOrden: numeroDeOrden,
				    nombreCliente: nombreCliente,
				    cantidadFabricar: cantidadFabricar,
					entregasParciales: entregasParciales,
					codigoProducto : codigoProducto,
					descripcionProducto : descripcionProducto,
				    productosFabricarNombre: productosFabricarNombre,
				    // material: material,
				    terminadoFinal: terminadoFinal,
				    observaciones: observaciones,
					empresa: empresa,
					SePM : SePM,
					SeFt : SeFt,
					SeDib : SeDib,
					SeDia : SeDia,
					SeOtr : SeOtr,
					StPM : StPM,
					StFt : StFt,
					StDib : StDib,
					StDia : StDia,
					StOtr : StOtr,
					FabPM : FabPM,
					FabFt : FabFt,
					FabDib : FabDib,
					FabDia : FabDia,
					FabOtr : FabOtr,
			   	},
			  	success: function(resp){    
					$(".mensaje").append(resp);
					setTimeout('document.location.reload()',2000);
			    },
			});
		});

		$("#buscadorArticulo").keypress(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) {
				var valorEscrito = $("#buscadorArticulo").val();
				if (valorEscrito) {       
					$.ajax({
						url: 'buscadorConsultaArticulo.php',
						type: 'post',
						data: {valor: valorEscrito},
						success: function(response){
							$("#tblarticulo tbody").empty();
							$("#tblarticulo tbody").append(response);

							$("#tblarticulo tbody tr").on('click',function() {
								$("#codigoProducto").val($(this).find('td').eq(1).text());
								$("#descripcionProducto").val($(this).find('td').eq(2).text());
								$("#buscadorArticulo").val("");
								$("#myModalArticulos").modal('hide');
							});
						},
					});
				} else {
					$("#tblarticulo tbody").empty();
					$("#buscadorArticulo").val("");
				}
			}
		});

		$("#myModalArticulos").on('click',function() {
			$("#buscadorArticulo").val("");
			$("#tblarticulo tbody").empty();
		});

		$("#tblarcosGeneral tbody tr").on('click', function(){
			var folio = $(this).find('td').eq(0).text();
			var empresa = $(this).find('td').eq(2).text();

			switch(empresa) {
			    case 'novalux':
			        window.location.href = 'arcosNovalux.php?folio='+folio;
			    break;
			    case 'eypo':
			        window.location.href = 'arcos.php?folio='+folio;
			    break;
			    case 'pec':
			        window.location.href = 'arcosPec.php?folio='+folio;
			    break;
			    case 'proton':
			        window.location.href = 'arcosProton.php?folio='+folio;
			    break;
			    case 'tj':
			        window.location.href = 'arcosTj.php?folio='+folio;
			    break;
			} 
			$("#modalArcosConsultaGeneral").modal('hide');
		});

		$("#btnNuevo").on('click', function (){
			window.location.href = 'arcosPec.php';
		});

 	</script>
</html>