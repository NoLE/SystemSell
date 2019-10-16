<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear venta
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear venta</li>
    
    </ol>

  </section>
  <section class="content">
    <div class="row">
      <!--================================
        =            FORMULARIO            =
        =================================-->
      <div class="col-lg-5 col-xs-12">
        
         <div class="box box-success">
           <div class="box-header with-border">
             
           </div>
           <form role="form" method="post" class="formularioVenta">
           <div class="box-body">
             <form rol="form" method="post">
               <div class="box">

                <!--==========================================
                =            ENTRADA DEL VENDEDOR            =
                ===========================================-->
                 <div class="form-group">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                        <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"] ?>">
                      </div> 
                    </div>
                    <!--==========================================
                       =            ENTRADA DEL CLIENTE          =
                    ===========================================-->
                    <div class="col-xs-6">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                        <input type="text" class="form-control" id="nuevoCliente" name="nuevoCliente" placeholder="Nombre del Cliente">
                      </div> 
                    </div>
                  </div>   
                 </div>
                 <!--==========================================
                =            ENTRADA FECHA DE ENTREGA            =
                ===========================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                    <input type="text" class="form-control" id="nuevaFechaEntrega" name="nuevaFechaEntrega" placeholder="Fecha de Entrega" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                  </div>    
                 </div>

                 <!--==========================================
                =            ENTRADA DEL DIRECCION         =
                ===========================================-->
                <div class="form-group">
                     <div class="row">
                       <div class="col-xs-8">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" class="form-control" id="nuevaDireccion" name="nuevaDireccion" placeholder="Direccion">
                         </div> 
                       </div>
                       <div class="col-xs-4" style="padding-left: 0;">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            <input type="text" class="form-control" id="nuevaComuna" name="nuevaComuna" placeholder="Comuna">
                         </div> 
                       </div>
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
                    <textarea class="form-control" rows="3" placeholder="Referencia ..." name="nuevaReferencia"></textarea>
                  </div>    
                </div>
               </div>
           </div>
         </div>
      </div>
      <div class="col-lg-7 hidden-md-hidden-sm hidden-xs">
            <div class="box box-warning">
              <div class="box-header with-border"></div>
              <!--==========================================
                =            ENTRADA DE PRODUCTOS 1       =
                ===========================================-->
                <div style="padding: 10px">
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto1" name="nuevoProducto1" placeholder="Ingrese Producto 1">
                  </div>    
                </div>
                <!--==========================================
                =            ENTRADA DE PRODUCTOS  2      =
                ===========================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto2" name="nuevoProducto2" placeholder="Ingrese Producto 2">
                  </div>    
                </div>
                <!--==========================================
                =            ENTRADA DE PRODUCTOS  3      =
                ===========================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto3" name="nuevoProducto3" placeholder="Ingrese Producto 3">
                  </div>    
                </div>
                <!--==========================================
                =            ENTRADA DE VALOR      =
                ===========================================-->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" placeholder="Valor">
                      </div> 
                    </div>
                    <div class="col-xs-4">
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
                        <input type="textarea" class="form-control" id="nuevoEstadoComision" name="nuevoEstadoComision" placeholder="Estado de la Comisión">
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
                </div>
            </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
      <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>
    </div>
  </section>
</div>

