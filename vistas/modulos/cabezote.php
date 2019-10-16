<header class="main-header">
	<!--==============================
	=            logotipo            =
	===============================-->
	
	<a href="inicio" class="logo">
		<!-- logo mini -->
		<span class="logo-mini">
			<img src="vistas/img/plantilla/icono-color.png" alt="" class="img-responsive" style="padding: 10px">
		</span>
		<!-- logo normal -->
		<span class="logo-lg">
			<img src="vistas/img/plantilla/logo-color-lineal.png" alt="" class="img-responsive">
		</span>
	</a>
	
	<!--====  End of logotipo  ====-->

	<!--=========================================
	=            barra de navegacion            =
	==========================================-->
	
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- BOTON DE NAVEGACION -->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        <span class="sr-only">Toggle navigation</span>
     	</a>
     	<!-- PERFIL DE USUARIO -->
     	<div class="navbar-custom-menu">
     		<ul class="nav navbar-nav">
     			<li class="dropdown user user-menu">
     				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
     					<?php if ($_SESSION["foto"] != "") {
     						echo'<img src="'.$_SESSION["foto"].'" alt="" class="user-image">';
     					}else {
     						echo '<img src="vistas/img/usuarios/default/anonymous.png" alt="" class="user-image">';
     					} ?>
     					
     					<span class="hidden-xs"><?php echo $_SESSION["nombre"];  ?></span>
     				</a>
     				<!-- DROPDOWN-TOGGLE -->
			     	<ul class="dropdown-menu">
			     		<li class="user-header">
			                <?php if ($_SESSION["foto"] != "") {
     							echo'<img src="'.$_SESSION["foto"].'" alt="" class="img-circle">';
		     					}else {
		     						echo '<img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-circle">';
		     					} ?>
			                <p>
			                  <span class="hidden-xs"><?php echo $_SESSION["nombre"];  ?></span>
			                  <small><?php echo $_SESSION["perfil"];  ?></small>
			                </p>
			              </li>
			     		<li class="user-body">
			                <div class="row">
			                  <div class="col-xs-12 text-center">
			                    <a href="#">Ventas</a>
			                  </div>
			                </div>
			                <!-- /.row -->
			              </li>
			              <!-- Menu Footer-->
			              <li class="user-footer">
			                <div class="pull-left">
			                  <a href="#" class="btn btn-default btn-flat">Profile</a>
			                </div>
			                <div class="pull-right">
			                  <a href="salir" class="btn btn-default btn-flat">Salir</a>
			                </div>
			              </li>
			     	</ul>
     			</li>
     		</ul>
     	</div>
     	
	</nav>
	
	<!--====  End of barra de navegacion  ====-->
	
	
</header>