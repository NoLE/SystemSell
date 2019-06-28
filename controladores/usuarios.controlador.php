<?php 

/**
 * summary
 */
class ControladorUsuarios
{
  /*===========================================
  =            ingreso de Usuarios            =
  ===========================================*/
  
  static public function ctrIngresoUsuario(){
  	if (isset($_POST["ingUsuario"])) {
  		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
  			preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

        $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

  			$tabla = "usuarios";
  			$item = "usuario";
  			$valor = $_POST["ingUsuario"];

  			$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

  			if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

  				$_SESSION["iniciarSesion"] = "ok";
          $_SESSION["id"] = $respuesta["id"];
          $_SESSION["nombre"] = $respuesta["nombre"];
          $_SESSION["usuario"] = $respuesta["usuario"];
          $_SESSION["foto"] = $respuesta["foto"];
          $_SESSION["perfil"] = $respuesta["perfil"];

					echo '<script>
						window.location = "inicio";
					</script>';
  				
  			}else{
  				echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
  			}
  			
  		}
  	}
  }
  
  /*=====  End of ingreso de Usuarios  ======*/
  /*============================================
  =            REGISTRO DE USUARIOS            =
  ============================================*/
  static public function ctrCrearUsuario(){
    if (isset($_POST["nuevoUsuario"])) {
      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
         preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
         preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

          /*====================================
          =            VALIDAR FOTO            =
          ====================================*/
          $ruta = "";
          if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
            list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
            $nuevoAncho = 500;
            $nuevoAlto = 500;
            /*===========================================================================
            =            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO            =
            ===========================================================================*/
            
            $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
            mkdir($directorio, 0755);

            /*===============================================================================================
            =            DE ACUERDO EL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP            =
            ===============================================================================================*/
            
            if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
              /*============================================================
              =            GUARDAMOS LA IMAGEN EN EL DIRECTORIO            =
              ============================================================*/
              $aleatorio = mt_rand(100,999);
              $ruta = "vistas/img/usuarios/".$_POST['nuevoUsuario']."/".$aleatorio.".jpg";

              $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagejpeg($destino, $ruta);
              
              /*=====  End of GUARDAMOS LA IMAGEN EN EL DIRECTORIO  ======*/
              
            }
            if ($_FILES["nuevaFoto"]["type"] == "image/png") {
              /*============================================================
              =            GUARDAMOS LA IMAGEN EN EL DIRECTORIO            =
              ============================================================*/
              $aleatorio = mt_rand(100,999);
              $ruta = "vistas/img/usuarios/".$_POST['nuevoUsuario']."/".$aleatorio.".png";

              $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagepng($destino, $ruta);
              
              /*=====  End of GUARDAMOS LA IMAGEN EN EL DIRECTORIO  ======*/
              
            }
            
            /*=====  End of DE ACUERDO EL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP  ======*/
            
          }
          
          
          /*=====  End of VALIDAR FOTO  ======*/

          $tabla = "usuarios";

          $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

          $datos = array("nombre" => $_POST["nuevoNombre"],
                         "usuario" => $_POST["nuevoUsuario"],
                         "password" => $encriptar,
                         "perfil" => $_POST["nuevoPerfil"],
                         "foto" => $ruta);
          $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

          if ($respuesta == "ok") {
                echo '<script>
                swal({
                  type: "success",
                  title: "¡El usuario ha sido guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                }).then(function(result){
                    if(result.value){
                      window.location = "usuarios";
                    }
                  });
             </script>';
          }

      }else{
        echo '<script>
          swal({
            type: "error",
            title: "¡El usuario no puede ir vacío o llevar caracteres especiales",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then(function(result){
              if(result.value){
                window.location = "usuarios";
              }
            });
        </script>'; 
      }
    }
  }
  
  
  /*=====  End of REGISTRO DE USUARIOS  ======*/

  /*========================================
  =            MOSTRAR USUARIOS            =
  ========================================*/
    static public function ctrMostrarUsuarios($item, $valor){

      $tabla = "usuarios";
      $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

      return $respuesta;
    }
  
  /*=====  End of MOSTRAR USUARIOS  ======*/
  
  
}