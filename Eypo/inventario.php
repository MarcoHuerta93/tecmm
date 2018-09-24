<?php
include "conexion.php";
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
				<h3 style="color: #2fa4e7">Datos maestros de articulos</h3>
			</div>
			<div id="btnEnca" class="col-md-6" style="font-size: 2rem">
				<a href="#" class="btn btn-default btn-sm" id="btnbuscarArticulo" data-toggle="modal" data-target="#myModalArticulos"><i class="fa fa-binoculars fa-2x" aria-hidden="true" style="color: #6E736D;" ></i></a>
			</div>
		</div>
		<div class="row" style="font-size: .7rem">
			<div class="col-md-6">
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Numero de articulo:</label>
				    <div class="col-sm-4">
						<input type="text" class="" id="codigoSN"   value="" readonly="true" style="width: 100%" disabled>
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Descripcion:</label><br>
				    <div class="col-sm-4">
				    	<input type="text" class="" name="NombreC" id="NombreC" style="width: 100%" disabled>
				    </div>
				</div>
				<div class="row">
				    <label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Referencia Completa</label>
				    <div class="col-sm-4">
				    	<input type="text" id="referenciaCompleta" style="width: 100%" disabled>
				    </div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Grupos de articulos</label>
				 	<div class="col-sm-4">
				 		<input type="text" id="gruposArticulos" style="width: 100%" disabled>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Grupo unid. de medida</label>
				 	<div class="col-sm-4">
				 		<input type="text" id="grupoUnidadMedida" style="width: 100%" disabled>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label" style="padding-right: 0px; padding-bottom:  0px">Lista de precios</label>
					<div class="col-sm-4">
						<input type="text" class="" id="listaPrecios" style="width: 100%" disabled>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row" style="font-size: .7rem">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#contenido" role="tab" aria-controls="contenido" aria-selected="true">General</a>
					</li>

					<li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#finanzas" role="tab" aria-controls="finanzas" aria-selected="false">Datos de inventario</a>
					</li>
				</ul>
				<!--comienza tab  -->
				<br>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="contenido" role="tabpanel" aria-labelledby="home-tab">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-sm-12">
										<label>
											<input id="sujetoImpuesto" type="checkbox" disabled>
							                <span class="checkmark"></span>
											Sujeto a impuesto
						              	</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label>
											<input id="noAplicaGrupoDesc" type="checkbox" disabled>
							                <span class="checkmark"></span>
											No aplicar grupos de descuento
                      					</label>
									</div>
								</div>
								<div class="row">
									<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Fabricante:</label>
									<div class="col-sm-4">
										<input type="text" id="fabricante" disabled>
									</div>
								</div>
								<div class="row">
									<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">ID adicional:</label>
									<div class="col-sm-4">
										<input type="text" id="idAdicional" disabled>
									</div>
								</div>
								<div class="row">
									<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Numeros de serie y de lote:
									</label>
									<div class="col-sm-4">
										<input type="text" id="nSerieyLote"	disabled>	
									</div>
								</div>
								<div class="row">
									<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Pedimento A.A:</label>
									<div class="col-sm-4">
										<input type="text" id="pedimento" disabled>
									</div>
								</div>
								<br>
								</div>
								<br>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Proveedor prederteminado:</label>
										<div class="col-sm-4">
											<input type="text" id="proveedorPredeterminado" disabled>
										</div>
									</div>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Numero de catalogo de fabricante:</label>
										<div class="col-sm-4">
											<input type="text" id="nCatalogoFabricante" disabled>
										</div>
									</div>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Nombre de unidad de medida:</label>
										<div class="col-sm-4">
											<input type="text" id="nombreUnidadMedica" disabled>
										</div>
									</div>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Articulos por unidad de compras:</label>
										<div class="col-sm-4">
											 <input type="text" id="articulosUnidadCompras" disabled>
										</div>
									</div>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Unidad de medida de empaque:</label>
										<div class="col-sm-4">
											<input type="text" id="unidadMedidaEmpaque" disabled>
										</div>
									</div>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Cantidad por paquete:</label>
										<div class="col-sm-4">
											 <input type="text" id="cantidadEmpaque" disabled>
										</div>
									</div>
									<br><br>
									<div class="row">
										<label for="" class="col-sm-4 col-form-label" style="padding-right: 0px; padding-bottom: 0px">Codigo de clasificacion SAT:</label>
										<div class="col-sm-4">
											<input type="text" id="codigoClasificacionSAT" disabled>
										</div>
									</div>
								</div>
							</div>
							<br>
					  	</div>


    			<div class="tab-pane fade" id="finanzas">
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-sm table-bordered table-striped" id="tblInventrio">
								<thead>
									<tr>
										<th  scope="col">Codigo alamacen</th>
										<th  scope="col">Nombre de almacen</th>
										<th  scope="col">Bloqueo</th>
										<th  scope="col">Stock</th>
										<th  scope="col">Primera ubicacion</th>
										<th  scope="col">Comprometido</th>
										<th  scope="col">Ubicacion por defecto</th>
										<th  scope="col">Pedido</th>
										<th  scope="col">Ejecutar ubicacion estandar</th>
										<th  scope="col">Disponible</th>
									</tr>
								</thead>
								<tbody>
									<tr class="total">
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br>

				
			</div>
		</div>
	</div>
</div>

</div>



	  <?php include "footer.php"; ?>
	</body>
	<script type="text/javascript">
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
							$("#codigoSN").val(codigo);
							$("#NombreC").val($(this).find('td').eq(2).text());
							$("#referenciaCompleta").val($(this).find('td').eq(2).text());
							$.ajax({
								url: 'inventario/consultaArticulos.php',
								type: 'post',
								dataType: 'json',

								data:{ code: codigo },
								success: function (response){
									console.log(response);
									
									$("#gruposArticulos").val(response['gruposArticulos']);
									$("#listaPrecios").val(response['codigoListaPrecios']);
									$("#codigoClasificacionSAT").val(response['clasificacionSATCodigo']);
									$("#grupoUnidadMedida").val(response['descripcionUnidadMedida']);
									$("#fabricante").val(response['fabricante']);
									var sujetoImpuesto = response['sujetoImpuesto'];
									var noAplicaGrupoDesc = response['noAplicaGrupoDesc'];

									if (sujetoImpuesto == 'Y') {
										$("#sujetoImpuesto").attr('checked', true);
									}
									if (noAplicaGrupoDesc == 'Y') {
										$("#noAplicaGrupoDesc").attr('checked', true);
									}

									$("#idAdicional").val(response['idAdicional']);
									$("#proveedorPredeterminado").val(response['codigoPredeterminado']);
									$("#nCatalogoFabricante").val(response['NumCatFabricante']);
									$("#nombreUnidadMedica").val(response['InvUM']);
									$("#articulosUnidadCompras").val(response['ComprasUM']);
									$("#unidadMedidaEmpaque	").val(response['NombreUM_EmpCom']);
									$("#cantidadEmpaque").val(response['CantidadPaq_Com']);
									$("#nSerieyLote").val(response['gestionPor']);
									


									$("#tblInventrio tbody tr").find('td').eq(0).append(response['codigoAlmacen']);
									$("#tblInventrio tbody tr").find('td').eq(1).append(response['nombreAlmacen']);
									$("#tblInventrio tbody tr").find('td').eq(2).append(response['bloqueo']);
									$("#tblInventrio tbody tr").find('td').eq(3).append(response['stock']);
									$("#tblInventrio tbody tr").find('td').eq(4).append(response['primeraUbicacion']);
									$("#tblInventrio tbody tr").find('td').eq(5).append(response['comprometido']);
									$("#tblInventrio tbody tr").find('td').eq(6).append(response['ubicacionPorDef']);
									$("#tblInventrio tbody tr").find('td').eq(7).append(response['pedido']);
									$("#tblInventrio tbody tr").find('td').eq(8).append(response['ejecUbiEstandar']);
									$("#tblInventrio tbody tr").find('td').eq(9).append(response['disponible']);

									$("#myModalArticulos").modal('hide');
								},
							});
						});
					},
				});
			} else {
				$("#tblarticulo tbody").empty();
			}
		}
	});


	</script>


</html>
