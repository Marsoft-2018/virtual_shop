





function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}

    /*combo secciones*/



function listar_combo_seccion() {
    $.ajax({
        url:"controlador/inventario/controlador_combo_seccion_listar.php",
         type:'POST'
    }).done(function(resp){
        //alert(resp);
        var data = JSON.parse(resp);
        //console.log(resp);
        var cadena ="<option value=''>Seleccione...</option>";
        if(data.length>0) {
            for (var i = 0; i < data.length; i++) {
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            //$('#cmb_sede_ingreso_doc').html(cadena);
            //alert(idsede);
        } else {
            cadena+="<option value=''> No Hay datos</option>";
        }
        cadena +="<option value='Todos'>Todas</option>";
        $('#cmb_seccion').html(cadena);
         $('#cmb_seccion_agregar').html(cadena);
         $('#cmb_seccion_editar').html(cadena);
    })
}


var t_categorias;
function listar_categorias(){
 var id_seccion = document.getElementById('cmb_seccion').value;

     t_categorias = $("#tabla_categorias").DataTable({
	    "ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
      	"autoWidth": false,
      "ajax":{
        "method":"POST",
		    "url":"controlador/inventario/control_listar_categorias.php",
             data:{
                id_seccion:id_seccion    
            }
      },
      
      "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"seccion"},
           
            
             {
                "data": "estado",
                render: function(data, type, row) {
                    if (data == '1') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                }
            },
            {"data":"fechaRegistro"},

            {
                "data": "estado",
                render: function(data, type, row) {
                    if (data == '1') {
                        return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;&nbsp;&nbsp <button style='font-size:13px;' type='button' class='desactivar btn btn-danger' ><i class='fa fa-trash' disabled ></i></button>&nbsp;&nbsp;&nbsp;&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' disabled><i class='fa fa-check'></i></button>";
                    } else {
                        return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;&nbsp;&nbsp <button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled ><i class='fa fa-trash'  ></i></button>&nbsp;&nbsp;&nbsp;&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' ><i class='fa fa-check'></i></button>";
                    }
                }
            },
        
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        	$($(nRow).find("td")[1]).css('text-align', 'center' );
            $($(nRow).find("td")[4]).css('text-align', 'center' );
        },
        "language":idioma_espanol,
        select: true
	});
	t_categorias.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_categorias').DataTable().page.info();
        t_categorias.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
    // modificar datos usuario
    $('#tabla_categorias').on('click','.editar',function(){
        var data = t_categorias.row($(this).parents('tr')).data();
         if(t_categorias.row(this).child.isShown()){
                var data = t_categorias.row(this).data();
            }
        $("#modal_editar").modal({backdrop:'static',keyboard:false})
        $('#modal_editar').modal('show');
        $('#txt_idcategoria').val(data.id);
        $('#txt_categoria_actual').val(data.nombre);
        $('#txt_categoria_nuevo').val(data.nombre);
        $('#txt_descripcion_editar').val(data.descripcion);
        //$('#cmb_estatus').val(data.estatus).trigger("change");
        $('#cmb_seccion_editar').val(data.idSeccion).trigger("change");

    })
  
}



/*desactivar y activar categoria*/ 
 $('#tabla_categorias').on('click', '.activar', function() {
        var data = t_categorias.row($(this).parents('tr')).data();
        if (t_categorias.row(this).child.isShown()) {
            var data = t_categorias.row(this).data();
        }
        Swal.fire({
            title: 'Está seguro de activar  la categoria?',
            text: "Activacion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                Modificar_Estatus(data.id, '1');
            }
        })
    })
 // function activar usuario
    $('#tabla_categorias').on('click', '.desactivar', function() {
        var data = t_categorias.row($(this).parents('tr')).data();
        if (t_categorias.row(this).child.isShown()) {
            var data = t_categorias.row(this).data();
        }
        Swal.fire({
            title: 'Está seguro de desactivar la categoria?',
            text: "Una vez desactivado la categoria no podrá tener ingresos o ventas",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                Modificar_Estatus(data.id, '0');
            }
        })
    })

    function Modificar_Estatus(id, estatus) {
        var mensaje = "";
        if (estatus == 'INACTIVO') {
            mensaje = "desactivado";
        } else {
            mensaje = "activo";
        }
        $.ajax({
            url: "controlador/inventario/control_modificar_estatus_categoria.php",
            type: 'POST',
            data: {
                id: id,
                estatus: estatus,
            }
        }).done(function(resp) {
           //alert(resp);
            if (resp > 0) {
                Swal.fire("Mensaje  de confirmaciòn", "Seccion " + mensaje + " exitosamente",
                        "success")
                    .then((value) => {
                        //LimpiarRegistro();
                        t_categorias.ajax.reload();

                    });
            }

        })
    }






    function filterGlobal() {
        $('#tabla_categorias').DataTable().search(
            $('#global_filter').val(),
        ).draw();
    }






function Registrar_Categoria() {
     var idSeccion = $('#cmb_seccion_agregar').val();
      var categoria = $('#txt_categoria').val();
      var descripcion = $('#txt_descripcion').val();
      if(idSeccion.length==0 || categoria.length == 0) {
        return   Swal.fire( 'Mensaje de error',  'Digite los campos estan vacios', 'warning'
        );
      }
      $.ajax({
        url:'controlador/inventario/controlador_registro_categorias.php',
        type:'POST',
        data:{
          idSeccion:idSeccion,
          categoria:categoria,
          descripcion:descripcion
        }
      }).done(function(resp){
        alert(resp);
        if(resp > 0) {
            if(resp==1) {
                $('#modal_registro').modal('hide');
                Swal.fire("Mensaje  de confirmaciòn","Categorias registrado exitosamente",
                    "success")
                .then((value)=>{
                    listar_categorias();
               // LimpiarCampos();
                    t_categorias.ajax.reload();
                
                });
            } else {
               // LimpiarCampos();
                return Swal.fire('Mensaje de error', 'Categorias ya existe en el sistema, utilice otro', 'warning'
                  );
            }
        }else {
            return Swal.fire('Mensaje de error','Error','warning');
        }
      })
}


 function Modificar_Categoria() {
      var id = $('#txt_idcategoria').val();
      var idSeccion = $('#cmb_seccion_editar').val();
      var categoria_actual = $('#txt_categoria_actual').val();
      var categoria_nuevo = $('#txt_categoria_nuevo').val();
      var descripcion_categoria = $('#txt_descripcion_editar').val();
    

      if(categoria_nuevo.length == 0 ) {
        Swal.fire('Mensaje de error','Debe digitar los campos vacios','warning');
      }
      $.ajax({
        url:'controlador/inventario/controlador_modificar_categoria.php',
        type:'POST',
        data:{
          id:id,
          idSeccion:idSeccion,
          categoria_actual:categoria_actual,
          categoria_nuevo:categoria_nuevo,
          descripcion_categoria:descripcion_categoria
        }
      }).done(function(resp){
      alert(resp);
         if(resp > 0) {
            if(resp==1) {
                $('#modal_editar').modal('hide');
                Swal.fire("Mensaje  de confirmaciòn","Categoria editado exitosamente",
                    "success")
                .then((value)=>{
                    listar_categorias();
               // LimpiarCampos();
                    t_categorias.ajax.reload();
                
                });
            } else {
              //  LimpiarCampos();
                return Swal.fire('Mensaje de error', 'Categoria ya existe en el sistema, utilice otro', 'warning'
                  );
            }
        }else {
            return Swal.fire('Mensaje de error','Categoria no editado','warning');
        }
      })
    }
