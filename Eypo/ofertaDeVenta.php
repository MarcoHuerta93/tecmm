<?php
include "conexion.php";
	session_start();
	$_SESSION['usuario'];

	$empleadoVentas = $_SESSION['usuario'];

	$sql = "SELECT lastName, firstName, middleName FROM OHEM WHERE U_IV_EY_PV_User = '$empleadoVentas'";
	$consulta = sqlsrv_query($conn, $sql);
	while ($Row = sqlsrv_fetch_array($consulta)){
		$nombre = $Row['firstName'];
		$sNombre = $Row['middleName'];
		$apellido = $Row['lastName'];     
	}
	$nombreCompleto = $nombre." ".$sNombre." ".$apellido;
	?>

<!DOCTYPE html>
<html>
	<head>
		<title>EYPO</title>
	</head>
<body>
	<?php include "header.php"; ?>
	<?php include "modales.php"; ?>
	<div class="container" id="contenedorDePagina">
		<br>
		<div class="row">
			<div class="col-md-6">
				<h3 style="color: #2fa4e7">Oferta de venta</h3>
			</div>
			<div id="btnEnca" class="col-md-6">
				<?php include "botonesDeControl.php" ?>
			</div>
		</div>
		<div class="row datosEnc" style="font-size: .7rem">
			<div class="col-md-6">
				<div class="row">
				    <label class="col-sm-3 col-form-label" >Cliente:</label>
				    <div class="col-sm-4">
				    	<input type="text" class="" name="codcliente" id="codcliente" style="width: 70%">
				    	<a href="#" data-toggle="modal" data-target="#myModal">
				    		<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Cliente"></i>
				    	</a>
				    </div>
				</div>
				<div class="row">
				  	<label for="" class="col-sm-3 col-form-label">Nombre:</label><br>
			    	<div class="col-sm-4">
				    	<input type="text" class="" name="NombreC" id="NombreC" style="width: 70%">
						<a href="#" data-toggle="modal" data-target="#myModal" >
			    			<i class="fas fa-search" style="color: #57b4ea" title="Búsqueda Nombre"></i>
			    		</a>
			    	</div>
				</div>
				<div class="row">
				  	<label for="" class="col-sm-3 col-form-label">Persona de contacto:</label>
			    	<div class="col-sm-4">
			    		<select  id="listcontactos" style="width: 70%; height:23px;">
	            			<option value="" disabled selected>Seleccione</option>
	          			</select>
			    	</div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label">Orden de compra:</label>
				   	<div class="col-sm-4">
				    	<input type="text" class="" id="oCompra" style="width: 70%">
				    </div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label">Tipo moneda:</label>
				    <div class="col-sm-4">
						<select id="tmoneda" style="height: 23px; width: 70%">
							<option value="" disabled selected>Seleccione</option>
								<?php
									$sql = "SELECT * FROM OCRN";
									$consulta = sqlsrv_query($conn, $sql);
									while ($Row = sqlsrv_fetch_array($consulta)) { ?>
										<option value="<?php  echo $Row['CurrCode']; ?>"><?php  echo $Row['CurrCode']; ?></option>
								<?php } ?>
						</select>
				    </div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label">Uso principal</label>
				 	<div class="col-sm-4">
						<select class="" name="" id="usoPrincipal" style="height: 23px; width: 70%">
							<option value="" disabled selected>Seleccione</option>
							<?php
								$sql = "SELECT * FROM IV_EY_PV_UsosCfdi";
								$consulta = sqlsrv_query($conn, $sql);
								while ($Row = sqlsrv_fetch_array($consulta)) { ?>
									<option value="<?php  echo $Row['CodigoUsoCfdi']; ?>"><?php echo $Row['CodigoUsoCfdi']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="row">
					<label for="" class="col-sm-3 col-form-label">Método de pago</label>
				 	<div class="col-sm-4">
						<select class="" name="" style="width: 70%; height:23px;" id="metodoPago">
							<option value="" disabled selected>Seleccione</option> 
							
						
						</select>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label">Forma de pago</label>
				 	<div class="col-sm-4">
					 	<select class="" name="" style="width: 70%; height:23px;" id="formaPago">
						 	<option value="" disabled selected>Seleccione</option>
						 	<?php
								$sql = "SELECT * FROM IV_EY_PV_FormasPago";
								$consulta = sqlsrv_query ($conn, $sql);
								while ($row = sqlsrv_fetch_array($consulta)) { ?>
								<option value="<?php echo $row['CodigoFormaPago']; ?>"><?php echo $row['CodigoFormaPago']; ?></option>
							<?php } ?>
					 	</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">N°:</label>
				    <div class="col-sm-4">
						<select id="ndoc" style="height: 23px">
							<option value="COT-GRAL">COT-GRAL</option>
							<option value="Manual">Manual</option>
						</select>
						<?php
	                      	$consultasql = sqlsrv_query($conn,"SELECT TOP 1 FolioSAP  FROM IV_EY_PV_OfertasVentasCab ORDER BY FolioSAP DESC") ;
					        $Row = sqlsrv_fetch_array($consultasql);
							$folio = $Row['FolioSAP'];
							$folio++;
				       	?>
						<input type="text" class="" id="cdoc"  size="5" value="<?php echo "$folio"; ?>" readonly="true">
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">Estado:</label>
			        <div class="col-sm-4">
			    		<input type="text"  class="status" value="Abierto" readonly="true" style="width: 70%">
			    	</div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">Fecha de contabilización:</label>
				    <div class="col-sm-4">
				   		<input type="date" class="" id="fconta" style="width: 70%">
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">Fecha de entrega	:</label>
				   	<div class="col-sm-4">
				    	<input type="date" class="" id="fentrega" style="width: 70%">
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">Fecha del documento:</label>
				   	<div class="col-sm-4">
				    	<input type="date" class="" id="fdoc" style="width: 70%" >
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label">Fecha de vencimiento:</label>
				   	<div class="col-sm-4">
				    	<input type="date" class="" id="fvencimiento" style="width: 70%" >
				    </div>
				</div>
				<div class="row">
					<div class="col-md-7 offset-md-4 text-right" style="margin-top: 10px">
						<button class="btn btn-secundary btn-sm" id="btnCamposDefinidos" title="Campos definidos por el usuario">Campos definidos por el usuario</button>
					</div>
				</div>
				<div class="row" id="camposDefinidos" style="font-size: .7rem; margin-top: 10px">
					<label for="" class="col-sm-3 offset-md-4 col-form-label">Número a letra:</label>
					<div class="col-sm-5">
						<input type="text"id="numLetra" style="width: 90%; height:23px;">						
					</div>
					<label for="" class="col-sm-3 offset-md-4 col-form-label">Tipo de factura:</label>
					<div class="col-sm-5">
						<input type="text" id="tipoFactura" style="width: 90%; height:23px;">    
						<a href="#" data-toggle="modal" data-target="#modalTipoFactura">
				    		<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Cliente"></i>
				    	</a>						
					</div>
					<label for="" class="col-sm-3 offset-md-4 col-form-label">LAB:</label>
					<div class="col-sm-5">
						<input type="text"  id="lab" style="width: 90%; height:23px;">		
					</div>
					<label for="" class="col-sm-3 offset-md-4 col-form-label">Condición de pago:</label>
					<div class="col-sm-5">
						<input type="text"  id="condicionPago" style="width: 90%; height:23px;">
						<a href="#" data-toggle="modal" data-target="#modalCondicionPago">
				    		<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Cliente"></i>
				    	</a>	          		
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="row" style="font-size: .7rem">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#contenido" role="tab" aria-controls="contenido" aria-selected="true">Contenido</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#logica" role="tab" aria-controls="logica" aria-selected="false">Lógica</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#finanzas" role="tab" aria-controls="finanzas" aria-selected="false">Finanzas</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="contenido" role="tabpanel" aria-labelledby="home-tab">
				  		<?php include "tablaNavOFV/general.php"; ?>
				  	</div>
				  	<div class="tab-pane fade" id="logica" role="tabpanel" aria-labelledby="home-tab">
      					<?php include "tablaNavOFV/logica.php"; ?>
    				</div>
      				<div class="tab-pane fade" id="finanzas" role="tabpanel" aria-labelledby="home-tab">
						<br>
      					<div class="row">
        					<div class="col-md-4">
          						<div class="form-inline">
            						<div class="col-md-6">
             							Entrada en el diario
           							</div>
           							<div class="col-md-4">
            							<input type="text" name="entradadiario" size="15">
          							</div>
       							</div>
      						</div>
						    <div class="col-md-4"></div>
						    <div class="col-md-4">
						        <div class="form-inline">
						          	<div class="col-md-6">
						            	Proyecto SN
						          	</div>
						          	<div class="col-md-6">
						           		<input type="text" name="	" style="width: 70% ">
						          	</div>
						        </div>
					      	</div>
					    </div>
    					<div class="row"><br><br></div>
				    	<div class="row">
					      	<div class="col-md-4">
					        	<div class="form-inline">
							        <div class="col-md-6">
								        Condiciones de Pago
								    </div>
							        <div class="col-md-6">
						        		<select>
						            		<option>Seleccione</option>
						          		</select>
						        	</div>
						      	</div>
					    	</div>
				    		<div class="col-md-4"></div>
				    		<div class="col-md-4">
				      			<div class="form-inline">
							        <div class="col-md-6">
							        	Indicador
							        </div>
							        <div class="col-md-6">
							        	<select>
							            	<option>Seleccione</option>
							          	</select>
							        </div>
				      			</div>
				    		</div>
				  		</div>
					  	<div class="row">
						    <div class="col-md-4">
							    <div class="form-inline">
						    	<div class="col-md-6">
						        	Forma de Pago
						      	</div>
						      	<div class="col-md-6">
							        <select>
							        	<option>Seleccione</option>
							        </select>
						      	</div>
						    	</div>
					  		</div>
		  					<div class="col-md-4 offset-md-4">
		   						<div class="form-inline">
								    <div class="col-md-6">
								    	RFC
								    </div>
		    						<div class="col-md-6">
		      							<input type="text" name="rfcfinanzas" id="rfcfinanzas">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
						   		<div class="form-inline">
						    		<div class="col-md-6">
						      			Indicador de Banco central
						    		</div>
						    		<div class="col-md-6">
									    <select>
									        <option>Seleccione</option>
									    </select>
						    		</div>
						  		</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 offset-md-8">
						   		<div class="form-inline">
						    		<div class="col-md-6">
						      			Número de pedido
						    		</div>
						    		<div class="col-md-6">
						      			<input type="text" name="npedido">
						    		</div>
						  		</div>
							</div>
						</div>
						<?php include "tablaNavOFV/finanzas.php" ?>
					</div>
				</div>
			</div>
		</div>
				<div class="row" id= btnFoot>
					<div class="col-md-6">
						<button class="btn btn-sm" style="background-color: orange" id="btnCrear" title="Crear">Crear</button>
							<button class="btn btn-sm" style="background-color: orange; display:none;" id="btnActualizar" title="Actualizar">Actualizar</button>
						<a href="">	<button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button></a>
					</div>

					<div class="col-md-6 text-right">
						<!-- <button class="btn btn-secundary btn-sm" title="Copiar a">Copiar a</button> -->
						<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="copiarA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
						    Copiar a
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="#" id="pedidoAlCliente">Pedido al cliente</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>

	<?php include "footer.php"; ?>
</body>
	<script>
		var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+1;
		var yyyy = hoy.getFullYear();
		var hh = hoy.getHours();
		var mim = hoy.getMinutes();
		var ss = hoy.getSeconds();
			
			if(dd<10){
				dd='0'+dd;
			} 
			if(mm<10){
				mm='0'+mm;
			} 
			hoy = yyyy+'-'+mm+'-'+dd+' '+hh+':'+mim+':'+ss;
		
		

		var mentre = new Date();
		var m = mentre.getMonth()+1; //hoy es 0!
		var ment = mentre.getMonth()+2;
		var hh = mentre.getHours();
		var mim = mentre.getMinutes();
		var ss = mentre.getSeconds();
		
		if(dd<10) {
			d='0'+d
		}
		if(ment<10) {
			ment='0'+ment
		}
		mentre= yyyy+'-'+ment+'-'+dd;

		var quincena = new Date();
		dd = dd +15;
		quincena= yyyy+'-'+mm+'-'+dd+' '+hh+':'+mim+':'+ss;
		
		

		$("#fconta").val(hoy);
		$("#fentrega").val(mentre);
		$("#fdoc").val(hoy);
		$("#fvencimiento").val(quincena);
		
		$("#buscadorCliente").keyup(function(){
			var valorEscrito = $("#buscadorCliente").val();
			if (valorEscrito) {
				$.ajax({
					url: 'buscadorConsultaCliente.php',
					type: 'post',
					data: {valor: valorEscrito},
					success: function(resp){
						$("#tblcliente tbody").empty();
						$("#tblcliente tbody").append(resp);

						$("#tblcliente tr").on('click',function(){
							var codigo = $(this).find('td').eq(1).text();
							var name = $(this).find('td').eq(2).text();
							agregar(codigo, name);
							$("#tblcliente tbody").empty();
							$("#buscadorCliente").val("");
						});
					},
				});
			} else {
				$("#tblcliente tbody").empty();
			}
		});

		$("#myModal").on('click',function() {
			$("#buscadorCliente").val("");
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
								var codigo = $(this).find('td').eq(1).text();
								var articulo = $(this).find('td').eq(2).text();
								var pree = $(this).find('td').eq(3).text();
								var almacen = $(this).find('td').eq(7).text();
								$.ajax({
									url: 'consultaArticuloDetalle.php',
									type: 'post',
									dataType: 'text',
									data:{ code: codigo },
									success: function (response){
										$("#detalleoferta tbody tr").find("td:eq(11)").text(response);
										$("#detalleoferta tbody tr:last td:eq(11)").empty();

									},
								});
								$("#buscadorArticulo").val("");
								agregarArticuloATabla(codigo, articulo, pree, almacen);
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

		function agregar ($code, $name){
			var code = $code;
			var name = $name;
			$("#codcliente").val(code);
			$("#NombreC").val(name);
			$('#myModal').modal('hide');
			$.ajax({
				url: 'consultaPersonaContacto.php',
				type: 'post',
				data: {code: code},
				success: function(response){
					$("#listcontactos").append(response);
				}
			});
		}

		function agregarArticuloATabla (codes, articulo, precio, almacen){

			var tasa = 0.16;
			var impuestoUnitario = tasa * precio;
			var descuento = 0;

			$("#detalleoferta tbody tr").on('keyup', function() {

				var cantidad = parseInt($(this).find('td').eq(3).text());
				var precioUnitario = parseFloat($(this).find('td').eq(4).text());
				var descuento = parseFloat($(this).find('td').eq(5).text());						
				var precioPorArticulo = parseFloat((cantidad * precioUnitario) - descuento);				
				var iva = precioPorArticulo * tasa;

				$(this).find('td').eq(7).text(iva);
				$(this).find('td').eq(8).text(precioPorArticulo);
				calcularTotalAntesDescuento(); 
				calcularImpuestoTotal(); 
				sumarTotalDocumento();
			});

			$("#detalleoferta tbody tr:last td:eq(1)").text(codes);
			$("#detalleoferta tbody tr:last td:eq(2)").text(articulo);
			$("#detalleoferta tbody tr:last td:eq(3)").text(1);
			$("#detalleoferta tbody tr:last td:eq(4)").text(parseFloat(precio));
			$("#detalleoferta tbody tr:last td:eq(5)").text(descuento);
			$("#detalleoferta tbody tr:last td:eq(6)").text(tasa);
			$("#detalleoferta tbody tr:last td:eq(7)").text(impuestoUnitario);
			$("#detalleoferta tbody tr:last td:eq(8)").text(parseFloat(precio));
			$("#detalleoferta tbody tr:last td:eq(9)").text(almacen);
			
			calcularTotalAntesDescuento();   
			calcularImpuestoTotal();
			sumarTotalDocumento();
			crearNuevaFilaTablaDetalleOferta();
		}

		function crearNuevaFilaTablaDetalleOferta(){

			$('#detalleoferta tr:last').clone().appendTo('#detalleoferta');
			for (let index = 0; index <= 15; index++) {
				$("#detalleoferta tbody tr:last td:eq("+index+")").empty();				
			}
			$("#tblarticulo tbody").empty();
			$('#myModalArticulos').modal('hide');
			conDetalleOferta();			
		}

		// Funciones Operaciones Globales
		function calcularTotalAntesDescuento() {
			var totalDeuda = 0;
			$(".total").each(function(){
				totalDeuda += parseFloat($(this).html()) || 0;
			});
			$("#totalAntesDescuento").val(totalDeuda.toFixed(2));
		}

		function calcularImpuestoTotal() {
			var totalIva=0;
				$(".impuesto").each(function(){
					totalIva += parseFloat($(this).html()) || 0;
				});
			$("#impuestoTotal").val(totalIva.toFixed(2));
		}

		function sumarTotalDocumento() {
			var totalAntes = $("#totalAntesDescuento").val();
			var impuestoT = $("#impuestoTotal").val();
			var totalDocumento = parseFloat(totalAntes) + parseFloat(impuestoT);
			$("#totalDelDocumento").val(totalDocumento.toFixed(2));
		}

		$("#btnCrear").on('click', function(){
			var cliente = $('#codcliente').val();
			var nombre = $('#NombreC').val();
			var personaContacto = $('#listcontactos').val();
			var ordenCompra = $('#oCompra').val();
			var tipoMoneda = $('#tmoneda').val();
			var usoPrincipal = $('#usoPrincipal').val();
			var metodoPago = $('#metodoPago').val();
			var formaPago = $('#formaPago').val();
			var ndoc = $('#ndoc').val();
			var cdoc = $('#cdoc').val();
			var estado = $('.status').val();
			var fconta =  $('#fconta').val();
			var fentrega = $('#fentrega').val();
			var fdoc =  $('#fdoc').val();
			var fvencimiento = $('#fvencimiento').val();
			var numLetra =  $('#numLetra').val();
			var tipoFactura =  $('#tipoFactura').val();
			var lab =  $('#lab').val();
			var condicionPago =  $('#condicionPago').val();
			var empleado =  $('.empleado').val();
			var NombrePropietario =  $('#NombrePropietario').val();
			var proyectoSN =  $('#proyectoSN').val();
			var ventasAdic =  $('#ventasAdic').val();
			var promotor =  $('#promotor').val();
			var cordVenta = $("#cordVenta").val();
			var comentarios =  $('#comentarios').val();
			var totalAntesDescuento =  $('#totalAntesDescuento').val();
			var descNum =  $('#descNum').val();
			var descAplicado =  $('#descAplicado').val();
			var redondeo =  $('#redondeo').val();
			var impuesto =  $('#impuestoTotal').val();
			var totalDelDocumento =  $('#totalDelDocumento').val();
			var fechaCreate = new Date();
						
			var dd = fechaCreate.getDate();
			var mm = fechaCreate.getMonth()+1;
			var yyyy = fechaCreate.getFullYear();
			var hh = fechaCreate.getHours();
			var mim = fechaCreate.getMinutes();
			var ss = fechaCreate.getSeconds();
			
			if(dd<10){
				dd='0'+dd;
			} 
			if(mm<10){
				mm='0'+mm;
			} 
			fechaCreate = yyyy+'-'+mm+'-'+dd+' '+hh+':'+mim+':'+ss;
			$.ajax({
				type:'post',
				url: "ofertaDeVentaInsertEnc.php",
				data:{
					cliente: cliente,
					nombre: nombre,
					personaContacto: personaContacto,
					ordenCompra: ordenCompra,
					tipoMoneda: tipoMoneda,
					usoPrincipal: usoPrincipal,
					metodoPago: metodoPago,
					formaPago: formaPago,
					ndoc: ndoc,
					cdoc: cdoc,
					estado: estado,
					fconta: fconta,
					fentrega: fentrega,
					fdoc: fdoc,
					fvencimiento: fvencimiento,
					numLetra: numLetra,
					tipoFactura: tipoFactura,
					lab: lab,
					condicionPago: condicionPago,
					empleado: empleado,
					NombrePropietario: NombrePropietario,
					proyectoSN: proyectoSN,
					ventasAdic: ventasAdic,
					promotor: promotor,
					cordVenta: cordVenta,
					comentarios: comentarios,
					totalAntesDescuento: totalAntesDescuento,
					descNum: descNum,
					descAplicado: descAplicado,
					redondeo: redondeo,
					impuesto: impuesto,
					totalDelDocumento: totalDelDocumento,
					fecha: fechaCreate,
				},
				success: function(resp){
					if(resp > 0){
						alert("Favor de intentarlo mas tarde, se está procesando una Oferta de venta")
						setTimeout('document.location.reload()',1000);
					} else {
						var cdocc = $('#cdoc').val();
						var array_articulo = [];
						var array_descripcion = [];
						var array_cantidad = [];
						var array_precio = [];
						var array_descuento = [];
						var array_impu = [];
						var array_impuesto = [];
						var array_total = [];
						var array_almacen = [];
						var array_pendiente = [];
						var array_codigoPlanificacionSAP = [];
						var array_unidadMedidaSAP = [];
						var array_comentario1 = [];
						var array_comentario2 = [];

						$('.narticulo').each(function(){
							array_articulo.push($(this).text());
						});
						$('.darticulo').each(function(){
							array_descripcion.push($(this).text());
						});
						$('.cantidad').each(function(){
							array_cantidad.push($(this).text());
						});
						$('.precio').each(function(){
							array_precio.push($(this).text());
						});
						$('.descuento').each(function(){
							array_descuento.push($(this).text());
						});
						$('.impu').each(function(){ // este es el .16
							array_impu.push($(this).text());
						});
						$('.impuesto').each(function(){    // esto es el hide
							array_impuesto.push($(this).text());
						});
						$('.total').each(function(){
							array_total.push($(this).text());
						});
						$('.almacen').each(function(){
							array_almacen.push($(this).text());
						});
						$('.pendiente').each(function(){
							array_pendiente.push($(this).text());
						});
						$('.codigoPlanificacionSAP').each(function(){    // esto es el hide
							array_codigoPlanificacionSAP.push($(this).text());
						});
						$('.unidadMedidaSAP').each(function(){
							array_unidadMedidaSAP.push($(this).text());
						});
						$('.comentario1').each(function(){
							array_comentario1.push($(this).text());
						});
						$('.comentario2').each(function(){
							array_comentario2.push($(this).text());
						});
						$.ajax({
							type:'post',
							url: "ofertaDeVentaDet.php",
							data:{
								DocNum: cdocc,
								articulo: array_articulo,
								descripcion: array_descripcion,
								cantidad: array_cantidad,
								precio: array_precio,
								descuento: array_descuento,
								impu: array_impu,
								impuesto: array_impuesto,
								total: array_total,
								almacen: array_almacen,
								pendiente: array_pendiente,
								codigoPlanificacionSAP: array_codigoPlanificacionSAP,
								unidadMedidaSAP: array_unidadMedidaSAP,
								comentario1: array_comentario1,
								comentario2: array_comentario2
							},
							success: function(resp){
								alert(resp);
								setTimeout('document.location.reload()',1000);
							}
						});
					}
				}
			});
		});

		$("#btnActualizar").on('click', function(){

			var hoy = new Date();
			var dd = hoy.getDate();
			var mm = hoy.getMonth()+1;
			var yyyy = hoy.getFullYear();

			hoy = yyyy+'-'+mm+'-'+dd;

			var cdoc = $('#cdoc').val();
			var usoPrincipal = $('#usoPrincipal').val();
			var metodoPago = $('#metodoPago').val();
			var formaPago = $('#formaPago').val();
			var condicionPago = $('#condicionPago').val();
			var numLetra = $('#numLetra').val();
			var tipoFactura = $('#tipoFactura').val();
			var lab = $('#lab').val();
			var comentarios = $("#comentarios").val();
			$.ajax({
				type:'post',
				url: "actualizarCab.php",
				data:{
					usoPrincipal: usoPrincipal,
					metodoPago: metodoPago,
					formaPago: formaPago,
					condicionPago: condicionPago,
					cdoc: cdoc,
					numLetra: numLetra,
					tipoFactura: tipoFactura,
					lab: lab,
					hoy: hoy,
					comentarios: comentarios,
				},
			});
		});

		function seleccionarMoneda(elemento) {
			var combo =document.getElementById("tmoneda");
			var cantidad = combo.length;
			for (i = 0; i < cantidad; i++) {
				if (combo[i].value == elemento) {
					combo[i].selected = true;
				}
			}
		}

		$("#buscadorOfertas").keyup(function(){
			var valorEscrito = $('#buscadorOfertas').val();

			if (valorEscrito) {
				$.ajax({
					url: 'ofvConsultas/buscadorGeneralOFV.php',
					type: 'post',											
					data: {valor: valorEscrito},
					success: function(response){
						$('#tblBuscarOfertas tbody').empty();
						$('#tblBuscarOfertas tbody').append(response);

						$("#tblBuscarOfertas tbody tr").on('click',function(){
							var codigo = $(this).find('td').eq(0).text();
							

							$.ajax({
							type: 'post',
							url: 'ofvConsultas/buscarOferta.php',
							dataType:'json',
							data:{ codigo: codigo },
							success: function(response){



								$("#codcliente").val(response['CodCliente']).prop("disabled", true);
								$("#NombreC").val(response['NombreC']).prop("disabled", true);
								$("#listcontactos").val(response['ListContactos']).prop("disabled", true);
								$("#oCompra").val(response['OrdCompra']).prop("disabled", true);
								$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
								$("#usoPrincipal").val(response['usoPrincipal']);
								$("#metodoPago").val(response['metodoPago']);
								$("#formaPago").val(response['formaPago']);
								$("#ndoc").val(response['NDoc']).prop("disabled", true);
								var lesito = response['DocNum'];
								$("#cdoc").val(lesito).prop("disabled", true);
								$(".status").val(response['Status']).prop("disabled", true);
								$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
								$("#fconta").val(response['FConta']).prop("disabled", true);  
								$("#fentrega").val(response['FEntrega']).prop("disabled", true);
								$("#fdoc").val(response['FDoc']).prop("disabled", true);
								$("#numLetra").val(response['numLetra']);
								$("#tipoFactura").val(response['TipoFactura']);
								$("#lab").val(response['Lab']);
								$("#condicionPago").val(response['CondicionPago']);
								$('#proyectoSN').val(response['proyectoSN']).prop("disabled", true);
								$('#ventasAdic').val(response['ventasAdic']).prop("disabled", true);
								$('#promotor').val(response['Promotor']).prop("disabled", true);
								$("#cordVenta").val(response['cordVenta']).prop("disabled", true);
								$('#comentarios').val(response['comentarios']);
								$('#totalAntesDescuento').val(response['totalDescuento']).prop("disabled", true);
								$('#descNum').val(response['descNum']).prop("disabled", true);
								$('#desAplicado').val(response['desAplicado']).prop("disabled", true);
								$('#redondeo').val(response['redondeo']).prop("disabled", true);

								$('.empleado').prop("disabled", true);
								$('#NombrePropietario').prop("disabled", true);


								var impuesto = parseFloat(response['impuesto']);
								$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
								var totalDoc = parseFloat(response['totalDelDocumento']);
								$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
								$('#btnCrear').hide();
								$('#btnActualizar').show(); 
								$("#copiarA").removeAttr('disabled');

								$.ajax({
									type:'post',
									url:'ofvConsultas/buscarOfertaDet.php',
									data: { cdoc: lesito},
									success: function(res){
										$("#detalleoferta tbody").empty();
										$("#detalleoferta tbody").append(res);
									}
								});

								$("#modalBuscarOfertas").modal('hide');
							},
							});
						});
					},
				});

			}else {
				$('#tblBuscarOfertas tbody').empty();
			}
		});
		$("#consulta1Atras").on('click', function(){
			var cdoc = $("#cdoc").val();
			cdoc = cdoc -1;
			consultaOFV(cdoc);
		});
		$("#consulta1Adelante").on('click', function(){
			var cdoc = $("#cdoc").val();
			cdoc = parseInt(cdoc) + 1;			
			consultaOFV(cdoc);			
		});
		function consultaOFV(folio) {
			var cdoc = folio;			
			$.ajax({ 
				type: 'post',
				url: 'ofvConsultas/consultaAtrasAdelante.php',
				data: { cdoc: cdoc },
				dataType: "json",
				success: function(response) {
					$("#codcliente").val(response['CodCliente']).prop("disabled", true);
					$("#NombreC").val(response['NombreC']).prop("disabled", true);
					$("#listcontactos").val(response['ListContactos']).prop("disabled", true);
					$("#oCompra").val(response['OrdCompra']).prop("disabled", true);
					$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
					$("#usoPrincipal").val(response['usoPrincipal']);
					$("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					$("#ndoc").val(response['NDoc']).prop("disabled", true);
					var lesito = response['DocNum'];
					$("#cdoc").val(lesito).prop("disabled", true);
					$(".status").val(response['Status']).prop("disabled", true);
					$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
					$("#fconta").val(response['FConta']).prop("disabled", true); 
					$("#fentrega").val(response['FEntrega']).prop("disabled", true);
					$("#fdoc").val(response['FDoc']).prop("disabled", true);
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']).prop("disabled", true);
					$('#ventasAdic').val(response['ventasAdic']).prop("disabled", true);
					$('#promotor').val(response['Promotor']).prop("disabled", true);
					$("#cordVenta").val(response['cordVenta']).prop("disabled", true);
					$('#comentarios').val(response['comentarios']);
					var TotalDescuento = parseFloat(response['totalDescuento']);
					$('#totalAntesDescuento').val(TotalDescuento.toFixed(2)).prop("disabled", true);
					$('#descNum').val(response['descNum']).prop("disabled", true);
					$('#desAplicado').val(response['desAplicado']).prop("disabled", true);
					$('#redondeo').val(response['redondeo']).prop("disabled", true);
					$('.empleado').prop("disabled", true);
					$('#NombrePropietario').prop("disabled", true);

					var impuesto = parseFloat(response['impuesto']);
					$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
					var totalDoc = parseFloat(response['totalDelDocumento']);
					$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
					$('#btnCrear').hide();
					$('#btnActualizar').show(); 
					$("#copiarA").removeAttr('disabled');

					$.ajax({
						type: 'post',
						url: 'ofvConsultas/consultaAtrasAdelante2.php',
						data: { cdoc: lesito },
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}
			});
		}

		$("#consultaPrimerRegistro").on('click', function(){
			let order = 'ASC';			
			consultaOFV2(order);
		});
		$("#consultaUltimoRegistro").on('click', function consultaUltimoRegistro(){
			let order = 'DESC';			
			consultaOFV2(order);
		});
		function consultaOFV2(ordenarPor){	
			$.ajax({
				type:'post',
				url: 'ofvConsultas/consultaPrimerUltimoRegistro.php',
				dataType: 'json',
				data:{orden: ordenarPor},
				success: function(response){
					$("#codcliente").val(response['CodCliente']).prop("disabled", true);
					$("#NombreC").val(response['NombreC']).prop("disabled", true);
					$("#listcontactos").val(response['ListContactos']).prop("disabled", true);
					$("#oCompra").val(response['OrdCompra']).prop("disabled", true);
					$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
					$("#usoPrincipal").val(response['usoPrincipal']);
					$("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					$("#ndoc").val(response['NDoc']).prop("disabled", true);
					var algo =response['DocNum'];
					$("#cdoc").val(algo).prop("disabled", true);
					$(".status").val(response['Status']).prop("disabled", true);
					$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
					$("#fconta").val(response['FConta']).prop("disabled", true);  
					$("#fentrega").val(response['FEntrega']).prop("disabled", true);
					$("#fdoc").val(response['FDoc']).prop("disabled", true);  
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']).prop("disabled", true);
					$('#ventasAdic').val(response['ventasAdic']).prop("disabled", true);
					$('#promotor').val(response['Promotor']).prop("disabled", true);
					$("#cordVenta").val(response['cordVenta']).prop("disabled", true);
					$('#comentarios').val(response['comentarios']);
					var TotalDescuento = parseFloat(response['totalDescuento']);
					$('#totalAntesDescuento').val(TotalDescuento.toFixed(2)).prop("disabled", true);
					$('#descNum').val(response['descNum']).prop("disabled", true);
					$('#desAplicado').val(response['desAplicado']).prop("disabled", true);
					$('#redondeo').val(response['redondeo']).prop("disabled", true);

					$('.empleado').prop("disabled", true);
					$('#NombrePropietario').prop("disabled", true);

					var impuesto = parseFloat(response['impuesto']);
					$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
					var totalDoc = parseFloat(response['totalDelDocumento']);
					$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
					$('#btnCrear').hide(); //oculto mediante id
					$('#btnActualizar').show(); //mostrar mediante id
					$("#copiarA").removeAttr('disabled');
					$.ajax({
						type:'post',
						url:'ofvConsultas/consultaPrimerUltimoRegistroDet.php',
						data: { cdoc: algo},
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}
			});
		}

		$("#pedidoAlCliente").on('click',function(){
	
			var cdoc = $('#cdoc').val();
			var fechaCreate = new Date();
			var dd = fechaCreate.getDate();
			var mm = fechaCreate.getMonth()+1;
			var yyyy = fechaCreate.getFullYear();
			var hh = fechaCreate.getHours();
			var mim = fechaCreate.getMinutes();
			var ss = fechaCreate.getSeconds();
			
			
			fechaCreate = yyyy+'-'+mm+'-'+dd+' '+hh+':'+mim+':'+ss;
			
			
				
			$.ajax({
				type:'post',
				url: "ordenDeVentaInsertEnc.php",
				data:{
					cdoc: cdoc,
					fecha: fechaCreate
				},
				success: function(resp){
					if (resp > 0 ) {
						alert("Espere un momento, creación de orden de venta en proceso");
					}
				}



			});
				
		});
	
		$("#mensajes").on('click', function () {
			$("#tblMensajes tbody").empty();

			$.ajax({
				url:'modalMensajeConsulta.php',
				success: function (params) {
					$("#tblMensajes tbody").append(params);	

					$("#tblMensajes tbody tr").on('click', function(){						
						var FolioSAP = $(this).find('td').eq(0).text();
						var ClaseDocumento = $(this).find('td').eq(1).text();
						var estatus = $(this).find('td').eq(5).text();
						var ofertaVenta = $(this).find('td').eq(6).text();
								
						$("#tblMensajes2").find('td').eq(0).text("1");
						$("#tblMensajes2").find('td').eq(1).text(ofertaVenta);
						$("#tblMensajes2").find('td').eq(2).text(FolioSAP);
						$("#tblMensajes2").find('td').eq(3).text(ClaseDocumento);
						$("#tblMensajes2").find('td').eq(4).text(estatus);
						

						$("#tblMensajes2 tbody tr").on('click', function(){
							var ofertaVenta = $(this).find('td').eq(1).text();
							var FolioSAP = $(this).find('td').eq(2).text();
							var estatus = $(this).find('td').eq(4).text();					

							switch (estatus) {
								case 'CREADO':
									window.location.href = 'ordenDeVenta.php?FolioSAP='+FolioSAP+'&ofv='+ofertaVenta;
									break;
								case 'RECHAZADO':
									alert("Documento rechazado");
									break;
								case 'NA':
									alert("No aplica");
									break;
								case 'PENDIENTE':
									alert("Documento en proceso de autorización");
									break;
								case 'APROBADA':
									window.location.href = 'ordenDeVentaBorrador.php?FolioSAP='+FolioSAP+'&ofv='+ofertaVenta;
									break;						
							}
						});
					});				
				}
			})
				
		});	
		
		

		

		
			$(document).on('click', '#eliminarFila', function (event) {
				event.preventDefault();
				$(this).closest('tr').remove();
				calcularTotalAntesDescuento();
				calcularImpuestoTotal();
				sumarTotalDocumento(); 
				conDetalleOferta();     
			});
		


		$("#tblCondicionPago tbody tr").on('click', function(){
			var descripcion = $(this).find('td').eq(1).text();
			$("#condicionPago").val(descripcion);
			$("#modalCondicionPago").modal('hide');
		});

		$("#tblTipoFactura tbody tr").on('click', function () {
			var tipoFactura = $(this).find('td').eq(0).text();
			$("#tipoFactura").val(tipoFactura);
			$("#modalTipoFactura").modal('hide');
		})
		
		function conDetalleOferta(){
			var nFilas = $("#detalleoferta tbody tr").length;
			for (let index = 1; index < nFilas; index++) {
				$("#detalleoferta").find('tr').eq(index).find('td').eq(0).text(index);
			}
		}

		$("#btnPdf").on('click', function(){  
			var cdoc = $("#cdoc").val();
			window.open('reportes/pdfOfv.php?folio='+cdoc, "nombre de la ventana", "width=1024, height=325");
		});
		
		$("#metodoPago").on('click', function () {
			var CodigoSN = $("#codcliente").val();
			$.ajax({
				url:'rellenoMetodoPago.php',
				data: {CodigoSN: CodigoSN},
				type: 'post',
				success: function (params) {				
					$("#metodoPago").append(params)
				}
			});			
		});		


		</script>
</html>