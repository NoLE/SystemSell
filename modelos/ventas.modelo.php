<?php 

require_once "conexion.php";

class ModeloVentas{
	/*=============================================
	CREAR VENTAS
	=============================================*/
	static public function mdlIngresarVenta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_entrega, id_vendedor, cliente, direccion, comuna, referencia, producto_1, producto_2, producto_3, valor, observacion, comision, estado_comision, telefono, celular) VALUES (:fecha_entrega, :id_vendedor, :cliente, :direccion, :comuna, :referencia, :producto1, :producto2, :producto3, :valor, :observacion, :comision, :estado_comision, :estado_venta, :telefono, :celular)");
		
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
			$stmt->bindParam(":estado_comision", $datos["estado_venta"], PDO::PARAM_STR);
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
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha_entrega ASC");
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetch();

			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha_entrega ASC");
				$stmt -> execute();
				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;
		}
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  fecha_entrega = :fecha_entrega, id_vendedor = :id_vendedor, cliente = :cliente, direccion = :direccion, comuna = :comuna, referencia= :referencia, producto_1 = :producto1, producto_2 = :producto2, producto_3 = :producto3, valor = :valor, observacion = :observacion, comision = :comision, estado_comision = :estado_comision, estado_venta = :estado_venta, telefono = :telefono, celular = :celular   WHERE id = :id");

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
			$stmt->bindParam(":estado_venta", $datos["estado_venta"], PDO::PARAM_STR);
			$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
		}
			$stmt->close();
			$stmt = null;
	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR VENTAS
	=============================================*/

	static public function mdlSumarCampos($tabla, $campo){
			$stmt = Conexion::conectar()->prepare("SELECT SUM($campo) FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetch();
			
			$stmt -> close();

			$stmt = null;
		}
		/*=============================================
	EXPORTAR VENTAS
	=============================================*/

	static public function mdlExportarVentas($tabla1, $item, $valor){
			if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE $item = :$item ORDER BY fecha_entrega ASC");
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetch();

			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 ORDER BY fecha_entrega ASC");
				$stmt -> execute();
				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;
		}

}