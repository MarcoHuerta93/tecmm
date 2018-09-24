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
		<div class="mensaje">
		</div>
		<br>

		<?php include "btnEncaArcos.php"; ?>
		<div class="eypoEnca">
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-12" style="background-color: #005580; text-align: center;">
					<img src="img/tituloEypo.png" alt="EYPO" style="max-width: 20%">
				</div>
				<input type="hidden" id="empresa" value="eypo" >
			</div>
			<div class="row">
				<div class="col-md-12" style="color: white; background-color: #005580">
					<span style="font-size: 1.3rem">FORMATO DE ARMADO/DESARMADO</span>
					<?php
						$sql ="SELECT TOP 1 folio FROM dbEypo.dbo.arcos ORDER BY folio DESC";
						$consultasql = sqlsrv_query($conn, $sql);
						$Row = sqlsrv_fetch_array($consultasql);
						$numRes = sqlsrv_num_rows($consultasql);
						$folio = $Row['folio'];
						$folio++;
						if ($numRes) {
							$folio = 0;
						}
					?>
					<input type="text" value="<?php echo "$folio"; ?>" id="folio" style="float: right; font-size: 1.3rem; background: none; border: none; width: 13%; text-align: center; color: white" disabled="true">
					<span style="float: right; font-size: 1.3rem" >Folio:</span>
				</div>
			</div>
		</div>

			<div id="desarmeArme">
				<br>
			    <div class="row">
			    	<div class="col-md-6">
							<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Fecha Solicitud: </label>
				      	<div class="col-sm-8">
									<input id="dateInicial" type="date" value="<?php echo date("Y-m-d");?>"	>
				        	<!-- <span  style="font-size: 1rem; font-family: initial; color: #868484;"></span> -->
				      	</div>
						  </div>
							<div class="row">
								<label class="col-sm-4 col-form-label col-form-label-sm">Fecha Entrega Requerida: </label>
								<div class="col-sm-8">
									<input id="dateFinal" type="date">
								</div>
							</div>

			    		<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Solicitante: </label>
				      	<div class="col-sm-8">
				        	<input type="text" value="" id="nombreSolicitante">
				      	</div>
					    </div>

					    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Proyecto: </label>
				      	<div class="col-sm-8">
				        	<input type="text" value="" id="nombreProyecto">
				      	</div>
					    </div>
					    <div class="row">
					      <label class="col-sm-4 col-form-label col-form-label-sm" style="width: 70%">Numero Orden Venta SAP: </label>
				      	<div class="col-sm-8">
				        	<select name="" id="numeroDeOrden" style="height:24px;">
				        		<option value="" disabled selected>Selecciona Orden</option>
				        		<?php
				        			$consultasql = sqlsrv_query($conn,"SELECT DISTINCT CodigoSN  FROM IV_EY_PV_OrdenesVentaCab");
				        			while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
										<option value="<?php echo $Row['CodigoSN']; ?>"><?php echo $Row['CodigoSN']; ?></option>
				        			<?php } ?>
				        	</select>
				      	</div>
					    </div>
						</div>
						<div class="col-md-6">
				    	<div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Nombre Cliente SAP: </label>
				      	<div class="col-sm-8">
				        	<input type="text" value="" id="nombreCliente">
				      	</div>
							</div>
					    <div class="row">
				      	<label class="col-sm-4 col-form-label col-form-label-sm">Cant a Fabricar (letra): </label>
				      	<div class="col-sm-8">
				        	<input type="text" value="" id="cantidadFabricar">
				      	</div>
					    </div>
					    <div class="row">
							<label class="col-sm-4 col-form-label col-form-label-sm">Entregas Parciales Aceptadas Especifique: </label>
							<div class="col-sm-8">
								<select name="entregasParciales" id="entregasParciales" style="height:24px;">
									<option value="" disabled selected>Seleccione</option>
									<option value="si">Si</option>
									<option value="no">No</option>
								</select>
							</div>
					    </div>
						</div>
			    </div> <br>
			    <div class="row">
			    	<div class="col-md-12 text-center" style="margin-bottom: 10px">
			    		<span style="background-color: #44ade9; color: white; padding: 5px 70px; font-weight: bold;">Armado</span>
			    	</div>
			      <label class="col-sm-3 col-form-label col-form-label-sm">Producto a Fabricar (Detallado): </label>
		      	<div class="col-sm-9">
		      		<select name="" id="productosFabricar" style="width: 10%; height: 75%">
		        		<option value="" disabled selected>Código</option>
		        		<?php
		        			$consultasql = sqlsrv_query($conn,"SELECT ItemCode  FROM OITM");
		        			while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
								<option value="<?php echo $Row['ItemCode']; ?>"><?php echo $Row['ItemCode']; ?></option>
		        			<?php } ?>
		        	</select>
							<input type="text" value="" id="productosFabricarNombre" style="width: 50%">
		      	</div>
			    </div>
			    <div class="row">
		      	<label class="col-sm-3 col-form-label col-form-label-sm">Subproductos: </label>
		      	<div class="col-sm-9">

			        	<table class="table table-sm table-bordered" id="tblSubproductoArmado">
			        		<thead>
			        			<th>Código</th>
			        			<th>Nombre del producto</th>
								<th style="display:none">Armado</th>
			        		</thead>
			        		<tbody>
			        			<tr style="height: 28px" data-toggle="modal" data-target="#modalTablaFabricar">
			        				<td class="codigoArt"></td>
			        				<td class="nombreArt"></td>
									<td class="armadoDesarmado" style="display:none"></td>
			        			</tr>
			        		</tbody>
			        	</table>
			      </div>
			    </div><br>
			    <div class="row">
			    	<div class="col-md-12 text-center" style="margin-bottom: 10px">
			    		<span style="background-color: green; color: white; padding: 5px 70px; font-weight: bold;">Desarmado</span>
			    	</div>
			      	<label class="col-sm-3 col-form-label col-form-label-sm">Producto a Desarmar (Detallado): </label>
			      	<div class="col-sm-9">
			      		<select name="" id="productosDesarmar" style="width: 10%; height: 75%">
			        		<option value="" disabled selected>Código</option>
			        		<?php
			        			$consultasql = sqlsrv_query($conn,"SELECT ItemCode  FROM OITM");
			        			while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
									<option value="<?php echo $Row['ItemCode']; ?>"><?php echo $Row['ItemCode']; ?></option>
			        			<?php } ?>
			        	</select>
						<input type="text" value="" id="productosDesarmarNombre" style="width: 50%">
			      	</div>
			    </div>
			    <div class="row">
			      	<label class="col-sm-3 col-form-label col-form-label-sm">Subproductos: </label>
			      	<div class="col-sm-9">
			        	<table class="table table-sm table-bordered" id="tblSubproductoDesarmado">
			        		<thead>
			        			<th>Código</th>
			        			<th>Nombre del producto</th>
								<th style="display:none">Desarmado</th>
			        		</thead>
			        		<tbody>
			        			<tr style="height: 28px" data-toggle="modal" data-target="#modalTablaDesarmar">
			        				<td class="codigoArt"></td>
			        				<td class="nombreArt"></td>
									<td class="armadoDesarmado" style="display:none"></td>
			        			</tr>
			        		</tbody>
			        	</table>
			      	</div>
			    </div>
			    <div class="row">
			      	<label class="col-sm-4 col-form-label col-form-label-sm">Material(Tipo, Calibre, Cédula, Diametro, etc): </label>
			      	<div class="col-sm-8">
			        	<input type="text" value="" id="material" >
			      	</div>
			    </div>
			    <div class="row">
			      	<label class="col-sm-4 col-form-label col-form-label-sm">Terminado Final: </label>
			      	<div class="col-sm-8">
			        	<select name="" id="terminadoFinal" style="width: 50%; height:24px;">
			        		<option value="" disabled selected>Seleccionar</option>
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
			      	<div class="col-sm-8">
			        	<textarea name="" id="observaciones" cols="80%" rows="2" style="font-size: .8rem"></textarea>
			      	</div>
			    </div>
			    <br>
			    <div class="row">
			    	<div class="col-md-4">
			    		<span>Se entrega  Para Fabricación</span>
			    		<div>
			    			<input type="text" style="width: 100%">
			    		</div>
			    	   	<span>Fecha Ténmina de Fabricación</span>
			    	   	<div>
			    			<input type="text" style="width: 100%">
			    		</div>
			    		<span>Fabricado por:</span>
			    	   	<div>
			    			<input type="text" style="width: 100%" >
			    		</div>
			    	</div>
			    	<div class="col-md-8">
			    		<table class="table table-bordered">
					    	<th style="text-align: center;">Pieza Muestra</th>
					    	<th style="text-align: center;">Ficha Técnica</th>
					    	<th style="text-align: center;">Dibujo</th>
					    	<th style="text-align: center;">Diagrama</th>
					    	<th style="text-align: center;">Otro</th>

					    	<tr style="height: 80px">
					    		<td></td>
					    		<td></td>
					    		<td></td>
					    		<td></td>

					    	</tr>
					    </table>
			    	</div>
			    </div>
		    </div>
		    <br>


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
				  $("#folio").val(resp['folio']);
				$("#dateInicial").val(resp['fechaSolicitud']);
				$("#dateFinal").val(resp['fechaEntrega']);
				$("#nombreSolicitante").val(resp['nombreSolicitante']);
				$("#nombreProyecto").val(resp['nombreProyecto']);
				$("#numeroDeOrden").val(resp['numeroOrden']);

				$("#nombreCliente").val(resp['nombreCliente'])
				$("#cantidadFabricar").val(resp['cantidadFabricar'])
				$("#entregasParciales").val(resp['entregasParciales'])

				$("#productosFabricar").val(resp['productoaFabricar'])
				$("#productosFabricarNombre").val(resp['productoFabricarNombre'])

				$("#productosDesarmar").val(resp['productosDesarmar'])
				$("#productosDesarmarNombre").val(resp['productosDesarmarNombre'])

				$("#material").val(resp['material'])
				$("#terminadoFinal").val(resp['terminadoFinal'])
				$("#observaciones").val(resp['observaciones'])

				$.ajax({
					url:'arcosConsultas/validadorArmadoDesarmado.php',
					type:'post',
					dataType:'json',
					data:{folio:folio},
					success: function(response){
						var estado  = response['estado'];

						if (estado == 'armado') {
							$.ajax({
								url:'arcosConsultas/arcos1adelante2.php',
								type:'post',
								data:{ folio:folio },
								success: function(response){

									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").append(response);
								}
							});
						} else {
							$.ajax({
								url:'arcosConsultas/arcos1adelante2.php',
								type:'post',
								data:{ folio:folio },
								success: function(response){
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").append(response);
								}
							});
						}
					},
				});
          	},
        });
      </script>  
    <?php } ?>

<script>

	var hoy = new Date();
	var dd = hoy.getDate();
	var mm = hoy.getMonth()+1;
	var yyyy = hoy.getFullYear();
	if(dd<10) {
		dd='0'+dd
	}
	if(mm<10) {
		mm='0'+mm
	}
	hoy = yyyy+'-'+mm+'-'+dd;
	$("#dateInicial").val(hoy);

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

		var productosFabricar = $('#productosFabricar').val();
		var productosFabricarNombre = $('#productosFabricarNombre').val();

		var productosDesarmar = $('#productosDesarmar').val();
		var productosDesarmarNombre = $('#productosDesarmarNombre').val();

		var material = $('#material').val();
		var terminadoFinal =  $('#terminadoFinal').val();
		var observaciones = $('#observaciones').val();
		var empresa = $('#empresa').val();

		$.ajax({
		  	type:'post',
			url:"arcosConsultas/arcosInsert.php",
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
			    productosFabricar: productosFabricar,
			    productosFabricarNombre: productosFabricarNombre,
			    productosDesarmar: productosDesarmar,
			    productosDesarmarNombre: productosDesarmarNombre,
			    material: material,
			    terminadoFinal: terminadoFinal,
			    observaciones: observaciones,
			    empresa: empresa,
		   	},
		  	success: function(resp){
				$(".mensaje").append(resp);
			    var folio = $('#folio').val();
			    var array_codigoArt = [];
			    var array_nombreArt = [];
			    var array_armadoDesarmado = [];

			    $('.codigoArt').each(function(){
			      array_codigoArt.push($(this).text());
			    });

			    $('.nombreArt').each(function(){
			      array_nombreArt.push($(this).text());
			    });

			    $('.armadoDesarmado').each(function(){
			      array_armadoDesarmado.push($(this).text());
			    });

			    var estado = array_armadoDesarmado[0];

			    if (estado == 'armado') {
			    	$.ajax({
			            type:'post',
			            url: "arcosInsertDetArmado.php",
			            data:{
			                folio: folio,
			                codigoArt: array_codigoArt,
			                nombreArt: array_nombreArt,
			                armadoDesarmado: array_armadoDesarmado,
			            },
			            success: function(resp){
			              setTimeout('document.location.reload()',2000);
			            }
			        });
			    } else {
			    	$.ajax({
			            type:'post',
			            url: "arcosInsertDet.php",
			            data:{
			                folio: folio,
			                codigoArt: array_codigoArt,
			                nombreArt: array_nombreArt,
			                armadoDesarmado: array_armadoDesarmado,
			            },
			            success: function(resp){
			              setTimeout('document.location.reload()',2000);
			            }
			        });
			    }

		       
	        }
	    });
	});

	$("#numeroDeOrden").change(function(){
	  var norden = $("#numeroDeOrden").val();
	  mostrarCliente(norden);
	});

	function mostrarCliente($id) {
	  	var c= $id;
	  	$.ajax({
	      	type:'post',
	      	url:'arcosConsultas/arcosSend.php',
	      	data: {cte:c},
	        success: function(data){
	          	$("#nombreCliente").val(data);
	        }
	  	});
	}

	$("#productosFabricar").change(function(){
	    var prodAF = $("#productosFabricar").val();
	    mostrarProductoF(prodAF);

	});
	function mostrarProductoF($id) {
		var p= $id;

		$.ajax({
		    type:'post',
		    url:'arcosConsultas/arcosSendProducto.php',
		    data: {productoFabricar:p},
	        success: function(data){
		        $("#productosFabricarNombre").val(data);
	        }
		});
	}

	$("#productosDesarmar").change(function(){
	    var prodAF = $("#productosDesarmar").val();
	    mostrarProducto(prodAF);
	});

	function mostrarProducto($id) {
	  	var p= $id;

	  	$.ajax({
	      	type:'post',
	      	url:'arcosConsultas/arcosSendProducto.php',
	      	data: {productoFabricar:p},
	        success: function(data){
	        	$("#productosDesarmarNombre").val(data);
	        }
	  	});
	}

	$("#tblarticulo tbody tr").on('click',function(){
		var codigo = $(this).find('td').eq(0).text();
	    var name = $(this).find('td').eq(1).text();
	    agregarProd(codigo, name);
	});


	function agregarProd ($code, $name){
	  	var subArmado = "armado";
	  	var code = $code;
	  	var name = $name; 
	 	$("#tblSubproductoArmado tbody tr:last td:eq(0)").text(code);
	 	$("#tblSubproductoArmado tbody tr:last td:eq(1)").text(name);
	  	$("#tblSubproductoArmado tbody tr:last td:eq(2)").text(subArmado);
	  	$('#tblSubproductoArmado tr:last').clone().appendTo('#tblSubproductoArmado');
	  	$("#tblSubproductoArmado tbody tr:last td:eq(0)").empty();
	  	$("#tblSubproductoArmado tbody tr:last td:eq(1)").empty();
	  	$("#tblSubproductoArmado tbody tr:last td:eq(2)").empty();
	  	$('#modalTablaFabricar').modal('hide');
	}

	$("#tblArcosDesarme tbody tr").on('click',function(){
	    var codigo = $(this).find('td').eq(0).text();
	    var name = $(this).find('td').eq(1).text();
	    agregar(codigo, name);
	});

	function agregar ($code, $name){
		var subDesarmado = "desarmado"
	  	var code = $code;
	  	var name = $name;
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(0)").text(code);
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(1)").text(name);
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(2)").text(subDesarmado);
	  	$('#tblSubproductoDesarmado tr:last').clone().appendTo('#tblSubproductoDesarmado');
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(0)").empty();
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(1)").empty();
	  	$("#tblSubproductoDesarmado tbody tr:last td:eq(2)").empty();
	  	$('#modalTablaDesarmar').modal('hide');
	}

	function validarEmpresa(folio) {
		var folio = folio
		console.log(folio);
		
		// $.ajax({
		// 	url:'arcosConsultas/validarEmpresa.php',
		// 	type:'post',
		// 	data:{folio: folio},
		// 	success: function(params) {
		// 		console.log(params);
				
		// 		// var empresa = params(empresa)
		// 	}
		// });
	}

	$("#consulta1Atras").on('click', function(){
		var folio = $("#folio").val();
		validarEmpresa(folio);

		$.ajax({
			url:'arcosConsultas/arcos1atras.php',
			type:'post',
			dataType: 'json',
			data:{ folio:folio },
			success: function(response) {

				var fol = response['folio'];
				$('#folio').val(fol);
				$('#dateInicial').val(response['fechaSolicitud']);
				$('#dateFinal').val(response['fechaEntrega']);
				$('#nombreSolicitante').val(response['nombreSolicitante']);
				$('#nombreProyecto').val(response['nombreProyecto']);
				$('#numeroDeOrden').val(response['numeroOrden']);
				$('#nombreCliente').val(response['nombreCliente']);
				$('#cantidadFabricar').val(response['cantidadFabricar']);
				$('#entregasParciales').val(response['entregasParciales']);
				$('#productosFabricar').val(response['productoaFabricar']);
				$('#productosFabricarNombre').val(response['productoFabricarNombre']);
				$('#productosDesarmar').val(response['productosDesarmar']);
				$('#productosDesarmarNombre').val(response['productosDesarmarNombre']);
				$('#material').val(response['material']);
				$('#terminadoFinal').val(response['terminadoFinal']);
				$('#observaciones').val(response['observaciones']);
				$('#empresa').val(response['empresa']);

				$.ajax({
					url:'arcosConsultas/validadorArmadoDesarmado.php',
					type:'post',
					dataType:'json',
					data:{folio:fol},
					success: function(response){
						var estado  = response['estado'];

						if (estado == 'armado') {
							$.ajax({
								url:'arcosConsultas/arcos1atras2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){

									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").append(response);
								}
							});
						} else {
							$.ajax({
								url:'arcosConsultas/arcos1atras2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").append(response);
								}
							});
						}
					},
				});

				


			},
		});
	});

	$("#consulta1Adelante").on('click', function(){
		var folio = $("#folio").val();

		$.ajax({
			url:'arcosConsultas/arcos1adelante.php',
			type:'post',
			dataType: 'json',
			data:{ folio:folio },
			success: function(response) {
				
				var fol = response['folio'];
				$('#folio').val(fol);
				$('#dateInicial').val(response['fechaSolicitud']);
				$('#dateFinal').val(response['fechaEntrega']);
				$('#nombreSolicitante').val(response['nombreSolicitante']);
				$('#nombreProyecto').val(response['nombreProyecto']);
				$('#numeroDeOrden').val(response['numeroOrden']);
				$('#nombreCliente').val(response['nombreCliente']);
				$('#cantidadFabricar').val(response['cantidadFabricar']);
				$('#entregasParciales').val(response['entregasParciales']);
				$('#productosFabricar').val(response['productoaFabricar']);
				$('#productosFabricarNombre').val(response['productoFabricarNombre']);
				$('#productosDesarmar').val(response['productosDesarmar']);
				$('#productosDesarmarNombre').val(response['productosDesarmarNombre']);
				$('#material').val(response['material']);
				$('#terminadoFinal').val(response['terminadoFinal']);
				$('#observaciones').val(response['observaciones']);
				$('#empresa').val(response['empresa']);


				$.ajax({
					url:'arcosConsultas/validadorArmadoDesarmado.php',
					type:'post',
					dataType:'json',
					data:{folio:fol},
					success: function(response){
						var estado  = response['estado'];

						if (estado == 'armado') {
							$.ajax({
								url:'arcosConsultas/arcos1adelante2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){

									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").append(response);
								}
							});
						} else {
							$.ajax({
								url:'arcosConsultas/arcos1adelante2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").append(response);
								}
							});
						}
					},
				});


			},
		});
	});

	$("#consultaPrimerRegistro").on('click', function(){

		$.ajax({
			url:'arcosConsultas/arcosPrimerRegistro.php',
			type:'post',
			dataType: 'json',
			success: function(response) {
				
				var fol = response['folio'];
				$('#folio').val(fol);
				$('#dateInicial').val(response['fechaSolicitud']);
				$('#dateFinal').val(response['fechaEntrega']);
				$('#nombreSolicitante').val(response['nombreSolicitante']);
				$('#nombreProyecto').val(response['nombreProyecto']);
				$('#numeroDeOrden').val(response['numeroOrden']);
				$('#nombreCliente').val(response['nombreCliente']);
				$('#cantidadFabricar').val(response['cantidadFabricar']);
				$('#entregasParciales').val(response['entregasParciales']);
				$('#productosFabricar').val(response['productoaFabricar']);
				$('#productosFabricarNombre').val(response['productoFabricarNombre']);
				$('#productosDesarmar').val(response['productosDesarmar']);
				$('#productosDesarmarNombre').val(response['productosDesarmarNombre']);
				$('#material').val(response['material']);
				$('#terminadoFinal').val(response['terminadoFinal']);
				$('#observaciones').val(response['observaciones']);
				$('#empresa').val(response['empresa']);

				$.ajax({
					url:'arcosConsultas/validadorArmadoDesarmado.php',
					type:'post',
					dataType:'json',
					data:{folio:fol},
					success: function(response){
						var estado  = response['estado'];

						if (estado == 'armado') {
							$.ajax({
								url:'arcosConsultas/arcosPrimerRegistro2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response) {
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").append(response);
								}
							});
						} else {
							$.ajax({
								url:'arcosConsultas/arcosPrimerRegistro2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").append(response);
								}
							});
						}
					},
				});
			},
		});
	});

	$("#consultaUltimoRegistro").on('click', function(){

		$.ajax({
			url:'arcosConsultas/arcosUltimoRegistro.php',
			type:'post',
			dataType: 'json',
			success: function(response) {
				
				var fol = response['folio'];
				$('#folio').val(fol);
				$('#dateInicial').val(response['fechaSolicitud']);
				$('#dateFinal').val(response['fechaEntrega']);
				$('#nombreSolicitante').val(response['nombreSolicitante']);
				$('#nombreProyecto').val(response['nombreProyecto']);
				$('#numeroDeOrden').val(response['numeroOrden']);
				$('#nombreCliente').val(response['nombreCliente']);
				$('#cantidadFabricar').val(response['cantidadFabricar']);
				$('#entregasParciales').val(response['entregasParciales']);
				$('#productosFabricar').val(response['productoaFabricar']);
				$('#productosFabricarNombre').val(response['productoFabricarNombre']);
				$('#productosDesarmar').val(response['productosDesarmar']);
				$('#productosDesarmarNombre').val(response['productosDesarmarNombre']);
				$('#material').val(response['material']);
				$('#terminadoFinal').val(response['terminadoFinal']);
				$('#observaciones').val(response['observaciones']);
				$('#empresa').val(response['empresa']);

				$.ajax({
					url:'arcosConsultas/validadorArmadoDesarmado.php',
					type:'post',
					dataType:'json',
					data:{folio:fol},
					success: function(response){
						var estado  = response['estado'];

						if (estado == 'armado') {
							$.ajax({
								url:'arcosConsultas/arcosUltimoRegistro2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){

									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").append(response);
								}
							});
						} else {
							$.ajax({
								url:'arcosConsultas/arcosUltimoRegistro2.php',
								type:'post',
								data:{ folio:fol },
								success: function(response){
									$("#tblSubproductoDesarmado tbody").empty();
									$("#tblSubproductoArmado tbody").empty();
									$("#tblSubproductoDesarmado tbody").append(response);
								}
							});
						}
					},
				});


			},
		});
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



		// $.ajax({
		// 	url:'arcosConsultas/arcosSeleccionarEmpresa.php',
		// 	type'post',
		// 	dataType:'json',
		// 	success: function(resp){

		// 	},
		// });

		// $.ajax({
		// 	url:'arcosConsultas/arcosConsultaGeneral.php',
		// 	type:'post',
		// 	dataType: 'json',
		// 	data:{ folio:folio },
		// 	success: function(response) {

		// 		var fol = response['folio'];
		// 		$('#folio').val(fol);
		// 		$('#dateInicial').val(response['fechaSolicitud']);
		// 		$('#dateFinal').val(response['fechaEntrega']);
		// 		$('#nombreSolicitante').val(response['nombreSolicitante']);
		// 		$('#nombreProyecto').val(response['nombreProyecto']);
		// 		$('#numeroDeOrden').val(response['numeroOrden']);
		// 		$('#nombreCliente').val(response['nombreCliente']);
		// 		$('#cantidadFabricar').val(response['cantidadFabricar']);
		// 		$('#entregasParciales').val(response['entregasParciales']);
		// 		$('#productosFabricar').val(response['productoaFabricar']);
		// 		$('#productosFabricarNombre').val(response['productoFabricarNombre']);
		// 		$('#productosDesarmar').val(response['productosDesarmar']);
		// 		$('#productosDesarmarNombre').val(response['productosDesarmarNombre']);
		// 		$('#material').val(response['material']);
		// 		$('#terminadoFinal').val(response['terminadoFinal']);
		// 		$('#observaciones').val(response['observaciones']);
		// 		$('#empresa').val(response['empresa']);


		// 		$.ajax({
		// 			url:'arcosConsultas/validadorArmadoDesarmado.php',
		// 			type:'post',
		// 			dataType:'json',
		// 			data:{folio:fol},
		// 			success: function(response){
		// 				var estado  = response['estado'];

		// 				if (estado == 'armado') {
		// 					$.ajax({
		// 						url:'arcosConsultas/arcos1atras2.php',
		// 						type:'post',
		// 						data:{ folio:fol },
		// 						success: function(response){

		// 							$("#tblSubproductoArmado tbody").empty();
		// 							$("#tblSubproductoDesarmado tbody").empty();
		// 							$("#tblSubproductoArmado tbody").append(response);
		// 						}
		// 					});
		// 				} else {
		// 					$.ajax({
		// 						url:'arcosConsultas/arcos1atras2.php',
		// 						type:'post',
		// 						data:{ folio:fol },
		// 						success: function(response){
		// 							$("#tblSubproductoDesarmado tbody").empty();
		// 							$("#tblSubproductoArmado tbody").empty();
		// 							$("#tblSubproductoDesarmado tbody").append(response);
		// 						}
		// 					});
		// 				}
		// 			},
		// 		});

				


		// 	},
		// });

		



	});

	 $("#btnNuevo").on('click', function (){
			window.location.href = 'arcos.php';
					
		});

	</script>
</html>
