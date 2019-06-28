<?php 
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
	/*======================================
	=            EDITAR USUARIO            =
	======================================*/
	
	public $idUsuario;
	public function ajaxEditarUsuario(){
		$item = "id";
		$valor = $this->idUsuario;
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
		echo json_encode($respuesta);
	}
	
	/*=====  End of EDITAR USUARIO  ======*/
	
}

if (isset($_POST["idUsuario"])) {
	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

