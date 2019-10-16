<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Exportar Excel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Exportar Excel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="col-sm-4 col-sm-offset-4">
		<form action="" class="form-signin" method="POST">
      	<div class="form-group">
      		<input type="text" class="form-control" name="fechaExport" id="exportarExcel" placeholder="Seleccione Fecha">
      	</div>
      	<input type="submit" class="btn btn-success btn-block" value="Consultar Fecha" name="consulFecha">
      </form>
      
      <?php 
      	/*$Exportar = new ControladorVentas();
        $exportar = ControladorVentas::ctrExportarVenta();*/
       ?>
	</div> 	

    </section>
    <!-- /.content -->
    <section>
      <div class="content">
        <h2>Previa</h2>
        <div class="table-responsive">
          <div class="top-panel">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-lg dropdown-toggle dataExport" data-type="excel">Exportar</button>
              
            </div>
          </div>
            <table id="dataTable" class="table table-bordered table-striped dt-responsive" style="font-size: 10px;">
               <thead>
                <tr>
                   <th>Fecha de Entrega</th>
                   <th>Vendedor</th>
                   <th>Cliente</th>
                   <th>Direccíon</th>
                   <th>Comuna</th>
                   <th>Referencia</th>
                   <th>Producto 1</th>
                   <th>Producto 2</th>
                   <th>Producto 3</th>
                   <th>Valor</th>
                   <th>Observación</th>
                   <th>Comisión</th>
                   <th>Estado de la Comisión</th>
                   <th>Teléfono</th>
                   <th>Celular</th>
                   <th>Estado de la Venta</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $item = null;
                    $valor = null;
                    $exportar = ControladorVentas::ctrExportarVentas($item, $valor);
                    foreach ($exportar as $key => $value) {
                      echo '
                          <tr>
                          <td>'.str_replace('-', '/', date('d-m-Y', strtotime($value["fecha_entrega"]))).'</td>';
                          $itemUsuario = "id";
                          $valorUsuario = $value["id_vendedor"];
                          $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                    echo '<td>'.$respuestaUsuario["nombre"].'</td>
                          <td>'.$value["cliente"].'</td>
                          <td>'.$value["direccion"].'</td>
                          <td>'.$value["comuna"].'</td>
                          <td>'.$value["referencia"].'</td>
                          <td>'.$value["producto_1"].'</td>
                          <td>'.$value["producto_2"].'</td>
                          <td>'.$value["producto_3"].'</td>
                          <td>'.$value["valor"].'</td>
                          <td>'.$value["observacion"].'</td>
                          <td>'.$value["comision"].'</td>
                          <td>'.$value["estado_comision"].'</td>
                          <td>'.$value["telefono"].'</td>
                          <td>'.$value["celular"].'</td>
                          <td>'.$value["estado_venta"].'</td>
                          </tr>
                      ';
                    }
                 ?>
              </tbody>
        </table>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->