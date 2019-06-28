<div class="login-box">
  <div class="login-logo">
    <img src="vistas/img/plantilla/logo-color-lineal.png" style="width: 90%" class="img-responsive">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al Sistema</p>

    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <?php 
      	$login = new ControladorUsuarios();
      	$login -> ctrIngresoUsuario();
       ?>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->