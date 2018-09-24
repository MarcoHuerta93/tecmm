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
	<link rel="stylesheet"  href="css/normalize.css">
    <link rel="stylesheet"  href="css/style.css">
	<title>EYPO</title>

</head>
<body>

		<?php include "header.php"; ?>
		<?php include "modales.php"; ?>
		<br>



		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 style="color: #2fa4e7">Solicitud de compra</h3>
				</div>
				<div id="btnEnca" class="col-md-6" style="font-size: 2rem">
					<a href="#" class="
					btn-default btn-sm" id="btnbuscarOferta" data-toggle="modal" data-target="#modalBuscarOferta"><i class="fa fa-binoculars fa-2x" aria-hidden="true" style="color: #6E736D;" ></i></a>
					<a href="#" class="btn btn-default btn-sm" id="btnPdf"><i class="fas fa-file-pdf" style="font-size: 2rem; color: #f57272"></i></a>
					<a href="#" class="btn btn-sm btn-default"  id="consultaPrimerRegistro"><i class="fas fa-arrow-alt-circle-left fa-2x" aria-hidden="true" style="color: #1cc707"></i></a>
					<a  href="#" class="btn btn-sm btn-default" id="consulta1Atras"><i class="fas fa-arrow-left fa-2x" aria-hidden="true" style="color: #1CC707;"></i></a>
					<a  href="#" class="btn btn-sm btn-default" id="consulta1Adelante"><i class="fas fa-arrow-right fa-2x" aria-hidden="true" style="color: #1CC707;"></i></a>
					<a href="#" class="btn btn-sm btn-default" id="consultaUltimoRegistro"><i class="fas fa-arrow-alt-circle-right fa-2x" aria-hidden="true" style="color: #1cc707"></i></a>
					<a href="#" class="btn btn-sm btn-default" id="consultaUltimoRegistro"><i class="fas fa-database" style="font-size: 2rem; color: #ff8500"></i></a>

    				<a href="#"  class="btn btn-default btn-sm" data-toggle="modal" data-target="#miModal">
						<i  class="fa fa-envelope fa-2x" aria-hidden="true" style="color: #2fa4e7"></i>
	    				<span class="badge" style="color:blue; font-weight:bold; font-size:10px; display:none;">Oferta por confirmar</span>
					</a>
				</div>
			</div>
			<div class="row" style="font-size: .7rem">
				<div class="col-md-6">
					<div class="row">
					    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Cliente:</label>
					    <div class="col-sm-4">
					    	<input type="text" class="" name="codcliente" id="codcliente" style="width: 70%">
					    	<a href=""  data-toggle="modal" data-target="#myModal">
					    	<i class="fas fa-search" style="color: #57b4ea" aria-hidden="true"></i></a>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Nombre:</label><br>
					    <div class="col-sm-4">
					    	<input type="text" class="" name="NombreC" id="NombreC" style="width: 70%">
					    	<a href="#" data-toggle="modal" data-target="#myModal">
					    	<i class="fas fa-search" style="color: #57b4ea"></i></a>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Persona de contacto:</label>
					    <div class="col-sm-4">

					    	<select  id="listcontactos" style="width: 70%; height:23px;">
			            <option value="" disabled selected>Seleccione</option>


			          </select>
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Orden de compra:</label>
					   <div class="col-sm-4">
					    	<input type="text" class="" id="oCompra" style="width: 70%">
					    </div>
					</div>
					<div class="row">
					    <div class="col-sm-4">
								<select id="tmoneda" style="height: 23px; width: 80%">
									<option value="" disabled selected>Seleccione</option>
									<?php
											$sql = "SELECT * FROM OCRN";
											$consulta = sqlsrv_query($conn, $sql);
											while ($Row = sqlsrv_fetch_array($consulta)) { ?>
												<option value="<?php  echo $Row['CurrCode']; ?>"><?php  echo $Row['CurrCode']; ?></option>
										<?php	} ?>
								</select>
					    </div>
					</div>
						<div class="row">
							<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Uso principal</label>
						 <div class="col-sm-4">
								<select class="" name="" id="usoPrincipal" style="height: 23px; width: 70%">
									<option value="" disabled selected>Seleccione</option>
									<?php
											$sql = "SELECT * FROM IV_EY_PV_UsosCfdi";
											$consulta = sqlsrv_query($conn, $sql);
											while ($Row = sqlsrv_fetch_array($consulta)) { ?>
												<option value="<?php  echo $Row['CodigoUsoCfdi']; ?>"><?php  echo $Row['CodigoUsoCfdi']; ?></option>
										<?php	} ?>
								</select>
							</div>

						</div>
						<div class="row">
							<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Método de pago</label>
						 <div class="col-sm-4">
								<select class="" name="" style="width: 70%; height:23px;" id="metodoPago">
									<option value="" disabled selected>Seleccione</option>
									<?php
										$sql = "SELECT * FROM IV_EY_PV_MetodosPago";
										$consulta = sqlsrv_query ($conn, $sql);
										while ($row = sqlsrv_fetch_array($consulta)) { ?>
											$algo =
											<option value=" <?php echo $row['CodigoMetodoPagoSat']; ?> "><?php echo $row['CodigoMetodoPagoSat']; ?></option>
											<?php } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Forma de pago</label>
						 <div class="col-sm-4">
							 <select class="" name="" style="width: 70%; height:23px;" id="formaPago">
								 <option value="" disabled selected>Seleccione</option>
								 <?php
									 $sql = "SELECT * FROM IV_EY_PV_FormasPago";
									 $consulta = sqlsrv_query ($conn, $sql);
									 while ($row = sqlsrv_fetch_array($consulta)) { ?>
										 <option value=" <?php echo $row['CodigoFormaPago']; ?> "><?php echo $row['CodigoFormaPago']; ?></option>
										 <?php
									 }
								 ?>
							 </select>
							</div>
						</div>
				</div>
				<div class="col-md-6">
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">N°:</label>
					    <div class="col-sm-4">
					    	<input type="text" class="" id="ndoc"  size="8" value="COT-GRAL" readonly="true" >

											<?php
                      $consultasql = sqlsrv_query($conn,"SELECT  	FolioSAP  FROM IV_EY_PV_OfertasVentasCab") ;
					        	  while ($Row = sqlsrv_fetch_array($consultasql)) {
											$folio = $Row['FolioSAP'];
											$folio++;
					       }?>



    					<input type="text" class="" id="cdoc"  size="5" value="<?php echo "$folio"; ?>" readonly="true">

					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Estado:</label>
					        <div class="col-sm-4">
					    	<input type="text"  id="status" value="Abierto" readonly="true" style="width: 70%">

					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha de contabilización:</label>
					    <div class="col-sm-4">

					   <input type="date" class="" id="fconta" style="width: 70%">
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha de entrega	:</label>
					   <div class="col-sm-4">
					    	<input type="date" class="" id="fentrega" style="width: 70%">
					    </div>
					</div>
					<div class="row">
					    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Fecha del documento:</label>
					   <div class="col-sm-4">
					    	<input type="date" class="" id="fdoc" style="width: 70%" >
					    </div>
					</div>
					<div class="row">
						<div class="col-md-7 offset-md-4 text-right" style="margin-top: 10px">
							<button class="btn btn-secundary btn-sm" id="btnCamposDefinidos">Campos definidos por el usuario</button>
						</div>
					</div>
					<div class="row text-right" id="camposDefinidos" style="font-size: .7rem; margin-top: 10px">

							<label for="" class="col-sm-3 offset-md-6 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Número a letra:</label>
						 <div class="col-sm-3">
								<input type="text" id="numLetra" >
							</div>
							<label for="" class="col-sm-3 offset-md-6 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Tipo de factura:</label>
						 <div class="col-sm-3">
								<input type="text" id="tipoFactura" >
							</div>
							<label for="" class="col-sm-3 offset-md-6 col-form-label" style="padding-right: 0px; padding-bottom:  0px">LAB:</label>
						 <div class="col-sm-3">
								<input type="text" id="lab" >
							</div>
							<label for="" class="col-sm-3 offset-md-6 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Condición de pago:</label>
						 <div class="col-sm-3">
								 <select class="" name="" id="condicionPago" style="height: 23px; width: 128%">
									 <option value="" disabled selected>Seleccione</option>

								 <?php
  							 		$sql = "SELECT * FROM IV_EY_PV_CondicionesPago";
  							 		$consulta = sqlsrv_query($conn, $sql);
  							 		while ($Row = sqlsrv_fetch_array($consulta)) { ?>
  							 			<option value="<?php  echo $Row['CodigoCondicion']; ?>"><?php  echo $Row['CodigoCondicion']; ?></option>
  							 	<?php	} ?>
							 </select>
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
						<li class="nav-item">
						    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#anexos" role="tab" aria-controls="anexos" aria-selected="false">Anexos</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="contenido" role="tabpanel" aria-labelledby="home-tab">
					  		<br>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Clase de artículo:</label>
									   <div class="col-sm-4">
		                                <select class=" " >
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
									    	<select class="" >
	           									<option>Sin Resumen</option>
	          								</select>
									    </div>
									</div>
								</div>
							</div>
					  		<br>
						  	<div class="row">
						  		<div class="col-md-12">
						  			<table class="table-bordered table-editable" width="100%" id="detalleoferta">
						        		<thead>
						        			<tr class="encabezado">
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
						        			</tr>

						        		</thead>
						        		<tbody>
								         <tr>

									          	<td data-toggle="modal" data-target="#myModalArticulos" class="narticulo"></td>
									          	<td data-toggle="modal" data-target="#myModalArticulos" class="darticulo"></td>
									            <td contenteditable="true" class="cantidad"></td>
									            <td contenteditable="true" class="precio"></td>
									            <td contenteditable="true" class="descuento"></td>
															<td></td>
									            <td class="impuesto" style="display:none"></td>
									            <td class="total"></td>
									            <td class="almacen"></td>
															<td class="pendiente"></td>

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
				    <input type="text" style="width: 70%" class="" id="empleado" value="<?php echo "$empleadoVentas"; ?>">
						    </div>
						</div>

						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Propietario:</label>
						    <div class="col-sm-6">
						    	 <input type="text" style="width: 70%" class="" id="NombrePropietario" value="<?php echo "$nombreCompleto"; ?>">
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Proyecto SN:</label>
						    <div class="col-sm-6">

						    	<select name="" id="proyectoSN" style="width: 70%; height:23px;">
						    		<option value="" disabled selected>Seleccione</option>
										<?php
											$sql = "SELECT * FROM OPRJ";
											$consulta = sqlsrv_query ($conn, $sql);
											while ($row = sqlsrv_fetch_array($consulta)) { ?>
												<option value=" <?php echo $row['PrjName']; ?> "><?php echo $row['PrjName']; ?></option>
												<?php } ?>
						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Ventas Adic:</label>
						    <div class="col-sm-6">

						    	<select name="" id="ventasAdic" style="width: 70%; height:23px;">
						    		<option value=""></option>
						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Promotor:</label>
						    <div class="col-sm-6">

						    	<select name="" id="promotor" style="width: 70%; height:23px;">
						    		<option value=""></option>
						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Coordinador de venta:</label>
						    <div class="col-sm-6">

						    	<select name="" id="cordVenta" style="width: 70%; height:23px;">
						    		<option value=""></option>
						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Comentarios:</label>
						    <div class="col-sm-4">
						    	<textarea name="" id="comentarios" cols="50" rows="1"></textarea>
						    </div>
						</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Total antes del descuento:</label>
						    <div class="col-sm-4">

						    <input type="text" class="monto" id="totalAntesDescuento" style="width: 100%" >
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Descuento:</label>
						    <div class="col-sm-4">
						    	<input type="text" id="descNum" value="" style="width: 20%;"> %
									<input type="text" name="" id="descAplicado" value="" style="width: 60% ">
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Redondeo:</label>
						    <div class="col-sm-4">
						    	<input type="text" id="redondeo" name="" value=""style="width: 100%">
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Impuesto:</label>
						    <div class="col-sm-4">

						    	<input type="text" class="monto" name="impue" id="impuestoTotal" style="width: 100%">
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 offset-md-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Total del documento:</label>
						    <div class="col-sm-4">
									<input type="text" id="totalDelDocumento" value="" style="width: 100%">
						    </div>
						</div>
					</div>
				</div>
				</div>
			</fieldset>

				<div class="row" id= btnFoot>
					<div class="col-md-6">
						<button class="btn btn-sm" style="background-color: orange" id="btnCrear">Crear</button>
							<button class="btn btn-sm" style="background-color: orange; display:none;" id="btnActualizar">Actualizar</button>
						<a href="">	<button class="btn btn-sm" style="background-color: orange">Cancelar</button></a>
					</div>

					<div class="col-md-6 text-right">
						<button class="btn btn-secundary btn-sm">Copiar a</button>
						<button class="btn btn-secundary btn-sm">Copiar a</button>
					</div>
				</div>
			</div>
			</div>

</div>

		<!--Modal Cotizaciones-->
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
						</div>
						<div class="modal-footer">
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
		</div>
	<?php include "footer.php"; ?>
</body>
<script type="text/javascript">

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
	/// obtener la fecha
	var hoy = new Date();
	var dd = hoy.getDate();
	var mm = hoy.getMonth()+1; //hoy es 0!
	var yyyy = hoy.getFullYear();

	if(dd<10) {
	  dd='0'+dd
	}
	if(mm<10) {
	  mm='0'+mm
	}

	hoy = yyyy+'-'+mm+'-'+dd;

	var mentre = new Date();
	var d = mentre.getDate();
	var m = mentre.getMonth()+1; //hoy es 0!
	var ment = mentre.getMonth()+2
	var yyyy = mentre.getFullYear();
	if(d<10) {
	  d='0'+d
	}
	if(ment<10) {
	  ment='0'+ment
	}
	mentre= yyyy+'-'+ment+'-'+dd;

 // alert(hoy)
 $("#fconta").val(hoy);
 $("#fentrega").val(mentre);
 $("#fdoc").val(hoy);


		//Para realizar la búsqueda en la tabla cliente
$("#buscador").keyup(function(){
	if( $(this).val() != ""){
		$("#tblcliente tbody>tr").hide();
		$("#tblcliente td:contiene-palabra('" + $(this).val() + "')").parent("tr").show();
	} else{
    $("#tblcliente tbody>tr").show();
  }
});

jQuery.extend(jQuery.expr[":"],
{
	"contiene-palabra": function(elem, i, match, array) {
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});


$("#tblcliente tbody tr").on('click',function(){
	var codigo = $(this).find('td').eq(1).text();
	var name = $(this).find('td').eq(2).text();
	agregar(codigo, name);
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

$("#buscadorart").keyup(function() {
	if( $(this).val() != ""){
	  $("#tblarticulo tbody>tr").hide();
	  $("#tblarticulo td:contiene-palabra('" + $(this).val() + "')").parent("tr").show();
	} else {
		$("#tblarticulo tbody>tr").show();
	}
});

$("#tblarticulo tbody tr").on('click',function() {

  	var codigo = $(this).find('td').eq(1).text();
  	var articulo = $(this).find('td').eq(2).text();
  	var pree = $(this).find('td').eq(3).text();
		var almacen = $(this).find('td').eq(7).text();
  	agregarArticuloATabla(codigo, articulo, pree, almacen);

});

function agregarArticuloATabla (codes, articulo, precio, almacen){

	var tasa = 0.16;
	var precioInt = parseFloat(precio);
	var impuestoUnitario = tasa * precioInt;

	$("#detalleoferta tbody tr").on('keyup', function() {

	  var cantidad = $(this).find('td').eq(2).text();
	  var precioUnitario = $(this).find("td:eq(3)").text();
	  var tasa = $(this).find("td:eq(5)").text();

	  var cant = parseInt(cantidad);
	  var preUnitario = parseFloat(precioUnitario);
	  var impuest = parseFloat(tasa);

		var precioPorArticulo = cant * preUnitario;
	  var iva = precioPorArticulo * impuest;


	  $(this).find("td:eq(6)").text(iva);
		$(this).find("td:eq(7)").text(precioPorArticulo);
		calcularTotalAntesDescuento(); // ya esta
		calcularImpuestoTotal(); // ya esta
		sumarTotalDocumento();

	});

	$("#detalleoferta tbody tr:last td:eq(0)").text(codes);
	$("#detalleoferta tbody tr:last td:eq(1)").text(articulo);
	$("#detalleoferta tbody tr:last td:eq(2)").text('1');
	$("#detalleoferta tbody tr:last td:eq(3)").text(precioInt);
	$("#detalleoferta tbody tr:last td:eq(5)").text(tasa);
	$("#detalleoferta tbody tr:last td:eq(6)").text(impuestoUnitario);
	$("#detalleoferta tbody tr:last td:eq(7)").text(precioInt);
	$("#detalleoferta tbody tr:last td:eq(8)").text(almacen);
	calcularTotalAntesDescuento(); // ya esta
	calcularImpuestoTotal(); // ya esta
	sumarTotalDocumento();
	crearNuevaFilaTablaDetalleOferta();
}

function crearNuevaFilaTablaDetalleOferta(){
	$('#detalleoferta tr:last').clone().appendTo('#detalleoferta');
	$("#detalleoferta tbody tr:last td:eq(0)").empty();
	$("#detalleoferta tbody tr:last td:eq(1)").empty();
	$("#detalleoferta tbody tr:last td:eq(2)").empty();
	$("#detalleoferta tbody tr:last td:eq(3)").empty();
	$("#detalleoferta tbody tr:last td:eq(5)").empty();
	$("#detalleoferta tbody tr:last td:eq(6)").empty();
	$("#detalleoferta tbody tr:last td:eq(7)").empty();
	$("#detalleoferta tbody tr:last td:eq(8)").empty();
	$('#myModalArticulos').modal('hide');
}

function calcularTotalAntesDescuento() {
	var totalDeuda = 0;
	$(".total").each(function(){
		totalDeuda += parseFloat($(this).html()) || 0;
	});
	$("#totalAntesDescuento").val(totalDeuda);
}

function calcularImpuestoTotal() {
 var totalIva=0;
 $(".impuesto").each(function(){
	 totalIva += parseFloat($(this).html()) || 0;
 });
 $("#impuestoTotal").val(totalIva);
}

function sumarTotalDocumento() {

	var totalAntes = $("#totalAntesDescuento").val();
	var impuestoT = $("#impuestoTotal").val();
	var totalDocumento = parseFloat(totalAntes) + parseFloat(impuestoT);

	$("#totalDelDocumento").val(totalDocumento);
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
		var estado = $('#status').val();
		var fconta =  $('#fconta').val();   //esto es fecha marco
		var fentrega = $('#fentrega').val();   //esto es fecha marco
		var fdoc =  $('#fdoc').val();   //esto es fecha marco
		var numLetra =  $('#numLetra').val();
		var tipoFactura =  $('#tipoFactura').val();
		var lab =  $('#lab').val();
		var condicionPago =  $('#condicionPago').val();
		var empleado =  $('#empleado').val();
		var NombrePropietario =  $('#NombrePropietario').val();
		var proyectoSN =  $('#proyectoSN').val();
		var ventasAdic =  $('#ventasAdic').val();
		var promotor =  $('#promotor').val();
		var comentarios =  $('#comentarios').val();
		var totalAntesDescuento =  $('#totalAntesDescuento').val();
		var descNum =  $('#descNum').val();
		var descAplicado =  $('#descAplicado').val();
		var redondeo =  $('#redondeo').val();
		var impuesto =  $('#impuestoTotal').val();
		var totalDelDocumento =  $('#totalDelDocumento').val();
		var fechaCreate = new Date();
		var dd = fechaCreate.getDate();
		var mm = fechaCreate.getMonth();
		var yyyy = fechaCreate.getFullYear();
		fechaCreate = yyyy+'-'+mm+'-'+dd;
		console.log(fechaCreate);

	$.ajax({
		type:'post',
		url: "ofertaDeVentaInsertEnc.php",
		data:{
			cliente: cliente, nombre: nombre, personaContacto: personaContacto,
			ordenCompra: ordenCompra, tipoMoneda: tipoMoneda,
			usoPrincipal: usoPrincipal, metodoPago: metodoPago,
			formaPago: formaPago, ndoc: ndoc, cdoc: cdoc, estado: estado,
			fconta: fconta, fentrega: fentrega, fdoc: fdoc, numLetra: numLetra,
			tipoFactura: tipoFactura, lab: lab, condicionPago: condicionPago,
			empleado: empleado, NombrePropietario: NombrePropietario,
			proyectoSN: proyectoSN, ventasAdic: ventasAdic,
			promotor: promotor, comentarios: comentarios,
			totalAntesDescuento: totalAntesDescuento,
			descNum: descNum, descAplicado: descAplicado,
			redondeo: redondeo, impuesto: impuesto,
			totalDelDocumento: totalDelDocumento, fecha: fechaCreate,
		},
		success: function(resp){
			alert(resp);
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
							},
							success: function(resp){
								console.log(resp);
								setTimeout('document.location.reload()',1000);
							}
						});
					 }
				 });
			 });  //lo hizo richy y marco

			 $("#btnActualizar").on('click', function(){
		 		var ordenCompra = $('#oCompra').val();
				var cdoc = $('#cdoc').val();
				var usoPrincipal = $('#usoPrincipal').val();
				var metodoPago = $('#metodoPago').val();
				var formaPago = $('#formaPago').val();
				var condicionPago = $('#condicionPago').val();

				console.log(condicionPago)


		 	$.ajax({
		 		type:'post',
		 		url: "actualizarCab.php",
		 		data:{
		 			ordenCompra: ordenCompra,
					usoPrincipal: usoPrincipal,
					metodoPago: metodoPago,
					formaPago: formaPago,
					condicionPago: condicionPago,
					cdoc: cdoc,

		 		},
		 		success: function(resp){
		 			alert(resp);
         setTimeout('document.location.reload()',1000);

		 					 }
		 				 });
		 			 });  //lo hizo richy y marco


			 function seleccionarMoneda(elemento) {
		 var combo =document.getElementById("tmoneda");
		 var cantidad = combo.length;
		 for (i = 0; i < cantidad; i++) {
		    if (combo[i].value == elemento) {
		     combo[i].selected = true;
		    }
		  }
		}

		$("#consulta1Atras").on('click', function(){
			var cdoc = $("#cdoc").val();
			var us = $("#empleado").val();

			$.ajax({
				type: 'post',
				url: 'consulta1Atras.php',
				data: { cdoc: cdoc, us: us },
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
					$("#cdoc").val(response['DocNum']).prop("disabled", true);
					$("#status").val(response['Status']).prop("disabled", true);
					$("#fconta").val(response['FConta']).prop("disabled", true);    //esto es fecha marco
					$("#fentrega").val(response['FEntrega']).prop("disabled", true);  //esto es fecha marco
					$("#fdoc").val(response['FDoc']).prop("disabled", true);  //esto es fecha marco
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']).prop("disabled", true);
					$('#ventasAdic').val(response['ventasAdic']).prop("disabled", true);
					$('#promotor').val(response['Promotor']).prop("disabled", true);
					$('#comentarios').val(response['comentarios']).prop("disabled", true);
					$('#totalDescuento').val(response['totalDescuento']).prop("disabled", true);
					$('#descNum').val(response['descNum']).prop("disabled", true);
					$('#desAplicado').val(response['desAplicado']).prop("disabled", true);
					$('#redondeo').val(response['redondeo']).prop("disabled", true);
					$('#impuesto').val(response['impuesto']).prop("disabled", true);
					$('#totalDelDocumento').val(response['totalDelDocumento']).prop("disabled", true);
					$('#btnCrear').hide(); //oculto mediante id
					$('#btnActualizar').show(); //mostrar mediante id

					$.ajax({
						type: 'post',
						url: 'consulta1Atras2.php',
						data: { cdoc: cdoc},
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}
			});
		});

		$("#consultaPrimerRegistro").on('click', function(){
			var cdoc = $("#cdoc").val();
			var us = $("#empleado").val();

			$.ajax({
				type:'post',
				url: 'consultaPrimerRegistro.php',
				dataType: 'json',

				data:{ us: us, cdoc: cdoc },
				success: function(response){
					$("#codcliente").val(response['CodCliente']);
				  $("#NombreC").val(response['NombreC']);
					$("#listcontactos").val(response['ListContactos']);
					$("#oCompra").val(response['OrdCompra']);
					$("#tmoneda").val(response['TipoMoneda']);
					$("#usoPrincipal").val(response['usoPrincipal']);
					$("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					$("#ndoc").val(response['NDoc']);
					$("#cdoc").val(response['DocNum']);
					$("#status").val(response['Status']);
					$("#fconta").val(response['FConta']);    //esto es fecha marco
					$("#fentrega").val(response['FEntrega']);  //esto es fecha marco
					$("#fdoc").val(response['FDoc']);  //esto es fecha marco
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']);
					$('#ventasAdic').val(response['ventasAdic']);
					$('#promotor').val(response['Promotor']);
					$('#comentarios').val(response['comentarios']);
					$('#totalDescuento').val(response['totalDescuento']);
					$('#descNum').val(response['descNum']);
					$('#desAplicado').val(response['desAplicado']);
					$('#redondeo').val(response['redondeo']);
					$('#impuesto').val(response['impuesto']);
					$('#totalDelDocumento').val(response['totalDelDocumento']);
					$('#btnCrear').hide(); //oculto mediante id
					$('#btnActualizar').show(); //mostrar mediante id


					$.ajax({
						type:'post',
						url:'consultaPrimerRegistroDet.php',
						data: { cdoc: cdoc},
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}
			});
		});

		$("#consulta1Adelante").on('click', function(){

			var cdoc = $("#cdoc").val();
			var us = $("#empleado").val();
			cdoc = cdoc;
			console.log(cdoc);

			$.ajax({
				type: 'post',
				url: "consulta1Adelante.php",
				dataType: 'json',
				data: { cdoc: cdoc, us: us },
				success: function(response){
					$("#codcliente").val(response['CodCliente']);
				  $("#NombreC").val(response['NombreC']);
					$("#listcontactos").val(response['ListContactos']);
					$("#oCompra").val(response['OrdCompra']);
					$("#tmoneda").val(response['TipoMoneda']);
					$("#usoPrincipal").val(response['usoPrincipal']);
					$("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					$("#ndoc").val(response['NDoc']);
					$("#cdoc").val(response['DocNum']);
					$("#status").val(response['Status']);
					$("#fconta").val(response['FConta']);    //esto es fecha marco
					$("#fentrega").val(response['FEntrega']);  //esto es fecha marco
					$("#fdoc").val(response['FDoc']);  //esto es fecha marco
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']);
					$('#ventasAdic').val(response['ventasAdic']);
					$('#promotor').val(response['Promotor']);
					$('#comentarios').val(response['comentarios']);
					$('#totalDescuento').val(response['totalDescuento']);
					$('#descNum').val(response['descNum']);
					$('#desAplicado').val(response['desAplicado']);
					$('#redondeo').val(response['redondeo']);
					$('#impuesto').val(response['impuesto']);
					$('#totalDelDocumento').val(response['totalDelDocumento']);
					$('#btnCrear').hide(); //oculto mediante id
					$('#btnActualizar').show(); //mostrar mediante id

					$.ajax({
						type: 'post',
						url: 'consulta1Adelante2.php',
						data: { cdoc: cdoc},
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}
			});
		});

		$("#consultaUltimoRegistro").on('click', function consultaUltimoRegistro(){
			var cdoc = $("#cdoc").val();
			var us = $("#empleado").val();
			$.ajax({
				type:'post',
				url: 'consultaUltimoRegistro.php',
				dataType: 'json',
				data:{ us: us, cdoc: cdoc },
				success: function(response){
					$("#codcliente").val(response['CodCliente']);
					$("#NombreC").val(response['NombreC']);
					$("#listcontactos").val(response['ListContactos']);
					$("#oCompra").val(response['OrdCompra']);
					$("#tmoneda").val(response['TipoMoneda']);
					$("#usoPrincipal").val(response['usoPrincipal']);
					$("#metodoPago").val(response['metodoPago']);
					$("#formaPago").val(response['formaPago']);
					$("#ndoc").val(response['NDoc']);
					$("#cdoc").val(response['DocNum']);
					$("#status").val(response['Status']);
					$("#fconta").val(response['FConta']);    //esto es fecha marco
					$("#fentrega").val(response['FEntrega']);  //esto es fecha marco
					$("#fdoc").val(response['FDoc']);  //esto es fecha marco
					$("#numLetra").val(response['numLetra']);
					$("#tipoFactura").val(response['TipoFactura']);
					$("#lab").val(response['Lab']);
					$("#condicionPago").val(response['CondicionPago']);
					$('#proyectoSN').val(response['proyectoSN']);
					$('#ventasAdic').val(response['ventasAdic']);
					$('#promotor').val(response['Promotor']);
					$('#comentarios').val(response['comentarios']);
					$('#totalDescuento').val(response['totalDescuento']);
					$('#descNum').val(response['descNum']);
					$('#desAplicado').val(response['desAplicado']);
					$('#redondeo').val(response['redondeo']);
					$('#impuesto').val(response['impuesto']);
					$('#totalDelDocumento').val(response['totalDelDocumento']);
					$('#btnCrear').hide(); //oculto mediante id
					$('#btnActualizar').show(); //mostrar mediante id


					$.ajax({
						type:'post',
						url:'consultaUltimoRegistroDet.php',
						data: { cdoc: cdoc},
						success: function(res){
							$("#detalleoferta tbody").empty();
							$("#detalleoferta tbody").append(res);
						}
					});
				}

			});
		});



		$("#tblBuscarOfertas tr").on('click', function(){
			var cdoc = $(this).find("td:eq(1)").text();

			$.ajax({
					type: 'post',
					url:'buscarOferta.php',
					data: {
						cdoc: cdoc
					},
					success: function(array){
						console.log(array);
						var DocNum = array['DocNum'];
				    var CodCliente = array['CodCliente'];
				    var NombreC = array['NombreC'];
				    var ListContactos = array['ListContactos'];
				    var OrdCompra = array['OrdCompra'];
				    var TipoMoneda = array['TipoMoneda'];
				    var Status = array['Status'];
				    var NDoc = array['NDoc'];
				    var numLetra = array['numLetra'];
				    var TipoFactura = array['TipoFactura'];
						var Lab = array['Lab'];
				    var CondicionPago = array['CondicionPago'];

				    $("#codcliente").val(CodCliente);
						$("#NombreC").val(NombreC);
						$("#listcontactos").val(ListContactos);
						$("#oCompra").val(OrdCompra);
						$("#tmoneda").val(TipoMoneda);
						$("#ndoc").val(NDoc);
						$("#cdoc").val(DocNum);
						$("#status").val(Status);
						// $("#fconta").val(CodCliente);
						// $("#fentrega").val(CodCliente);
						// $("#fdoc").val(CodCliente);
						$("#numLetra").val(numLetra);
						$("#tipoFactura").val(TipoFactura);
						$("#lab").val(Lab);
						$("#condicionPago").val(CondicionPago);

						$("#modalBuscarOferta").modal('hide');

					}
			});
		});

	$("#btnbuscarOferta").on('click', function(){
		var us = $("#empleado").val();

		$.ajax({
			type: 'post',
			url: 'consultaGeneralOFV.php',
			data: { us: us },
			success: function(response){
				$("#modalBuscarOferta tbody").empty();
				$("#modalBuscarOferta tbody").append(response);
			},
		});
	});

	$("#tblBuscarOfertas tbody tr").on('click',function(){
		var codigo = $(this).find('td').eq(0).text();
   $.ajax({
		 type: 'post',
		 url: 'consultGeneralPOST.php',
		 data:{ codigo: codigo },
		 success: function(response){

			 $("#codcliente").val(response['CodCliente']);
			 $("#NombreC").val(response['NombreC']);
			 $("#listcontactos").val(response['ListContactos']);
			 $("#oCompra").val(response['OrdCompra']);
			 $("#tmoneda").val(response['TipoMoneda']);
			 $("#usoPrincipal").val(response['usoPrincipal']);
			 $("#metodoPago").val(response['metodoPago']);
			 $("#formaPago").val(response['formaPago']);
			 $("#ndoc").val(response['NDoc']);
			 $("#cdoc").val(response['DocNum']);
			 $("#status").val(response['Status']);
			 $("#fconta").val(response['FConta']);    //esto es fecha marco
			 $("#fentrega").val(response['FEntrega']);  //esto es fecha marco
			 $("#fdoc").val(response['FDoc']);  //esto es fecha marco
			 $("#numLetra").val(response['numLetra']);
			 $("#tipoFactura").val(response['TipoFactura']);
			 $("#lab").val(response['Lab']);
			 $("#condicionPago").val(response['CondicionPago']);
			 $('#proyectoSN').val(response['proyectoSN']);
			 $('#ventasAdic').val(response['ventasAdic']);
			 $('#promotor').val(response['Promotor']);
			 $('#comentarios').val(response['comentarios']);
			 $('#totalDescuento').val(response['totalDescuento']);
			 $('#descNum').val(response['descNum']);
			 $('#desAplicado').val(response['desAplicado']);
			 $('#redondeo').val(response['redondeo']);
			 $('#impuesto').val(response['impuesto']);
			 $('#totalDelDocumento').val(response['totalDelDocumento']);
			 $('#modalBuscarOferta').modal('hide');
		 },
	 });

	});



</script>


</html>
