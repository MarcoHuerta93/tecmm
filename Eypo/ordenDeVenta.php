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

	if (isset($_GET['FolioSAP'])) {
		$folioSAP = $_GET['FolioSAP'];	

	} else {
		$folioSAP = 0;
	}
	
	
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
				<h3 style="color: #2fa4e7">Orden de venta</h3>
			</div>
			<div id="btnEnca" class="col-md-6" style="font-size: 2rem">
				<?php include "botonesDeControl.php" ?>
			</div>
		</div>
		<div class="row" style="font-size: .7rem">
			<div class="col-md-6">
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Cliente:</label>
				    <div class="col-sm-4">
				    	<input type="text" class="" name="codcliente" id="codcliente" style="width: 70%" disabled>
				    </div>
				</div>
				<div class="row">
				  	<label class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Nombre:</label><br>
				    <div class="col-sm-4">
				    	<input type="text" class="NombreC" style="width: 70%" disabled>
				    </div>
				</div>
				<div class="row">
				  <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Persona de contacto:</label>
				    <div class="col-sm-4">
				    	<input type="text" class="listcontactos" style="width: 70%;" disabled >	
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Oferta de compra:</label>
				   <div class="col-sm-4">
				    	<input type="text" class="" id="oCompra" style="width: 70%" disabled>
				    </div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Tipo moneda:</label>
				    <div class="col-sm-4">
				    	<input type="text" id="tmoneda" style="width: 70%" disabled>
				    </div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Uso principal</label>
				 	<div class="col-sm-4">
						<input type="text" id="usoPrincipal" style="width: 70%" >
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Método de pago</label>
				 	<div class="col-sm-4">
				 		<input type="text" style="width: 70%;" id="metodoPago" >
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Forma de pago</label>
				 	<div class="col-sm-4">
				 		<input type="text" style="width: 70%;" id="formaPago" >
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">N°:</label>
				    <div class="col-sm-4">
				    	<input type="text" id="ndoc" style="width: 35%" disabled >
						<?php $consultasql = sqlsrv_query($conn,"SELECT TOP 1 FolioSAP FolioSAP 
							FROM IV_EY_PV_OrdenesVentaCab ORDER BY FolioSAP DESC");
				        	$Row = sqlsrv_fetch_array($consultasql);
							$folio = $Row['FolioSAP'] ++;
							$folio++; 
						?>
						<input type="text" class="" id="cdoc"  size="5" value="<?php echo $folio ?>" readonly="true" disabled>
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Estado:</label>
			        <div class="col-sm-4">
				    	<input type="text"  id="status" value="Abierto" readonly="true" style="width: 70%" disabled>
				    </div>
				</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha de contabilización:</label>
					    <div class="col-sm-4">

					   <input type="date" class="" id="fconta" style="width: 70%" disabled>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha de entrega	:</label>
					   <div class="col-sm-4">
					    	<input type="date" class="" id="fentrega" style="width: 70%" disabled>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha del documento:</label>
					   <div class="col-sm-4">
					    	<input type="date" class="" id="fdoc" style="width: 70%" disabled>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha de vencimiento:</label>
					   <div class="col-sm-4">
					    	<input type="date" class="" id="fvencimiento" style="width: 70%" disabled>
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
					  		<br>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Clase de artículo:</label>
									   <div class="col-sm-4" >
												<select disabled>
													<option value="I">Artículo</option>
													<option value="S">Servicio</option>
												</select>
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
								    	<label for="" class="col-sm-3  col-form-label" style="padding-right: 0px; padding-bottom:  0px">Clase de resumen:</label>
								   		<div class="col-sm-4">
									    	<select class="" disabled>
	           									<option>Sin Resumen</option>
	          								</select>
									    </div>
									</div>
								</div>
							</div>
					  		<br>
						  	<div class="row">
						  		<div class="col-md-12">
						  			<table class="table-bordered table-editable" width="100%" id="detalleoferta" disable>
						        		<thead>
						        			<tr class="encabezado">
												<th>#</th>
						        				<th  scope="col">Número de artíuclo</th>
						        				<th  scope="col">Descripción de artíuclo</th>
						        				<th  scope="col">Cantidad</th>
						        				<th  scope="col">Precio por unidad</th>
						        				<th  scope="col">% de descuento</th>
						        				<th  scope="col">Indicador de impuestos</th>
												<th  style="display: none"></th>
						        				<th  scope="col">Total</th>
						        				<th  scope="col">Almacen</th>
						        				<th  scope="col">Cantidad pendiente</th>
												<th> Codigo Planificación SAP</th>
												<th> Unidad medida SAP</th>
												<th>Comentarios de partida 1</th>
												<th>Comentarios de partida 2</th>
											</tr>
						        		</thead>
						        		<tbody>
								         <tr>
											<td class="cont">1</td>
											<td class="narticulo"></td>
											<td class="darticulo"></td>
											<td class="cantidad"></td>
											<td class="precio"></td>
											<td class="descuento"></td>
											<td class="impu"></td>
											<td class="impuesto" style="display:none"></td>
											<td class="total"></td>
											<td class="almacen"></td>
											<td class="pendiente"></td>
											<td class="codigoPlanificacionSAP"></td>
											<td class="unidadMedidaSAP"></td>
											<td class="comentario1"></td>
											<td class="comentario2"></td>
						        			</tr>
					            	</tbody>
					        		</table>
						  		</div>
						  	</div>
					  	</div>
					  	<div class="tab-pane fade" id="logica">
      						<br>
						    <div class="row">

						        <div class="col-md-1">
						          <div class="row">
						            <label>Destino</label>
						          </div>
						          <div class="row">
						            <select>
						              <option>Seleccione</option>
						            </select>
						          </div>
						        </div>
						        <div class="col-md-2">
						          <textarea rows="4" ></textarea>
						        </div>
						        <div class="col-md-5">

						        </div>
						        <div class="col-md-3">
						          <div class="checkbox">
						            <label><input type="checkbox" value="">Documento de aprovís.p.lineas de alamcen que no</label>
						          </div>
						          <div class="checkbox">
						            <label><input type="checkbox" value="">Documento de aprovisonamiento p.líneas de alamc</label>
						          </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-1">
						          <div class="row">
						            <label>Destinatario de Factura</label>
						          </div>
						          <div class="row">
						            <select>
						              <option>Seleccione</option>
						            </select>
						          </div>
						        </div>
						        <div class="col-md-2">
						          <textarea rows="4"></textarea>
						        </div>
						        <div class="col-md-5">

						        </div>
						    </div>

      <div class="row">

        <label>Forma de Envío:</label>

        <div class="col-md-2 col-md-offset-1">
          <select>
            <option>Seleccione</option>
          </select>
        </div>
        <div class="col-md-5">

        </div>
        <div class="col-md-3">
          Nombre del Canal SN
          <input type="text" name="nomcanal">
        </div>



      </div>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4 ">
          Contacto Canal SN
          <select>
            <option>Seleccione</option>
          </select>
        </div>
      </div>

    </div>
      <div class="tab-pane fade" id="finanzas">
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

        <!-- <div class="col-md-1"></div> -->

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
  <div class="col-md-4"></div>
  <div class="col-md-4">
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
	  <div class="col-md-8"></div>
	  <div class="col-md-4">
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
	<div class="row">

	  <div class="col-md-4">
	    <div class="col-md-12">
	      Volver a calcular manualmente fecha de :
	      <br>
	      <select>
	        <option>Seleccione</option>
	      </select>
	      <input type="text" name="nmes" size="2">
	      Meses +
	      <input type="text" name="ndias" size="2">
	      Días
	    </div>

	  </div>
	</div>
	<br>
	<div class="row">
	  <div class="col-md-6">
	    <div class="form-inline">
	      <div class="col-md-8">
	        Período fechas de descuento p
	        <input type="text" name="fdescuento" size="6">
	      </div>
	    </div>
	  </div>
	  <div class="col-md-2"></div>
	  <div class="col-md-4">
	    <div class="form-inline">
	      <div class="col-md-6">
	        Documento de referencia
	      </div>
	      <div class="col-md-2">
	        <button value="..." class="btn btn-sm">...</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-8"></div>
	  <div class="col-md-4">


	  </div>
	</div>



</div>
 <div class="tab-pane fade" id="logica" role="tabpanel" aria-labelledby="profile-tab">...</div>
					  <div class="tab-pane fade" id="finanzas" role="tabpanel" aria-labelledby="contact-tab">...</div>
					  <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="contact-tab">...</div>
					</div>
					</div>
				</div>
				<!--com -->
				<br>
				<div class="">
					<fieldset>
				<div class="row" style="font-size: .7rem">
					<div class="col-md-6">
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Empleado de ventas:</label>
						    <div class="col-sm-6">
				    			<input type="text" style="width: 70%" class="empleado" id="empleado" value="<?php echo "$empleadoVentas"; ?>" disabled>
						    </div>
						</div>

						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Propietario:</label>
						    <div class="col-sm-6">
						    	 <input type="text" style="width: 70%" class="" id="NombrePropietario" value="<?php echo "$nombreCompleto"; ?>" disabled>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Comentarios:</label>
						    <div class="col-sm-4">
						    	<textarea name="" id="comentarios" cols="40" rows="3"></textarea>
						    </div>
						</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Total antes del descuento:</label>
						    <div class="col-sm-4">
						    	<input type="text" id="totalAntesDescuento" style="width: 100%" disabled>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Descuento:</label>
						    <div class="col-sm-4">
						    	<input type="text" id="descNum" value="" style="width: 20%;" disabled> %
								<input type="text" name="" id="descAplicado" value="" style="width: 60%" disabled>
						    </div>
						</div>
						<!-- <div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Redondeo:</label>
						    <div class="col-sm-4">
						    	<input type="text" id="redondeo" name="" value=""style="width: 100%" disabled>
						    </div>
						</div> -->
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Impuesto:</label>
						    <div class="col-sm-4">

						    	<input type="text" class="monto" name="impue" id="impuestoTotal" style="width: 100%" disabled>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Total del documento:</label>
						    <div class="col-sm-4">
									<input type="text" id="totalDelDocumento" value="" style="width: 100%" disabled>
						    </div>
						</div>
					</div>
				</div>
				</div>
			</fieldset>

				<div class="row" id= btnFoot>
					<div class="col-md-6">
						<!-- <button class="btn btn-sm" style="background-color: orange" id="btnCrear" title="Crear">Crear</button>
							<button class="btn btn-sm" style="background-color: orange; display:none;" id="btnActualizar" title="Actualizar">Actualizar</button> -->
						<a href="">	<button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button></a>
					</div>

					<div class="col-md-6 text-right">
						<!-- <button class="btn btn-secundary btn-sm" title="Copiar a">Copiar a</button> -->
						<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="copiarA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
						    Copiar a
						  </button>
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
<script type="text/javascript">

	var folioSAP = <?php echo $folioSAP ?>;
	if (folioSAP != 0 ) {	
		console.log(folioSAP);
		$.ajax({
			url:'orvConsultas/clicORVConsultaGeneral.php',
			type:'post',
			dataType:'json',
			data: {codigo: folioSAP},
		}).done(function (response) {
			console.log(response);
			$("#codcliente").val(response['CodCliente']).prop("disabled", true);
					$(".NombreC").val(response['NombreC']).prop("disabled", true);
					$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
					// $("#oCompra").val(response['OrdCompra']).prop("disabled", true);
					$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
					$("#usoPrincipal").val(response['usoPrincipal']);
					// $("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					// $("#ndoc").val(response['NDoc']).prop("disabled", true);
					var lesito = response['DocNum'];
					$("#cdoc").val(lesito).prop("disabled", true);
					$("#status").val(response['Status']).prop("disabled", true);
					$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
					$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
					// $("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
					$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
					// $("#numLetra").val(response['numLetra']);
					// $("#tipoFactura").val(response['TipoFactura']);
					// $("#lab").val(response['Lab']);
					// $("#condicionPago").val(response['CondicionPago']);
					
					$('#comentarios').val(response['comentarios']);
					var descuento = parseFloat(response['totalDescuento']);
					$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
					// $('#descNum').val(response['descNum']).prop("disabled", true);
					// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
					// $('#redondeo').val(response['redondeo']).prop("disabled", true);

					// $('.empleado').prop("disabled", true);
					// $('#NombrePropietario').prop("disabled", true);


					var impuesto = parseFloat(response['impuesto']);
					$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
					var totalDoc = parseFloat(response['totalDelDocumento']);
					$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);

					$.ajax({
						type: 'post',
						url: 'orvConsultas/consultaORV2.php',
						data: { cdoc: folioSAP },
					}).done(function (res) { 
						$("#detalleoferta tbody").empty();
						$("#detalleoferta tbody").append(res);
					});
			
		});
	}

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

	var mentre = new Date();
	var m = mentre.getMonth()+1; //hoy es 0!
	var ment = mentre.getMonth()+2;
	if(dd<10) {
		d='0'+d
	}
	if(ment<10) {
		ment='0'+ment
	}
	mentre= yyyy+'-'+ment+'-'+dd;

	var quincena = new Date();
	dd = dd +15;
	quincena= yyyy+'-'+mm+'-'+dd;

	

	$("#consulta1Atras").on('click', function(){
		var cdoc = $("#cdoc").val();
		$.ajax({
			type: 'post',
			url: 'orvConsultas/consulta1AtrasORV.php',
			data: { cdoc: cdoc },
			dataType: "json",
			success: function(response) {
				$("#codcliente").val(response['CodCliente']).prop("disabled", true);
				$(".NombreC").val(response['NombreC']).prop("disabled", true);
				$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
				$("#oCompra").val(response['OrdCompra']).prop("disabled", true);     
				$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
				$("#usoPrincipal").val(response['usoPrincipal']);
				$("#metodoPago").val(response['metodoPago']);
				$("#formaPago").val(response['formaPago']);
				// $("#ndoc").val(response['NDoc']).prop("disabled", true);
				var lesito = response['DocNum'];
				$("#cdoc").val(lesito).prop("disabled", true);
				$("#status").val(response['Status']).prop("disabled", true);
				$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
				$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
				// $("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
				$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
				$("#numLetra").val(response['numLetra']);
				$("#tipoFactura").val(response['TipoFactura']);
				$("#lab").val(response['Lab']);
				$("#condicionPago").val(response['CondicionPago']);
				
				$('#comentarios').val(response['comentarios']);
				var descuento = parseFloat(response['totalDescuento']);
				$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
				// $('#descNum').val(response['descNum']).prop("disabled", true);
				// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
				// $('#redondeo').val(response['redondeo']).prop("disabled", true);

				// $('.empleado').prop("disabled", true);
				// $('#NombrePropietario').prop("disabled", true);


				var impuesto = parseFloat(response['impuesto']);
				$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
				var totalDoc = parseFloat(response['totalDelDocumento']);
				$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
				// $('#btnCrear').hide(); //oculto mediante id
				// $('#btnActualizar').show(); //mostrar mediante id
				// $("#copiarA").removeAttr('disabled');


				$.ajax({
					type: 'post',
					url: 'orvConsultas/consultaORV2.php',
					data: { cdoc: lesito },
					success: function(res){
						$("#detalleoferta tbody").empty();
						$("#detalleoferta tbody").append(res);
					}
				});
			},
		});
	});

	$("#consultaPrimerRegistro").on('click', function(){
		$.ajax({
			type: 'post',
			url: 'orvConsultas/consultaPrimerRegistroORV.php',
			dataType: "json",
			success: function(response) {
				$("#codcliente").val(response['CodCliente']).prop("disabled", true);
				$(".NombreC").val(response['NombreC']).prop("disabled", true);
				$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
				$("#oCompra").val(response['OrdCompra']).prop("disabled", true);     
				$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
				$("#usoPrincipal").val(response['usoPrincipal']);
				$("#metodoPago").val(response['metodoPago']);
				$("#formaPago").val(response['formaPago']);
				// $("#ndoc").val(response['NDoc']).prop("disabled", true);
				var lesito = response['DocNum'];
				$("#cdoc").val(lesito).prop("disabled", true);
				$("#status").val(response['Status']).prop("disabled", true);
				$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
				$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
				// $("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
				$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
				$("#numLetra").val(response['numLetra']);
				$("#tipoFactura").val(response['TipoFactura']);
				$("#lab").val(response['Lab']);
				$("#condicionPago").val(response['CondicionPago']);
				
				$('#comentarios').val(response['comentarios']);
				var descuento = parseFloat(response['totalDescuento']);
				$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
				// $('#descNum').val(response['descNum']).prop("disabled", true);
				// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
				// $('#redondeo').val(response['redondeo']).prop("disabled", true);

				// $('.empleado').prop("disabled", true);
				// $('#NombrePropietario').prop("disabled", true);


				var impuesto = parseFloat(response['impuesto']);
				$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
				var totalDoc = parseFloat(response['totalDelDocumento']);
				$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
				// $('#btnCrear').hide(); //oculto mediante id
				// $('#btnActualizar').show(); //mostrar mediante id
				// $("#copiarA").removeAttr('disabled');


				$.ajax({
					type: 'post',
					url: 'orvConsultas/consultaORV2.php',
					data: { cdoc: lesito },
					success: function(res){
						$("#detalleoferta tbody").empty();
						$("#detalleoferta tbody").append(res);
					}
				});
			},
		});
	});

	$("#consulta1Adelante").on('click', function(){
		var cdoc = $("#cdoc").val();

		$.ajax({
			type: 'post',
			url: 'orvConsultas/consulta1AdelanteORV.php',
			data: { cdoc: cdoc },
			dataType: "json",
			success: function(response) {
				$("#codcliente").val(response['CodCliente']).prop("disabled", true);
				$(".NombreC").val(response['NombreC']).prop("disabled", true);
				$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
				$("#oCompra").val(response['OrdCompra']).prop("disabled", true);     
				$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
				$("#usoPrincipal").val(response['usoPrincipal']);
				$("#metodoPago").val(response['metodoPago']);
				$("#formaPago").val(response['formaPago']);
				// $("#ndoc").val(response['NDoc']).prop("disabled", true);
				var lesito = response['DocNum'];
				$("#cdoc").val(lesito).prop("disabled", true);
				$("#status").val(response['Status']).prop("disabled", true);
				$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
				$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
				// $("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
				$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
				$("#numLetra").val(response['numLetra']);
				$("#tipoFactura").val(response['TipoFactura']);
				$("#lab").val(response['Lab']);
				$("#condicionPago").val(response['CondicionPago']);
				
				$('#comentarios').val(response['comentarios']);
				var descuento = parseFloat(response['totalDescuento']);
				$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
				// $('#descNum').val(response['descNum']).prop("disabled", true);
				// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
				// $('#redondeo').val(response['redondeo']).prop("disabled", true);

				// $('.empleado').prop("disabled", true);
				// $('#NombrePropietario').prop("disabled", true);


				var impuesto = parseFloat(response['impuesto']);
				$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
				var totalDoc = parseFloat(response['totalDelDocumento']);
				$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
				// $('#btnCrear').hide(); //oculto mediante id
				// $('#btnActualizar').show(); //mostrar mediante id
				// $("#copiarA").removeAttr('disabled');


				$.ajax({
					type: 'post',
					url: 'orvConsultas/consultaORV2.php',
					data: { cdoc: lesito },
					success: function(res){
						$("#detalleoferta tbody").empty();
						$("#detalleoferta tbody").append(res);
					}
				});
			},
		});
	});

	$("#consultaUltimoRegistro").on('click', function consultaUltimoRegistro(){
		$.ajax({
			type: 'post',
			url: 'orvConsultas/consultaUltimoRegistroORV.php',
			dataType: "json",
			success: function(response) {
				$("#codcliente").val(response['CodCliente']).prop("disabled", true);
				$(".NombreC").val(response['NombreC']).prop("disabled", true);
				$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
				$("#oCompra").val(response['OrdCompra']).prop("disabled", true);     
				$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
				$("#usoPrincipal").val(response['usoPrincipal']);
				$("#metodoPago").val(response['metodoPago']);
				$("#formaPago").val(response['formaPago']);
				// $("#ndoc").val(response['NDoc']).prop("disabled", true);
				var lesito = response['DocNum'];
				$("#cdoc").val(lesito).prop("disabled", true);
				$("#status").val(response['Status']).prop("disabled", true);
				$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
				$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
				// $("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
				$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
				$("#numLetra").val(response['numLetra']);
				$("#tipoFactura").val(response['TipoFactura']);
				$("#lab").val(response['Lab']);
				$("#condicionPago").val(response['CondicionPago']);
				
				$('#comentarios').val(response['comentarios']);
				var descuento = parseFloat(response['totalDescuento']);
				$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
				// $('#descNum').val(response['descNum']).prop("disabled", true);
				// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
				// $('#redondeo').val(response['redondeo']).prop("disabled", true);

				// $('.empleado').prop("disabled", true);
				// $('#NombrePropietario').prop("disabled", true);


				var impuesto = parseFloat(response['impuesto']);
				$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
				var totalDoc = parseFloat(response['totalDelDocumento']);
				$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
				// $('#btnCrear').hide(); //oculto mediante id
				// $('#btnActualizar').show(); //mostrar mediante id
				// $("#copiarA").removeAttr('disabled');


				$.ajax({
					type: 'post',
					url: 'orvConsultas/consultaORV2.php',
					data: { cdoc: lesito },
					success: function(res){
						$("#detalleoferta tbody").empty();
						$("#detalleoferta tbody").append(res);
					}
				});
			},
		});
	});

		$("#buscadorOrdenes").keyup(function(){
			var valorEscrito = $('#buscadorOrdenes').val();

			if (valorEscrito) {
				$.ajax({
					url: 'orvConsultas/buscadorORVparaTablaModal.php',
					type: 'post',
					data: {valor: valorEscrito},
					success: function(response){
						$('#tblBuscarOrdenes tbody').empty();
						$('#tblBuscarOrdenes tbody').append(response);

						$("#tblBuscarOrdenes tbody tr").on('click',function(){
							var codigo = $(this).find('td').eq(0).text();

							$.ajax({
							type: 'post',
							url: 'orvConsultas/clicORVConsultaGeneral.php',
							dataType:'json',
							data:{ codigo: codigo},
							success: function(response){

							$("#codcliente").val(response['CodCliente']).prop("disabled", true);
							$(".NombreC").val(response['NombreC']).prop("disabled", true);
							$(".listcontactos").val(response['ListContactos']).prop("disabled", true);
							$("#oCompra").val(response['OrdCompra']).prop("disabled", true);     
							$("#tmoneda").val(response['TipoMoneda']).prop("disabled", true);
							$("#usoPrincipal").val(response['usoPrincipal']);
							$("#metodoPago").val(response['metodoPago']);
							$("#formaPago").val(response['formaPago']);
							// $("#ndoc").val(response['NDoc']).prop("disabled", true);
							var lesito = response['DocNum'];
							$("#cdoc").val(lesito).prop("disabled", true);
							$("#status").val(response['Status']).prop("disabled", true);
							$("#fvencimiento").val(response['Fvencimiento']).prop("disabled", true);
							$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
							$("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
							$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
							$("#numLetra").val(response['numLetra']);
							$("#tipoFactura").val(response['TipoFactura']);
							$("#lab").val(response['Lab']);
							$("#condicionPago").val(response['CondicionPago']);
							
							$('#comentarios').val(response['comentarios']);
							var descuento = parseFloat(response['totalDescuento']);
							$('#totalAntesDescuento').val(descuento.toFixed(2)).prop("disabled", true);
							// $('#descNum').val(response['descNum']).prop("disabled", true);
							// $('#desAplicado').val(response['desAplicado']).prop("disabled", true);
							// $('#redondeo').val(response['redondeo']).prop("disabled", true);

							// $('.empleado').prop("disabled", true);
							// $('#NombrePropietario').prop("disabled", true);


							var impuesto = parseFloat(response['impuesto']);
							$('#impuestoTotal').val(impuesto.toFixed(2)).prop("disabled", true);
							var totalDoc = parseFloat(response['totalDelDocumento']);
							$('#totalDelDocumento').val(totalDoc.toFixed(2)).prop("disabled", true);
							// $('#btnCrear').hide(); //oculto mediante id
							// $('#btnActualizar').show(); //mostrar mediante id
							// $("#copiarA").removeAttr('disabled');

								$.ajax({
									type:'post',
									url:'orvConsultas/consultaORV2.php',
									data: { cdoc: lesito},
									success: function(res){
										$("#detalleoferta tbody").empty();
										$("#detalleoferta tbody").append(res);
									}
								});

								$("#modalBuscarOrdenes").modal('hide');
							},
							});
						});




					},
				});

			}else {
				$('#tblBuscarOfertas tbody').empty();
			}
		});

	$("#mensajes").hide();
	$("#btnbuscarOferta").hide();
	$("#btnbuscarOrden").show();
</script>


</html>
