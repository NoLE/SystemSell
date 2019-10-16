<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVenta">
            
            Agregar venta

          </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablasVentas tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha de Entrega</th>
           <th>Vendedor</th>
           <th>Cliente</th>
           <th>Dirección</th>
           <th>Producto 1</th>
           <th>Producto 2</th> 
           <th>Valor</th>
           <th>Direccíon</th>
           <?php 
            if ($_SESSION['perfil'] == "Administrador") {
              echo '<th>Estado Venta</th>';
            }

            ?>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>
          <?php 
            $item = null;
            $valor = null;
            $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
/*            var_dump($ventas);*/
            foreach ($ventas as $key => $value) {
              if ($value["id_vendedor"] == $_SESSION["id"] || $_SESSION['perfil'] == "Administrador" ) {
                echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.str_replace('-', '/', date('d-m-Y', strtotime($value["fecha_entrega"]))).'</td>
                      ';
                      $itemUsuario = "id";
                      $valorUsuario = $value["id_vendedor"];
                      $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                echo '<td>'.$respuestaUsuario["nombre"].'</td>
                      <td>'.$value["cliente"].'</td>
                      <td>'.$value["comuna"].'</td>
                      <td>'.$value["producto_1"].'</td>
                      <td>'.$value["producto_2"].'</td>
                      <td class="nuevoPrecioVenta">'.$value["valor"].'</td>
                      <td>'.$value["direccion"].'</td>'; 
                      if ($_SESSION['perfil'] == "Administrador") {
                        echo '<td>'.$value["estado_venta"].'</td>';
                      }
                echo '<td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnDetalleVenta" idDetalleVenta="'.$value["id"].'" data-toggle="modal" data-target="#modalDetalleVenta"><i class="fa fa-eye"></i></button>
                          <button class="btn btn-primary btnEditarVenta" data-toggle="modal" data-target="#modalEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                          '; 
                          if ($_SESSION['perfil'] == "Administrador") {
                            echo '<button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                          }
                          echo '
                        </div>
                      </td>
                    </tr>';
              }
              
            }
           ?> 
               
        </tbody>

       </table>

    <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();
    ?>
      </div>
    </div>
  </section>
  
 </div>
<!--=====================================
MODAL AGREGAR VENTA
======================================-->
<!-- Modal -->
<div class="modal fade" id="modalAgregarVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 70% !important">
    <div class="modal-content">
      <form rol="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h3 class="modal-title" id="exampleModalLabel">Agregar Venta</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA FECHA DE ENTREGA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                    <input type="text" class="form-control" id="nuevaFechaEntrega" name="nuevaFechaEntrega" placeholder="Fecha de Entrega" required>
                  </div>
                </div>
                <!-- ENTRADA ID Y NOMBRE VENDEDOR -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"] ?>">
                  </div>
                </div>
              </div>
              
            </div>
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA PARA EL CLIENTE -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                    <input type="text" class="form-control" id="nuevoCliente" name="nuevoCliente" placeholder="Nombre del Cliente" required>
                  </div>
                </div>
                <!-- ENTRADA PARA LA COMUNA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                    <input type="text" class="form-control" id="nuevaComuna" name="nuevaComuna" placeholder="Comuna" required>
                  </div>
                </div>
              </div>
            </div>
             <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" id="nuevaDireccion" name="nuevaDireccion" placeholder="Direccion" required>
              </div>
            </div>
            <!--==========================================
           =            ENTRADA DEL TELEFONO y CELULAR     =
            ===========================================-->
           <div class="form-group">
              <div class="row">
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" id="nuevoTelefono" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>
                </div>
               </div>
              <div class="col-xs-6">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                   <input type="text" class="form-control" id="nuevoCelular" name="nuevoCelular" placeholder="Celular" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>
                 </div>
               </div>
             </div>  
           </div>
           <!--==========================================
                =            ENTRADA DEL REFERENCIAS        =
                ===========================================-->
           <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-openid"></i></span>
                <textarea class="form-control" rows="2" placeholder="Referencia ..." name="nuevaReferencia" required></textarea>
              </div>    
            </div>
            <!--============================================
            =            ENTRADA PARA PRODUCTOS            =
            =============================================-->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto1" name="nuevoProducto1" placeholder="Ingrese Producto 1" required>
                  </div> 
                </div>
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto2" name="nuevoProducto2" placeholder="Ingrese Producto 2" required>
                  </div> 
                </div>
                <div class="col-xs-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto3" name="nuevoProducto3" placeholder="Ingrese Producto 3" required>
                  </div> 
                </div>
              </div>
            </div>
            <!--==========================================
                =            ENTRADA DE VALOR      =
                ===========================================-->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-3" style="padding-right: 0px;">
                      <div class="input-group">
                        <label>Valor Total</label>
                        <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" placeholder="Valor" required>
                      </div> 
                    </div>
                    <div class="col-xs-3" style="padding-right: 0px;">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE COMISION      =
                          ===========================================-->
                        <label>Valor Comisión</label>
                        <input type="textarea" class="form-control" id="nuevaComision" name="nuevaComision" placeholder="Comisión" required>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE ESTADO DE LA COMISIÓN      =
                          ===========================================-->
                        <?php 
                          if ($_SESSION['perfil'] == "Administrador") {
                            echo '
                            <label>Estado de la Comision</label>
                            <select class="form-control" name="nuevoEstadoComision">
                              <option value="En tramite">En tramite</option>
                              <option value="Pagada">Pagada</option>
                            </select>
                            ';
                          }else {
                            echo '
                            <label>Estado de la Comision</label>
                            <input type="text" class="form-control" name="nuevoEstadoComision" value="En tramite" readonly>                           
                            ';
                          }

                         ?>
                        
                      </div>
                    </div>
                    <!--========================================
                    =            ESTADO DE LA VENTA            =
                    =========================================-->
                    <div class="col-xs-3">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE ESTADO DE LA COMISIÓN      =
                          ===========================================-->
                        <?php 
                          if ($_SESSION['perfil'] == "Administrador") {
                            echo '
                            <label>Estado de la Venta</label>
                            <select class="form-control" name="nuevoEstadoVenta">
                              <option value="En transito">En transito</option>
                              <option value="Pagada">Pagada</option>
                              <option value="Rechazada">Rechazada</option>
                            </select>
                            ';
                          }else {
                            echo '
                            <label>Estado de la Venta</label>
                            <input type="text" class="form-control" name="nuevoEstadoVenta" value="En transito" readonly>                           
                            ';
                          }

                         ?>
                        
                      </div>
                    </div>
                    
                    
                    <!--====  End of ESTADO DE LA VENTA  ====-->
                    
                  </div>   
                </div>
          <!--==========================================
           =            ENTRADA DE OBSERVACION       =
          ===========================================-->
           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
              <textarea class="form-control" rows="4" placeholder="Observació ..." name="nuevaObservacion" required></textarea>
            </div>    
          </div>
         <!--======================================
        =            PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      <?php
        $crearVenta = new ControladorVentas();
        $crearVenta -> ctrCrearVenta();          
      ?>
    </div>
  </div>
</div>
</div>
</div>

<!--=====================================
MODAL EDITAR VENTA
======================================-->
<div class="modal fade" id="modalEditarVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 70% !important">
    <div class="modal-content">
      <form rol="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h3 class="modal-title" id="exampleModalLabel">Editar Venta</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA FECHA DE ENTREGA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="hidden" name="idEditarVenta" id="idEditarVenta">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                    <input type="text" class="form-control" id="editarFechaEntrega" name="editarFechaEntrega" required>
                  </div>
                </div>
                <!-- ENTRADA ID Y NOMBRE VENDEDOR -->
                <?php
                    /*$tablaUsuarios = "usuarios"
                    $objUsuario = "id";
                    $valueUsuario = $value["id_vendedor"];
                    $respUsuario = ControladorUsuarios::ctrMostrarUsuarios($objUsuario, $valueUsuario);*/
                ?>
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" id="nombreEditarVendedor" name="nombreEditarVendedor" class="form-control" readonly>
                    <input type="hidden" name="idEditarVendedor" id="idEditarVendedor">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA PARA EL CLIENTE -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                    <input type="text" class="form-control" id="editarCliente" name="editarCliente">
                  </div>
                </div>
                <!-- ENTRADA PARA LA COMUNA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                    <input type="text" class="form-control" id="editarComuna" name="editarComuna">
                  </div>
                </div>
              </div>
            </div>
             <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" id="editarDireccion" name="editarDireccion">
              </div>
            </div>
            <!--==========================================
           =            ENTRADA DEL TELEFONO y CELULAR     =
            ===========================================-->
           <div class="form-group">
              <div class="row">
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" id="editarTelefono" name="editarTelefono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>
                </div>
               </div>
              <div class="col-xs-6">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                   <input type="text" class="form-control" id="editarCelular" name="editarCelular" data-inputmask="'mask':'(999) 9999-9999'" data-mask>
                 </div>
               </div>
             </div>  
           </div>
           <!--==========================================
                =            ENTRADA DEL REFERENCIAS        =
                ===========================================-->
           <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-openid"></i></span>
                <textarea class="form-control" rows="2" name="editarReferencia" id="editarReferencia"></textarea>
              </div>    
            </div>
            <!--============================================
            =            ENTRADA PARA PRODUCTOS            =
            =============================================-->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="editarProducto1" name="editarProducto1">
                  </div> 
                </div>
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="editarProducto2" name="editarProducto2">
                  </div> 
                </div>
                <div class="col-xs-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="editarProducto3" name="editarProducto3">
                  </div> 
                </div>
              </div>
            </div>
            <!--==========================================
                =            ENTRADA DE VALOR      =
                ===========================================-->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-3" style="padding-right: 0px;">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="text" class="form-control" id="editarValor" name="editarValor">
                      </div> 
                    </div>
                    <div class="col-xs-3" style="padding-right: 0px;">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE COMISION      =
                          ===========================================-->
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <input type="textarea" class="form-control" id="editarComision" name="editarComision">
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE ESTADO DE LA COMISIÓN      =
                          ===========================================-->
                        <?php

            /*            var_dump($ventas);*/                    
                          if ($_SESSION['perfil'] == "Administrador") {
                            echo '
                            <label>Estado Comision</label>
                            <select class="form-control" name="editarEstadoComision">
                              <option id="editarEstadoComision"></option>
                              <option value="En tramite">En tramite</option>
                              <option value="Pagada">Pagada</option>
                            </select>
                            ';
                          }else {
                            echo '
                            <label>Estado de la Comision</label>
                            <input type="text" class="form-control" name="editarEstadoComision" readonly>                           
                            ';
                          }

                         ?>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="input-group">
                        <?php 
                          if ($_SESSION['perfil'] == "Administrador") {
                            echo '
                            <label>Estado de la Venta</label>
                            <select class="form-control" name="editarEstadoVenta">
                              <option id="editarEstadoVenta"></option>
                              <option value="En transito">En transito</option>
                              <option value="Pagada">Pagada</option>
                              <option value="Rechazada">Rechazada</option>
                            </select>
                            ';
                          }else {
                            echo '
                            <label>Estado de la Venta</label>
                            <input type="text" class="form-control" name="editarEstadoVenta" readonly>                           
                            ';
                          }

                         ?>
                      </div>
                    </div>
                  </div>   
                </div>
          <!--==========================================
           =            ENTRADA DE OBSERVACION       =
          ===========================================-->
           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
              <textarea class="form-control" rows="4" id="editarObservacion" name="editarObservacion"></textarea>
            </div>    
          </div>
         <!--======================================
        =            PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
      <?php
        $editarVenta = new ControladorVentas();
        $editarVenta -> ctrEditarVenta();          
      ?> 
    </div>
  </div>
</div>
</div>
</div>
<!--=====================================
MODAL MOSTRAR VENTA
======================================-->
<div class="modal fade" id="modalDetalleVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 70% !important">
    <div class="modal-content">
      <form rol="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h3 class="modal-title" id="exampleModalLabel">Detalle Venta</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA FECHA DE ENTREGA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="hidden" name="idDetalleVenta" id="idDetalleVenta">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                    <p class="form-control" id="detalleFechaEntrega" name="detalleFechaEntrega"></p>
                  </div>
                </div>
                <!-- ENTRADA ID Y NOMBRE VENDEDOR -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" id="nombreDetalleVendedor" class="form-control" readonly>
                    <input type="hidden" name="idDetalleVendedor" id="idDetalleVendedor">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <!-- ENTRADA PARA EL CLIENTE -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                    <p type="text" class="form-control" id="detalleCliente" name="detalleCliente"></p>
                  </div>
                </div>
                <!-- ENTRADA PARA LA COMUNA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                    <p type="text" class="form-control" id="detalleComuna" name="detalleComuna"></p>
                  </div>
                </div>
              </div>
            </div>
             <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <p class="form-control" id="detalleDireccion" name="detalleDireccion"></p>
              </div>
            </div>
            <!--==========================================
           =            ENTRADA DEL TELEFONO y CELULAR     =
            ===========================================-->
           <div class="form-group">
              <div class="row">
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <p class="form-control" id="detalleTelefono" name="detalleTelefono"></p>
                </div>
               </div>
              <div class="col-xs-6">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                   <p type="text" class="form-control" id="detalleCelular" name="detalleCelular"></p>
                 </div>
               </div>
             </div>  
           </div>
           <!--==========================================
                =            ENTRADA DEL REFERENCIAS        =
                ===========================================-->
             
          <span class="input-group-addon"><i class="fa fa-openid"> Referencia</i></span>
          <p name="detalleReferencia" id="detalleReferencia"></p>
                 
            <!--============================================
            =            ENTRADA PARA PRODUCTOS            =
            =============================================-->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <p class="form-control" id="detalleProducto1" name="detalleProducto1"></p>
                  </div> 
                </div>
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <p class="form-control" id="detalleProducto2" name="detalleProducto2"></p>
                  </div> 
                </div>
                <div class="col-xs-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <p class="form-control" id="detalleProducto3" name="detalleProducto3"></p>
                  </div> 
                </div>
              </div>
            </div>
            <!--==========================================
                =            ENTRADA DE VALOR      =
                ===========================================-->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-4" style="padding-right: 0px;">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <p class="form-control" id="detalleValor" name="detalleValor"></p>
                      </div> 
                    </div>
                    <div class="col-xs-4" style="padding-right: 0px;">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE COMISION      =
                          ===========================================-->
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <p class="form-control" id="detalleComision" name="detalleComision"></p>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE ESTADO DE LA COMISIÓN      =
                          ===========================================-->
                        <span class="input-group-addon"><i class="fa fa-thumbs-up"></i></span>
                        <p class="form-control" id="detalleEstadoComision"></p>
                      </div>
                    </div>
                  </div>   
                </div>
          <!--==========================================
           =            ENTRADA DE OBSERVACION       =
          ===========================================-->
          <span class="input-group-addon"><i class="fa fa-pencil-square-o">Observación</i></span>
          <p id="detalleObservacion" name="detalleObservacion"></p>
         <!--======================================
        =            PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </form>
    </div>
  </div>
 </div>
</div>
</div>
</div>
</div>
</div>


