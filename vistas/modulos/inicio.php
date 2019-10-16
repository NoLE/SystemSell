<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pagina de Inicio
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tablero</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Ventas</h3>

              <p>Administrador</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-albums"></i>
            </div>
            <a href="ventas" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php 
          if ($_SESSION['perfil'] == "Administrador") {
            echo '
              <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>Usuarios</h3>
                    <p>Administrador</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <a href="usuarios" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            ';
          }
         ?>
        
        <!-- ./col -->
      </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
