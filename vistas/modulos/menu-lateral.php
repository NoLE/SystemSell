<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<?php 
          	if ($_SESSION['perfil'] == "Administrador") {

          		echo '
				<li>
					<a href="usuarios">
						<i class="fa fa-user"></i>
						<span>Usuarios</span>
					</a>
				</li>

          		';

          		} 


          	?>
			<!-- <li>
				<a href="categorias">
					<i class="fa fa-th"></i>
					<span>Categorias</span>
				</a>
			</li>
			<li>
				<a href="productos">
					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>
				</a>
			</li>-->
			<li>
				<a href="clientes">
					<i class="fa fa-user"></i>
					<span>Clientes</span>
				</a>
			</li> 
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list-ul"></i>
					<span>Ventas</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="ventas">
							<i class="fa fa-circle-o"></i>
							<span>Administrar Ventas</span>
						</a>
					</li>
					<?php 
					if ($_SESSION['perfil'] == "Administrador") {
						echo '
						<li style="padding-bottom: 5px;">
							<a href="reportes">
								<i class="fa fa-circle-o"></i>
								<span>Reportes de Ventas</span>
							</a>
						</li>';
					}
						
					 ?>
				</ul>
			</li>
			<li>
				<a href="exportar-excel">
					<i class="fa fa-file-excel-o"></i>
					<span>Exportar Excel</span>
				</a>
			</li>
		</ul>
	</section>
</aside>