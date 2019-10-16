<?php 
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVentas{

	/*=============================================
	EDITAR VENTA
	=============================================*/	

	public $idVenta;

	public function ajaxEditarVenta(){

		$item = "id";
		$valor = $this->idVenta;

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

		echo json_encode($respuesta);


	}

	/*=============================================
	MOSTRAR VENTA
	=============================================*/	

	public $idDetalleVenta;

	public function ajaxDetalleVenta(){

		$item = "id";
		$valor = $this->idDetalleVenta;

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

		echo json_encode($respuesta);


	}
	
}
/*=============================================
EDITAR VENTA
=============================================*/	

if(isset($_POST["idVenta"])){

	$venta = new AjaxVentas();
	$venta -> idVenta = $_POST["idVenta"];
	$venta -> ajaxEditarVenta();

}
/*=============================================
MOSTRAR VENTA
=============================================*/	

if(isset($_POST["idDetalleVenta"])){

	$detalleventa = new AjaxVentas();
	$detalleventa -> idDetalleVenta = $_POST["idDetalleVenta"];
	$detalleventa -> ajaxDetalleVenta();

}