<?php 

class ControladorVentas{

	/*static public function ctrMostrarVentas($item, $valor){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
		return $respuesta;

	}*/
	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){
		if (isset($_POST['nuevaFechaEntrega'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaComuna"]) &&
				preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
				preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCelular"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto1"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto2"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto3"]) &&
				preg_match('/^[1-9][0-9]+$/', $_POST["nuevoValor"]) &&
				preg_match('/^[0-9]+$/', $_POST["nuevaComision"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevoEstadoComision"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaReferencia"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"])) {
				
				$tabla = "ventas";
				$datos = array("id_vendedor"=>$_POST["idVendedor"],
							   "cliente"=>$_POST["nuevoCliente"],
					           "fecha_entrega"=>$_POST["nuevaFechaEntrega"],
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
					       	   "observacion"=>$_POST["nuevaObservacion"]
					       	);
				$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

				/*if ($respuesta == "ok") {
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
				}*/
			} /*else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los Campos no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "crear-venta";

							}
						})

			  	</script>';

			}*/
		}
	}
}
