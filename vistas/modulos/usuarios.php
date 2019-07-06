<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $item = null;
                  $valor = null;
                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                  foreach ($usuarios as $key => $value) {
                    echo '
                      <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>
                        ';
                        if ($value["foto"] != "" ) {
                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }else {
                          echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        }
                        echo '
                        <td>'.$value["perfil"].'</td>';
                        if ($value["estado"] != 0) {
                          echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0" >Activado</button></td>';
                        }else {
                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1" >Desactivado</button></td>';
                        }
                        echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                          <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>
                        </td>
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

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->
<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form rol="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h3 class="modal-title" id="exampleModalLabel">Agregar Usuario</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nuevoNombre" placeholder="Ingresar Nombre" class="form-control input-lg" required>
              </div>
            </div>
             <!-- ENTRADA PARA EL USUARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar Usuario" class="form-control input-lg" required>
              </div>
            </div>
             <!-- ENTRADA PARA LA CONTRASEÑA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="nuevoPassword" placeholder="Nueva Contraseña" class="form-control input-lg" required>
              </div>
            </div>
            <!-- ENTRADA PARA SELECCIONAR PERFIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoPerfil">
                  <option value="">Selecionar perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>
            <!-- ENTRADA PARA SUBIR FOTO -->
            <div class="form-group">
              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto" >
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >
            </div>
          </div>
        </div>
         <!--======================================
        =            PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<!-- Modal -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form rol="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h3 class="modal-title" id="exampleModalLabel">Editar Usuario</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="editarNombre" id="editarNombre" value="" class="form-control input-lg" required>
              </div>
            </div>
             <!-- ENTRADA PARA EL USUARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" name="editarUsuario" id="editarUsuario" placeholder="Editar Usuario" class="form-control input-lg" readonly>
              </div>
            </div>
             <!-- ENTRADA PARA LA CONTRASEÑA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="editarPassword" placeholder="Cambiar Contraseña" class="form-control input-lg">
                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>
            <!-- ENTRADA PARA SELECCIONAR PERFIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarPerfil">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>
            <!-- ENTRADA PARA SUBIR FOTO -->
            <div class="form-group">
              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="editarFoto" >
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >
              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>
          </div>
        </div>
         <!--======================================
        =            PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        <?php 
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrEditarUsuario();
         ?>
      </form>
    </div>
  </div>
</div>
<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 