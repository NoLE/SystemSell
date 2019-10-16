<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes de Ventas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Reportes de Ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box-body">
          <div class="row">
          <div class="col-lg-4 col-xs-6">
                <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php 
                $campo = "valor";
                $valorVentas = ControladorVentas::ctrSumarVentas($campo);
                echo '<h3 class="claseTotalVentas" id="idTotalVentas">'.$valorVentas[0].'</h3>';
                 ?>
                <p>Total Ventas</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-6">
                <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php 
                    $campoComision = "comision";
                    $valorComision = ControladorVentas::ctrSumarComision($campoComision);
                      echo '<h3 class="claseTotalComision" id="idTotalComision">'.$valorComision[0].'</h3>';
                 ?>
                  <p>Total Comisiones</p>
              </div>
              <div class="icon">
                <i class="fa fa-usd"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-6">
                <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>20.000</h3>
                <?php 
                    setlocale(LC_TIME, "es_ES");

                   echo '<p>'.ucwords(strftime("%B")).', mes Actual</p>'; 
                 ?>
              </div>
              <div class="icon">
                <i class="fa fa-usd"></i>
              </div>
            </div>
          </div>
        </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->