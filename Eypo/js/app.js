  $("#camposDefinidos").hide();


  $("#btnClean").on('click', function(){
	$("#dateFinal").val('');
	$("#nombreSolicitante").val('');
	$("#nombreProyecto").val('');
	$("#numeroDeOrden").val('');
	$("#nombreCliente").val('');
	$("#cantidadFabricar").val('');
	$("#entregasParciales").val('');
	$("#productosFabricar").val('');
	$("#productosFabricarNombre").val('');
	// $("#tblarticuloDesarme tbody tr").empty();
	$("#productosDesarmar").val('');
	$("#productosDesarmarNombre").val('');
	$("#material").val('');
	$("#terminadoFinal").val('');
	$("#observaciones").val('');



});

$("#btnPdfArcos").on('click', function(){
	$("#btnEnca").hide();
	$("#btnFoot").hide();
	window.print();
	$("#btnEnca").show();
	$("#btnFoot").show();
});

var d = new Date();
$("#dateInicial").text(d);
$("#dateIniciall").text(d);

// var contFolio = "1"
// $("#folio").val()
$("#btnCamposDefinidos").on('click', function(){
	$("#camposDefinidos").show();
});
