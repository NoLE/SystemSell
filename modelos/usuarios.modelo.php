<?php 

require_once 'conexion.php';

class ModeloUsuarios{
	/*=========================================
	=            MOSTRAR USUARIIOS            =
	=========================================*/
	
	static public function mdlMostrarUsuarios($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
			$stmt -> execute();
			
			return $stmt -> fetch();
		}else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		
			$stmt -> execute();
		
			return $stmt -> fetchAll();
		}
		

		$stmt -> close();

		$stmt = null;
	}
	
	/*=====  End of MOSTRAR USUARIIOS  ======*/
	/*============================================
	=            REGISTRO DE USUARIOS            =
	============================================*/
	
	static public function mdlIngresarUsuario($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else {
			return "error";
		}
		$stmt->close();
		
		$stmt = null;
	}
	
	/*=====  End of REGISTRO DE USUARIOS  ======*/
	
}