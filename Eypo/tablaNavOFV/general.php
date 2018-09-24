<br>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
								    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Clase de artículo:</label>
								    <div class="col-sm-4">
		                                <select>
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
					        			<tr class="encabezado" >
											<th><i class="fas fa-ban"></i></th>
											<th>#</th>
					        				<th>Número de artíuclo</th>
					        				<th>Descripción de artíuclo</th>
					        				<th>Cantidad</th>
					        				<th>Precio por unidad</th>
					        				<th>Descuento</th>
					        				<th>Ind. Impuesto</th>
											<th style="display: none"></th>
					        				<th>Total</th>
					        				<th>Almacen</th>
					        				<th>Cantidad pendiente</th>
											<th>Codigo Planificación SAP</th>
											<th>Unidad medida SAP</th>
											<th>Comentarios de partida 1</th>
											<th>Comentarios de partida 2</th>
											
										</tr>
					        		</thead>
					        		<tbody> 
							        	<tr>
											<th><a href="#" style="color: red" id="eliminarFila"><i class="fas fa-trash-alt"></i></a></th>
											<td class="cont"></td>
								          	<td data-toggle="modal" data-target="#myModalArticulos" class="narticulo"></td>
								          	<td data-toggle="modal" data-target="#myModalArticulos" class="darticulo"></td>
								            <td contenteditable="true" class="cantidad"></td>
								            <td contenteditable="true" class="precio"></td>
								            <td contenteditable="true" class="descuento"></td>
											<td class="impu"></td> 
								            <td class="impuesto" style="display:none"></td>
								            <td class="total"></td>
								            <td class="almacen"></td>
											<td class="pendiente"></td>
											<td class="codigoPlanificacionSAP"></td>
											<td class="unidadMedidaSAP"></td>
											<td contenteditable="true" class="comentario1"></td>
											<td contenteditable="true" class="comentario2"></td>
											
					        			</tr>
				            		</tbody>
				        		</table>
					  		</div>
					  	</div>
<br>
				<div class="">
					<fieldset>
				<div class="row" style="font-size: .7rem">
					<div class="col-md-6">
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Empleado de ventas:</label>
						    <div class="col-sm-6">
				    			<input type="text" style="width: 70%" class="empleado" id="empleado" value="<?php echo "$empleadoVentas"; ?>">
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
												<option value="<?php echo $row['PrjName']; ?>"><?php echo $row['PrjName']; ?></option>
												<?php } ?>
						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Ventas Adic:</label>
						    <div class="col-sm-6">
									<select name="" id="ventasAdic" style="width: 70%; height:23px;">
										<option value="" disabled selected>Seleccionar</option>

										<?php
											$sql ="SELECT * FROM IV_EY_PV_EmpleadosVentasCompras";
											$consulta = sqlsrv_query($conn, $sql);
											while ($row = sqlsrv_fetch_array($consulta)) { ?>
												<option value="<?php echo utf8_encode($row['NombreEmpleadoVC']); ?>"> <?php echo utf8_encode($row['NombreEmpleadoVC']); ?> </option>
												<?php } ?>

						    	</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Promotor:</label>
						    <div class="col-sm-6">

									<select name=""id="promotor" style="width: 70%; height:23px;">
										<option value="" disabled selected>Seleccionar</option>

										<?php
											$sql ="SELECT * FROM IV_EY_PV_EmpleadosVentasCompras";
											$consulta = sqlsrv_query($conn, $sql);
											while ($row = sqlsrv_fetch_array($consulta)) { ?>
												<option value="<?php echo utf8_encode($row['NombreEmpleadoVC']); ?>"><?php echo utf8_encode($row['NombreEmpleadoVC']); ?> </option>
												<?php } ?>

									</select>
						    </div>
						</div>
						<div class="row">
						    <label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Coordinador de venta:</label>
						    <div class="col-sm-6">

									<select name="" id="cordVenta" style="width: 70%; height:23px;">
										<option value="" disabled selected>Seleccionar</option>

										<?php
											$sql ="SELECT * FROM IV_EY_PV_EmpleadosVentasCompras";
											$consulta = sqlsrv_query($conn, $sql);
											while ($row = sqlsrv_fetch_array($consulta)) { ?>
												<option value="<?php echo utf8_encode($row['NombreEmpleadoVC']); ?>"><?php echo utf8_encode($row['NombreEmpleadoVC']); ?> </option>
												<?php } ?>

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