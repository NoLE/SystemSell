/*====================================================
=            SUBIENDO LA FOTO DEL USUARIO            =
====================================================*/

$(".nuevaFoto").change(function() {
	var imagen = this.files[0];

	/*========================================================
	=            VALIDAR FORMATO IMAGEN JPG O PNG            =
	========================================================*/
	
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ) {
		$(".nuevaFoto").val("");
		swal({
			title: "Error al subir la imagen",
			text: "La imagen debe estar en formato JPG o PNG",
			type: "error",
			confirmButtonText: "Cerrar"
		});
	/*=====  End of VALIDAR FORMATO IMAGEN JPG O PNG  ======*/
	}else if (imagen["size"] > 2000000) {
		swal({
			title: "Error al subir la imagen",
			text: "La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "Cerrar"
		});
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;
			$(".previsualizar").attr("src", rutaImagen);
		})

	}
	
	
});

/*=====  End of SUBIENDO LA FOTO DEL USUARIO  ======*/

/*======================================
=            EDITAR USUARIO            =
======================================*/
$(".btnEditarUsuario").click(function() {
	var idUsuario = $(this).attr("idUsuario");
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);
	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType:false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
		}
		
	});
	
})


/*=====  End of EDITAR USUARIO  ======*/
