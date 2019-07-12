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
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha de Entrega</th>
           <th>Vendedor</th>
           <th>Cliente</th>
           <th>Direccíon</th>
           <th>Comuna</th>
           <th>Telefono</th>
           <th>Celular</th> 
           <th>Valor</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>2019-7-7</td>
            <td>Juan Villegas</td>
            <td>Pedrito Sanchez</td>
            <td>Avenida Portal San Pedro 7100, Depto 303, Torre 7</td>
            <td>Santiago</td>
            <td>25222525 </td>
            <td>988858038</td>
            <td>25000</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning"><i class="fa fa-eye"></i></button>
                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
              </div>
            </td>
          </tr>
          
               
        </tbody>

       </table>

       <?php

      /*$eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();*/

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
                    <input type="text" class="form-control" id="nuevaFechaEntrega" name="nuevaFechaEntrega" placeholder="Fecha de Entrega" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
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
                    <input type="text" class="form-control" id="nuevoCliente" name="nuevoCliente" placeholder="Nombre del Cliente">
                  </div>
                </div>
                <!-- ENTRADA PARA LA COMUNA -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                    <input type="text" class="form-control" id="nuevaComuna" name="nuevaComuna" placeholder="Comuna">
                  </div>
                </div>
              </div>
            </div>
             <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" id="nuevaDireccion" name="nuevaDireccion" placeholder="Direccion">
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
                   <input type="text" class="form-control" id="nuevoCelular" name="nuevoCelular" placeholder="Celular" data-inputmask="'mask':'(999) 9999-9999'" data-mask>
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
                <textarea class="form-control" rows="2" placeholder="Referencia ..." name="nuevaReferencia"></textarea>
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
                    <input type="text" class="form-control" id="nuevoProducto1" name="nuevoProducto1" placeholder="Ingrese Producto 1">
                  </div> 
                </div>
                <div class="col-xs-4" style="padding-right: 0px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto2" name="nuevoProducto2" placeholder="Ingrese Producto 2">
                  </div> 
                </div>
                <div class="col-xs-4">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto3" name="nuevoProducto3" placeholder="Ingrese Producto 3">
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
                        <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" placeholder="Valor">
                      </div> 
                    </div>
                    <div class="col-xs-4" style="padding-right: 0px;">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE COMISION      =
                          ===========================================-->
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <input type="textarea" class="form-control" id="nuevaComision" name="nuevaComision" placeholder="Comisión">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="input-group">
                         <!--==========================================
                          =            ENTRADA DE ESTADO DE LA COMISIÓN      =
                          ===========================================-->
                        <span class="input-group-addon"><i class="fa fa-thumbs-up"></i></span>
                        <select class="form-control" name="nuevoEstadoComision">
                          <option value="En tramite">En tramite</option>
                          <option value="Pagada">Pagada</option>
                        </select>
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
              <textarea class="form-control" rows="4" placeholder="Observació ..." name="nuevaObservacion"></textarea>
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



