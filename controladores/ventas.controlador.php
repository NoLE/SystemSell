<?php 

class ControladorVentas{

	static public function ctrMostrarVentas($item, $valor){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
		return $respuesta;

	}
	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){
		if (isset($_POST['nuevaFechaEntrega'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\.\,\;\#\ ]+$/', $_POST["nuevaDireccion"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\.\,\;\#\ ]+$/', $_POST["nuevaComuna"]) &&
				preg_match('/^[0-9\(\)\-\ ]+$/', $_POST["nuevoTelefono"]) &&
				preg_match('/^[0-9\(\)\-\ ]+$/', $_POST["nuevoCelular"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto1"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto2"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto3"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["nuevoValor"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["nuevaComision"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["nuevaEstadoVenta"])) {
				
				$tabla = "ventas";
				$datos = array("fecha_entrega"=>date('Y-m-d', strtotime($_POST["nuevaFechaEntrega"])),
							   "id_vendedor"=>$_POST["idVendedor"],
							   "cliente"=>$_POST["nuevoCliente"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "comuna"=>$_POST["nuevaComuna"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "celular"=>$_POST["nuevoCelular"],
					           "referencia"=>$_POST["nuevaReferencia"],
					           "producto1"=>$_POST["nuevoProducto1"],
					       	   "producto2"=>$_POST["nuevoProducto2"],
					       	   "producto3"=>$_POST["nuevoProducto3"],
					       	   "valor"=>$_POST["nuevoValor"],
					       	   "comision"=>$_POST["nuevaComision"],
					       	   "estado_comision"=>$_POST["nuevoEstadoComision"],
					       	   "observacion"=>$_POST["nuevaObservacion"],
					       	   "estado_venta"=>$_POST["nuevoEstadoVenta"]
					       	);
				$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

				if ($respuesta == "ok") {
					echo'<script>

					swal({
						  type: "success",
						  title: "La venta ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ventas";

									}
								})

					</script>';
				}
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los Campos no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ventas";

							}
						})

			  	</script>';

			}
		}
	}
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function ctrEditarVenta(){
		if (isset($_POST['editarFechaEntrega'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\.\,\;\#\ ]+$/', $_POST["editarDireccion"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\.\,\;\#\ ]+$/', $_POST["editarComuna"]) &&
				preg_match('/^[0-9\(\)\-\ ]+$/', $_POST["editarTelefono"]) &&
				preg_match('/^[0-9\(\)\-\ ]+$/', $_POST["editarCelular"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProducto1"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProducto2"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProducto3"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["editarValor"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["editarComision"])) {
				
				$tabla = "ventas";
				$datos = array("fecha_entrega"=>date('Y-m-d', strtotime($_POST["editarFechaEntrega"])),
							   "id_vendedor"=>$_POST["idEditarVendedor"],
							   "cliente"=>$_POST["editarCliente"],
					           "direccion"=>$_POST["editarDireccion"],
					           "comuna"=>$_POST["editarComuna"],
					           "telefono"=>$_POST["editarTelefono"],
					           "celular"=>$_POST["editarCelular"],
					           "referencia"=>$_POST["editarReferencia"],
					           "producto1"=>$_POST["editarProducto1"],
					       	   "producto2"=>$_POST["editarProducto2"],
					       	   "producto3"=>$_POST["editarProducto3"],
					       	   "valor"=>$_POST["editarValor"],
					       	   "comision"=>$_POST["editarComision"],
					       	   "estado_comision"=>$_POST["editarEstadoComision"],
					       	   "observacion"=>$_POST["editarObservacion"],
					       	   "estado_venta"=>$_POST["editarEstadoVenta"],
					       	   "id"=>$_POST["idEditarVenta"]
					       	);
				$respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);

				if ($respuesta == "ok") {
					echo'<script>

					swal({
						  type: "success",
						  title: "La venta ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ventas";

									}
								})

					</script>';
				}
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los Campos no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ventas";

							}
						})

			  	</script>';

			}
		}
	}
	/*=============================================
	BORRAR VENTA
	=============================================*/

	static public function ctrEliminarVenta(){

		if(isset($_GET["idVenta"])){

			$tabla ="ventas";
			$datos = $_GET["idVenta"];

			$respuesta = ModeloVentas::mdlEliminarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La venta ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ventas";

									}
								})

					</script>';
			}
		}
		
	}

	/*===================================
	=            SUMAR DATOS            =
	===================================*/
	static public function ctrSumarVentas($campo){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlSumarCampos($tabla, $campo);
		return $respuesta;

	}
	static public function ctrSumarComision($campoComision){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlSumarCampos($tabla, $campoComision);
		return $respuesta;

	}
	
	
	
	/*=====  End of SUMAR DATOS  ======*/
	static public function ctrExportarVentas($item, $valor){
		$tabla1 = "ventas";
		/*$tabla2 = "usuarios";*/
		if (isset($_POST['consulFecha'])) {
			$item = $_POST['consulFecha'];
		}
		
		$respuesta = ModeloVentas::mdlExportarVentas($tabla1, $item, $valor);
		return $respuesta;

	}

}
	