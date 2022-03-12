
 

 <div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Empresa</h3>

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

                 
               
              </div>
             <table id="tabla_empresa" class="display responsive nowrap table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Nit</th>
                    <th>Dirección</th>
                    <th>Barrio</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Logo</th>
                    <th>Propietario</th>
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



 <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar datos Empresa </h4>
            </div>
            <div class="modal-body">
                <div class="row">

                
                <input type="text" id="txt_idempresa" hidden>
              <div class="col-lg-6">
                  <label for="">Nombre:</label>
                  <input type="text" id="txt_nombre" name="" class="form-control" placeholder="ROL"><br>
              </div>

              <div class="col-lg-6">
                  <label for="">NIT:</label>
                  <input type="text" id="txt_nit" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Dirección:</label>
                  <input type="text" id="txt_direccion" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Barrio:</label>
                  <input type="text" id="txt_barrio" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Ciudad:</label>
                  <input type="text" id="txt_ciudad" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Telefono:</label>
                  <input type="text" id="txt_telefono" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Correo:</label>
                  <input type="text" id="txt_correo" name="" class="form-control" placeholder="Descripcion"><br>
              </div>
              <div class="col-lg-12">
                  <label for="">Propietario:</label>
                  <input type="text" id="txt_propietario" name="" class="form-control" placeholder="Descripcion"><br>
              </div>

              <div class="col-lg-10">
                <label for="">Subir Imagen</label>
                <input type="file" id="imagen_editar" accept="imagen/*">
               </div><br>
              <div class="col-lg-2">
              <label for="">&nbsp;</label><br>
               <button class="btn btn-success" onclick="Editar_Foto()">Actualizar</button>
             </div>

             
              </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-warning" onclick="modificar_datos()">Modificar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
  </div>

 






<script type="text/javascript" src="js/empresa.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
           listar_empresa();

          //  $('.js-example-basic-single').select2();
          
              $("#modal_registro").on('shown.bs.modal',function(){
              $("#txt_nombre").focus();
              })
              
          } );


          document.getElementById("imagen_editar").addEventListener("change", () => {
            var fileName = document.getElementById("imagen_editar").value; 
            var idxDot = fileName.lastIndexOf(".") + 1; 
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
            if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 

            //TO DO 

            }else{ 

            Swal.fire("MENSAJE DE ADVERTENCIA","DEBE SELECCIONAR SOLO IMAGENES","warning");
            document.getElementById("imagen_editar").value="";
            } 
  });

    </script>