<?php 

require_once "conexion.php";

class ModeloVentas{
	/*=============================================
	CREAR VENTAS
	=============================================*/
	static public function mdlIngresarVenta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_entrega, id_vendedor, cliente, direccion, comuna, referencia, producto_1, producto_2, producto_3, valor, observacion, comision, estado_comision, telefono, celular) VALUES (:fecha_entrega, :id_vendedor, :cliente, :direccion, :comuna, :referencia, :producto1, :producto2, :producto3, :valor, :observacion, :comision, :estado_comision, :telefono, :celular)");
		
			$stmt->bindParam(":fecha_entrega", $datos["fecha_entrega"], PDO::PARAM_STR);
			$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":comuna", $datos["comuna"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
			$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
			$stmt->bindParam(":producto1", $datos["producto1"], PDO::PARAM_STR);
			$stmt->bindParam(":producto2", $datos["producto2"], PDO::PARAM_STR);
			$stmt->bindParam(":producto3", $datos["producto3"], PDO::PARAM_STR);
			$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
			$stmt->bindParam(":comision", $datos["comision"], PDO::PARAM_STR);
			$stmt->bindParam(":estado_comision", $datos["estado_comision"], PDO::PARAM_STR);
			$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor){
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetch();

			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
				$stmt -> execute();
				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;
		}
}