<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html>
<head>

	<title>EYPO</title>

</head>
<body>

	<?php include "header.php"; ?>
	<?php include "modales.php"; ?> 
	<br>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 style="color: #2fa4e7">Datos maestros socio negocios</h3>
			</div>
			<div id="btnEnca" class="col-md-6 text" style="font-size: 2rem">
				<a href="#" class="
					btn-default btn-sm" id="btnbusquedaGeneralSocio" data-toggle="modal" data-target="#myModal"><i class="fa fa-binoculars fa-2x" aria-hidden="true" style="color: #6E736D;" title="Búsqueda"></i></a>
			</div>
		</div>
		<div class="row" style="font-size: .7rem">
			<div class="col-md-6">
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Codigo:</label>
					<div class="col-sm-6">
						<input type="text" class="" id="codcliente" value="" readonly="true" disabled>						
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Nombre:</label><br>
					<div class="col-sm-4">
					    <input type="text" class="" name="NombreC" id="NombreC" disabled>					    	
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Grupo:</label>
					<div class="col-sm-4">
					    </select>
						<input type="text" class="" name="" id="grupo" disabled>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Moneda:</label>
					<div class="col-sm-4">
						<input type="text" class="" id="moneda"  disabled>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">RFC</label>
					<div class="col-sm-4">
						<input type="text" class="" id="rfc" disabled>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Saldo de cuenta:</label>
					<div class="col-sm-4">
						<input type="text"  id="saldoCuenta" value="" readonly="true" style="width: 70%" disabled>
					</div>
				</div>  
				<div class="row">
					<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Entregas:</label>
					<div class="col-sm-4">
						<input type="text" value="0.00" class="" id="saldoEntrega" style="width: 70%" disabled>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Pedidos de cliente:</label>
					<div class="col-sm-4">
						<input type="text" value="0.00" class="" id="saldoPedidos" style="width: 70%" disabled>
					</div>
				</div>					
				<div class="row">
					<div class="col-md-7 offset-md-4" style="margin-top: 10px">
					<br>
					<label for="" style="font-size: 1.1rem; color: #2fa4e9">Campos definidos por el usuario</label>		
				</div>
			</div>
			<div class="row">
				<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Referencia para depositos MXP:</label>
				<div class="col-sm-4">
					<input type="text" id="referenciaMxp" value="254565621" disabled>
				</div>
			</div>
			<div class="row">
				<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Referencia para depositos USD:</label>
				<div class="col-sm-4">
					<input type="text" id="referenciaUSD" value="823499232" disabled>
				</div>
			</div>
	

				<div class="row text-right" id="camposDefinidos" style="font-size: .7rem; margin-top: 10px">

						


					</div>
					<div class="row">

					   <div class="col-sm-4">

					    </div>
					</div>
					<div class="row">
						<div class="col-md-7 offset-md-4 text-right" style="margin-top: 10px">

						</div>
					</div>

				</div>
			</div>
			<br>



	<div class="row" style="font-size: .7rem">
		<div class="col-md-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#contenido" role="tab" aria-controls="contenido" aria-selected="true">General</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#logica" role="tab" aria-controls="logica" aria-selected="false">Personas de contacto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#finanzas" role="tab" aria-controls="finanzas" aria-selected="false">Direcciones</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="contenido" role="tabpanel" aria-labelledby="home-tab">
					<br>
					<div class="row" style="font-size: .7rem">
						<div class="col-md-6">
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Teléfono 1  :</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="telefono1" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Teléfono 2  :</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="telefono2" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Correo electrónico:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="correoElectronico" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Tipo socio negocios:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="tipo" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Condiciones de pago:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="condicionesPago" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Lista de precios:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="listaPrecios" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Limite de credito:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="limiteCredito" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Limite comprometido:</label>
								<div class="col-sm-6">
									<input type="text" style="width: 70%" class="" id="limiteComprometido" value="" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Comentarios:</label>
								<div class="col-sm-4">
									<textarea name="" id="comentarios" cols="50" rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="row">
								<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Persona de contacto:</label>
								<div class="col-sm-4">
									<input type="text" class="" id="personaContacto" style="width: 100%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Curp:</label>
								<div class="col-sm-4">
									<input type="text" id="curp" value="" style="width: 100%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Vendedor asignado:</label>
								<div class="col-sm-4">
									<input type="text" id="Vendedor" name="" value=""style="width: 100%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Federal unificado:</label>
								<div class="col-sm-4">
									<input type="text" id="idFiscalFederalUnificado" name="" value=""style="width: 100%" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade text-left" id="logica">
					<br>
					<div class="row">
						<div class="col-md-6">
			
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">ID de contacto:</label>
								<div class="col-sm-6">
									<input type="text"  id="idConta" value="" readonly="true" style="width: 70%" disabled>
									<a href=""  data-toggle="modal" data-target="#modalPersonasContacto">
										<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Cliente"></i>
									</a>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Nombre:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="NomC" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Cargo:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="cargos" style="width: 70%" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="finanzas">
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px"><u>Destino:</u></label>
									<div class="col-sm-7">
										<a href="https://www.google.com.br/maps" class="button noticias" target="_blank">Mostrar ubicacion en explorador web</a>
									</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Código:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="idDireccion" style="width: 70%" disabled>
									<a href=""  data-toggle="modal" data-target="#myModalDireccion">
										<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true" title="Búsqueda Dirección"></i>
									</a>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Id dirección:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="idd" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Calle/Numero:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="calle" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Ciudad:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="ciudad" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Codigo postal:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="cpostal" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Colonia:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="colonia" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Estado:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="estado" style="width: 70%" disabled>
								</div>
							</div>
							<div class="row">
								<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Pais:</label>
								<div class="col-sm-6">
									<input type="text" value="" class="" id="pais" style="width: 70%" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<!-- Modal Cotizaciones-->
 <div class="col"></div>
</div>
<div class="contenedor-modal">
</div>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Resumen de mensajes/alertas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Carpeta Entrada</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Carpeta Salida</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Mensajes Enviados</button>
</div>
<div id="London" class="tabcontent">


<table class="table-bordered table-editable table-sm table-hover overflow-y: auto" width="100%" id="tblAsuntoOferta" style="font-size: .7rem">
	<thead>
		<tr>
	    <th scope="col">!</th>
	    <th scope="col">Asunto</th>
	    <th scope="col">Fecha y hora</th>
	    <th scope="col">Desde</th>
	  </tr>
	</thead>
	<tbody>
		<?php
		      $cont=0;
		      $sql = "SELECT CONVERT(varchar(50), RecDate) as RecDate, Subject
					FROM OAIB
					INNER JOIN OALR ON OAIB.AlertCode = OALR.Code
					WHERE OAIB.UserSign = '36'";
		      $consultasql = sqlsrv_query($conn, $sql) ;
					while ($Row = sqlsrv_fetch_array($consultasql)) {

						// CONVERT(varchar(50), $data);

						?>
		<tr>
				<td></td>
		 		<td><?php echo $algo= utf8_encode($Row['Subject']);?></td>
				<td> <?php echo $Row['RecDate']; ?> </td>
				<td></td>


		</tr>
		 <?php }?>
	</tbody>
</table>
</div>

<table class="table-bordered table-editable table-sm table-hover overflow-y: auto" width="100%" id="tblAsuntoOfertaCodigo" style="font-size: .7rem">
	<thead>
		<th>#</th>
		<th>N°</th>
		<th>Doducumento preliminar</th>
		<th>Clase de documento</th>
	</thead>
	<tbody>
		<td></td>
		<td></td>
		<td></td>
		<td></td>


	</tbody>
</table>

<div id="Paris" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div><div class="modal-footer">
   <a href="#"  class="btn btn-default btn-sm"><i class="  fa fa-trash fa-2x" aria-hidden="true"></i></a>
    <a href="#"  class="btn btn-default btn-sm">Responder<i  aria-hidden="true"></i></a>
     <a href="#"  class="btn btn-default btn-sm">Transmitir<i aria-hidden="true"></i></a>
     <br><br><br><br>
      <a href="#"  class="btn btn-default btn-sm">Ausente<i aria-hidden="true"></i></a>
      <a href="#"  class="btn btn-default btn-sm">Cerrado<i aria-hidden="true"></i></a> 

      </div>
    </div>
  </div>
</div>
<!--Fin Modal-->


	    <?php include "footer.php"; ?>
	</body>
	<script type="text/javascript">

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
		

		$("#myModal").on('click',function(){
			$("#tblcliente tbody").empty();
			$("#buscadorCliente").val("");
		});
		function agregar ($code, $name){
			var code = $code;
			var name = $name;
			$("#codcliente").val(code);
			$("#NombreC").val(name);
			$('#myModal').modal('hide');
			agregarConta(code);
			agregarDire(code);
			$.ajax({
				url: 'socios/sociosSelect.php',
				type: 'post',    
				dataType: 'json',
				data: {CodigoSN: code},
				success: function(response){
					console.log(response)
					$("#grupo").val(response['grupo']);
					$("#moneda").val(response['moneda']);
					$("#rfc").val(response['rfc']);
					$("#saldoCuenta").val(response['saldoCuenta']);
					$("#saldoEntrega").val(response['saldoEntrega']);
					$("#saldoPedidos").val(response['saldoPedidos']);
					$("#telefono1").val(response['telefono1']);
					$("#telefono2").val(response['telefono2']);
					$("#correoElectronico").val(response['correoElectronico']);
					$("#tipo").val(response['tipo']);
					$("#condicionesPago").val(response['condicionesPago']);
					$("#listaPrecios").val(response['listaPrecios']);
					$("#limiteCredito").val(response['limiteCredito']);
					$("#limiteComprometido").val(response['limiteComprometido']);
					$("#personaContacto").val(response['personaContacto']);
					$("#curp").val(response['curp']);
					$("#idFiscalFederalUnificado").val(response['idFiscalFederalUnificado']);
					$("#Vendedor").val(response['vendedor']);
				}
			});
		}


        // Personas de contacto 

		$("#buscadorPersonaContacto").keyup(function(){
			var valorEscrito = $("#buscadorPersonaContacto").val();
			if (valorEscrito) {
				$.ajax({
					url: 'buscadorConsultaContacto.php',
					type: 'post',
					data: {valor: valorEscrito},
					success: function(resp){
						$("#tblPersonaContacto tbody").empty();
						$("#tblPersonaContacto tbody").append(resp);

						$("#tblPersonaContacto tr").on('click',function(){
							var codigo = $(this).find('td').eq(1).text();
							agregarConta(codigo);
							
							$("#tblPersonaContacto tbody").empty();
							$("#buscadorPersonaContacto").val("");
						});   
					},
				});
			} else {
				$("#tblPersonaContacto tbody").empty();
				$("#buscadorPersonaContacto").val("");
			}
		});
		function agregarConta (code){
			var code = code;
			$('#modalPersonasContacto').modal('hide');
			$.ajax({
				url: 'socios/sociosSelect2.php',
				type: 'post',    
				dataType: 'json',
				data: {CodigoSN: code},
				success: function(response){
					$("#idConta").val(response['codigo']);
					$("#NomC").val(response['nombre']);
					$("#cargos").val(response['cargos']);
				},
			});
		}


		


		 // Direcciones  

		$("#buscadorDireccion").keyup(function(){
			var valorEscrito = $("#buscadorDireccion").val();
			if (valorEscrito) {
				$.ajax({
					url: 'buscadorConsultaDireccion.php',
					type: 'post',
					data: {valor: valorEscrito},
					success: function(resp){
						$("#tblDireccion tbody").empty();
						$("#tblDireccion tbody").append(resp);

						$("#tblDireccion tr").on('click',function(){
							var codigo = $(this).find('td').eq(1).text();
							agregarDire(codigo);
							$("#tblDireccion tbody").empty();
						});   
					},
				});
			} else {
				$("#tblDireccion tbody").empty();
			}
		});
		function agregarDire (code){
			var code = code;
			// var name = $name;
			$("#idDireccion").val(code);
			// $("#calle").val(name);
			$('#myModalDireccion').modal('hide');
			$.ajax({
				url: 'socios/sociosSelect3.php',
				type: 'post',    
				dataType: 'json',
				data: {CodigoSN: code},
				success: function(response){
					console.log(response)
					// $("#secondName").val(response['secondName']);
					// $("#thirdName").val(response['thirdName']);
					$("#calle").val(response['calle']);
					$("#ciudad").val(response['ciudad']);
					$("#cpostal").val(response['cpostal']);
					$("#colonia").val(response['colonia']);
					$("#estado").val(response['estado']);
					$("#pais").val(response['pais']);
					$("#idd").val(response['idd']);
					
					
				}
			});
		}

	</script>

</html>
