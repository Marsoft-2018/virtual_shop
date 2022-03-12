
 

 <div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Secciones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <div class="col-lg-10">
                  <div class="input-group">
                   <input type="text" class="global_filter form-control" id="global_filter" placeholder="Buscar  ">
                   <span class="input-group-addon"><i class="fa fa-search"></i></span>
                 </div> <br><br>
                </div>

                 <div class="col-lg-2"> 
                   <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalRegistro()"><i class="fa fa-plus">Nuevo Registro</i></button>
                </div>
               
              </div>
             <table id="tabla_secciones" class="display responsive nowrap table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha registro</th>
                    <th>Acci&oacute;n</th>
                  </tr>
                </thead>
              
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>



 <div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Registro de Secciones </h4>
            </div>
            <div class="modal-body">
              <div class="col-lg-12">
                  <label for="">Nombre Sección:</label>
                  <input type="text" id="txt_nombre_secciones" name="" class="form-control" placeholder="Secciones"><br>
              </div>

              <div class="col-lg-12">
                  <label for="">Descripcion:</label>
                  <input type="text" id="txt_desc_secciones" name="" class="form-control" placeholder="Descripcion"><br>
              </div>

            
             
            </div>
            <div class="modal-footer">
            <button class="btn btn-primary" onclick="Registrar_Secciones()">Registrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
  </div>



 <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edición de Secciones </h4>
            </div>
            <div class="modal-body">
              <div class="col-lg-12">
              	<input type="text" id="txt_idseccion" hidden>
                  <label for="">Nombre Sección:</label>
                  <input type="text" id="txt_nombre_actual_secciones" name="" hidden placeholder="Secciones"><br>
                  <input type="text" id="txt_nombre_nuevo_secciones" name="" class="form-control" placeholder="Secciones"><br>
              </div>

              <div class="col-lg-12">
                  <label for="">Descripcion:</label>
                  <input type="text" id="txt_desc_secciones_editar" name="" class="form-control" placeholder="Descripcion"><br>
              </div>

            
             
            </div>
            <div class="modal-footer">
            <button class="btn btn-warning" onclick="Modificar_Secciones()">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
  </div>








<script type="text/javascript" src="js/secciones.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            listar_secciones();

          //  $('.js-example-basic-single').select2();
          
              $("#modal_registro").on('shown.bs.modal',function(){
              $("#txt_nombre").focus();
              })
          } );

    

    </script>