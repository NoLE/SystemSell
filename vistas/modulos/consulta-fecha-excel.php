<?php 
require_once "../../modelos/conexion.php";

$fecha = $_POST["fechaExport"];

if (isset($_POST["generarExcel"])) {
	header('Content-Type:text/csv; charset-latin1');
	header('Content-Disposition: attachment; filename="Reporte_Fecha.csv"');

	$salida = fopen('php://output', 'w');

	fputcsv($salida, array("Fecha de Entrega", "Vendedor", "Cliente","Teléfono", "Celular", "Direccion", "Comuna", "Referencia", "Producto 1", "Producto 2", 
			"Producto 3", "Valor", "Observación", "Comisión", "Estado de la Comision", "Estado de la Venta"));

	$reporteCSV=$conexion->query("SELECT * FROM ventas where fecha_entrega = $fecha");
	while ($filaR = $reporteCSV->fetch_assoc()) {
	    fputcsv($salida, array(	$filaR['fecha_entrega'],
								$filaR['vendedor'],
								$filaR['cliente'],
								$filaR['telefono'],
								$filaR['celular'],
								$filaR['direccion'],
								$filaR['comuna'],
								$filaR['referencia'],
								$filaR['producto_1'],
								$filaR['producto_2'],
								$filaR['producto_3'],
								$filaR['valor'],
								$filaR['observacion'],
								$filaR['comision'],
								$filaR['estado_comision'],
								$filaR['estado_venta']));
	}
}