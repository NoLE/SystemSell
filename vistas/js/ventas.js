/*====================================
=            EDITAR VENTA            =
====================================*/
$(".tablasVentas").on("click", ".btnEditarVenta", function(){
	var idVenta = $(this).attr("idVenta");
	var datos = new FormData();
		datos.append("idVenta", idVenta);

	$.ajax({

      url:"ajax/ventas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	/*para que aparesca el usuario se debe llamar al archivo usuarios.ajax.php*/
		var datosUsuario = new FormData();
		datosUsuario.append("idUsuario", respuesta["id_vendedor"]);
		$.ajax({
			url: "ajax/usuarios.ajax.php",
			method: "POST",
			data: datosUsuario,
			cache: false,
			contentType:false,
			processData: false,
			dataType: "json",
			success: function(respuesta){
				/*console.log("respuesta", respuesta);*/
				$("#nombreEditarVendedor").val(respuesta["nombre"]);
			}
				
		});


      		/*console.log("respuesta", respuesta);*/
      		$("#idEditarVenta").val(respuesta["id"]);
      	   $("#editarFechaEntrega").val($.format.date(respuesta["fecha_entrega"], "dd-MM-yyyy"));
      	   /*$("#nombreVendedor").val(respuesta["fecha_entrega"]);*/
      	   $("#idEditarVendedor").val(respuesta["id_vendedor"]);
	       $("#editarCliente").val(respuesta["cliente"]);
	       $("#editarComuna").val(respuesta["comuna"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarCelular").val(respuesta["celular"]);
           $("#editarReferencia").val(respuesta["referencia"]);
           $("#editarProducto1").val(respuesta["producto_1"]);
           $("#editarProducto2").val(respuesta["producto_2"]);
           $("#editarProducto3").val(respuesta["producto_3"]);
           $("#editarValor").val(respuesta["valor"]);
           $("#editarComision").val(respuesta["comision"]);
           $("#editarEstadoComision").html(respuesta["estado_comision"]);
           $("#editarEstadoComision").val(respuesta["estado_comision"]);
           $("#editarEstadoVenta").html(respuesta["estado_venta"]);
           $("#editarEstadoVenta").val(respuesta["estado_venta"]);
           $("#editarObservacion").val(respuesta["observacion"]);
	       
	  }

  	})
})



/*=====================================
=            DETALLE VENTA            =
=====================================*/
$(".tablasVentas").on("click", ".btnDetalleVenta", function(){
	var idDetalleVenta = $(this).attr("idDetalleVenta");
	var datosVenta = new FormData();
		datosVenta.append("idDetalleVenta", idDetalleVenta);

	$.ajax({

      url:"ajax/ventas.ajax.php",
      method: "POST",
      data: datosVenta,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	/*para que aparesca el usuario se debe llamar al archivo usuarios.ajax.php*/
		var datosUsuario = new FormData();
		datosUsuario.append("idUsuario", respuesta["id_vendedor"]);
		$.ajax({
			url: "ajax/usuarios.ajax.php",
			method: "POST",
			data: datosUsuario,
			cache: false,
			contentType:false,
			processData: false,
			dataType: "json",
			success: function(respuesta){
				/*console.log("respuesta", respuesta);*/
				$("#nombreDetalleVendedor").val(respuesta["nombre"]);
			}
				
		});


      		/*console.log("respuesta", respuesta);*/
      		$("#idDetalleVenta").val(respuesta["id"]);
      	   $("#detalleFechaEntrega").html(respuesta["fecha_entrega"]);
      	   /*$("#nombreVendedor").val(respuesta["fecha_entrega"]);*/
      	   $("#idDetalleVendedor").val(respuesta["id_vendedor"]);
	       $("#detalleCliente").html(respuesta["cliente"]);
	       $("#detalleComuna").html(respuesta["comuna"]);
	       $("#detalleDireccion").html(respuesta["direccion"]);
	       $("#detalleTelefono").html(respuesta["telefono"]);
	       $("#detalleCelular").html(respuesta["celular"]);
           $("#detalleReferencia").html(respuesta["referencia"]);
           $("#detalleProducto1").html(respuesta["producto_1"]);
           $("#detalleProducto2").html(respuesta["producto_2"]);
           $("#detalleProducto3").html(respuesta["producto_3"]);
           $("#detalleValor").html(respuesta["valor"]);
           $("#detalleComision").html(respuesta["comision"]);
           $("#detalleEstadoComision").html(respuesta["estado_comision"]);
           $("#detalleEstadoComision").val(respuesta["estado_comision"]);
           $("#detalleEstadoVenta").html(respuesta["estado_venta"]);
           $("#detalleEstadoVenta").val(respuesta["estado_venta"]);
           $("#detalleObservacion").html(respuesta["observacion"]);
	       
	  }

  	})
})


/*=====  End of DETALLE VENTA  ======*/

/*======================================
=            ELIMINAR VENTA            =
======================================*/

$(".tablasVentas").on("click", ".btnEliminarVenta", function(){

	 var idVenta = $(this).attr("idVenta");

	 swal({
	 	title: '¿Está seguro de borrar la Venta?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ventas&idVenta="+idVenta;

	 	}

	 })

})

/*====================================
=            COVERTIR SUMAR VENTA VENTAS            =
====================================*/

// we used jQuery 'keyup' to trigger the computation as the user type
$(document).ready(function() {
 	function addCommas(nStr){
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
	return x1 + x2;
	}
	var idTotalVentas = $(".claseTotalVentas").text();
	$('#idTotalVentas').text(addCommas(idTotalVentas));
	var idTotalComision = $(".claseTotalComision").text();
	$('#idTotalComision').text(addCommas(idTotalComision));
    // initialize the sum (total price) to zero
    //var sum = 0;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    /*$('.nuevoPrecioVenta').each(function() {
        sum += Number($(this).text());
    });*/
     
    // set the computed value to 'totalPrice' textbox
    /*
     
*/});

/*====================================
=            SUMAR VENTAS         =
====================================*/

