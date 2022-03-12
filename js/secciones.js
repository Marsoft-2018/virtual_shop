
var t_secciones 
function listar_secciones(){
     t_secciones = $("#tabla_secciones").DataTable({
        "ordering":false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 100,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"controlador/inventario/listar_secciones.php",
            type:'POST'
        },
        "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"estado",
            render: function (data, type, row ) {
                if(data=='1'){
                    return "<span class='label label-success'>"+data+"</span>";                   
                }else{
                  return "<span class='label label-danger'>"+data+"</span>";                 
                }
              }
            }, 
            {"data":"fecha_reg"},
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

        "language":idioma_espanol,
        select: true
    });
     t_secciones.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_secciones').DataTable().page.info();
        t_secciones.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

    document.getElementById("tabla_secciones_filter").style.display="none";

	      $('input.global_filter').on( 'keyup click', function () {
	        filterGlobal();
	    } );
	    $('input.column_filter').on( 'keyup click', function () {
	        filterColumn( $(this).parents('tr').attr('data-column') );
	    });

// modificar datos usuario
    $('#tabla_secciones').on('click','.editar',function(){
    	var data = t_secciones.row($(this).parents('tr')).data();
    	 if(t_secciones.row(this).child.isShown()){
		        var data = t_secciones.row(this).data();
		    }
    	$("#modal_editar").modal({backdrop:'static',keyboard:false})
		$('#modal_editar').modal('show');
		$('#txt_idseccion').val(data.id);
		$('#txt_nombre_actual_secciones').val(data.nombre);
		$('#txt_nombre_nuevo_secciones').val(data.nombre);
        $('#txt_desc_secciones_editar').val(data.descripcion);
		//$('#cmb_estatus').val(data.estatus).trigger("change");
		//$('#cmb_rol_editar').val(data.rol_id).trigger("change");

    })
}




    function filterGlobal() {
        $('#tabla_secciones').DataTable().search(
            $('#global_filter').val(),
        ).draw();
    }



function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}

/*desactivar y activar categoria*/ 
 $('#tabla_secciones').on('click', '.activar', function() {
        var data = t_secciones.row($(this).parents('tr')).data();
        if (t_secciones.row(this).child.isShown()) {
            var data = t_secciones.row(this).data();
        }
        Swal.fire({
            title: 'Está seguro de activar  la seccion?',
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
    $('#tabla_secciones').on('click', '.desactivar', function() {
        var data = t_secciones.row($(this).parents('tr')).data();
        if (t_secciones.row(this).child.isShown()) {
            var data = t_secciones.row(this).data();
        }
        Swal.fire({
            title: 'Está seguro de desactivar la seccion?',
            text: "Una vez desactivado la seccion no podrá tener ingresos o ventas",
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
            url: "controlador/inventario/control_modificar_estatus_seccion.php",
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
                        t_secciones.ajax.reload();

                    });
            }

        })
    }


function Registrar_Secciones() {
     var seccion = $('#txt_nombre_secciones').val();
     var descripcion = $('#txt_desc_secciones').val();
    
      if(seccion.length==0) {
        return   Swal.fire( 'Mensaje de error',  'Digite los campos estan vacios', 'warning'
        );
      }
      $.ajax({
        url:'controlador/inventario/controlador_registro_seccion.php',
        type:'POST',
        data:{
          seccion:seccion,
          descripcion:descripcion
        }
      }).done(function(resp){
        if(resp > 0) {
            if(resp==1) {
                $('#modal_registro').modal('hide');
                Swal.fire("Mensaje  de confirmaciòn","Seccion registrado exitosamente",
                    "success")
                .then((value)=>{
                    listar_secciones();
               // LimpiarCampos();
                    t_secciones.ajax.reload();
                
                });
            } else {
               // LimpiarCampos();
                return Swal.fire('Mensaje de error', 'Seccion ya existe en el sistema, utilice otro', 'warning'
                  );
            }
        }else {
            return Swal.fire('Mensaje de error','Seccion no insertado','warning');
        }
      })
}


 function Modificar_Secciones() {
      var id = $('#txt_idseccion').val();
      var seccion_actual = $('#txt_nombre_actual_secciones').val();
      var seccion_nuevo = $('#txt_nombre_nuevo_secciones').val();
      var descripcion_seccion = $('#txt_desc_secciones_editar').val();
    

      if(seccion_nuevo.length == 0 ) {
        Swal.fire('Mensaje de error','Debe digitar los campos vacios','warning');
      }
      $.ajax({
        url:'controlador/inventario/controlador_modificar_seccion.php',
        type:'POST',
        data:{
          id:id,
          seccion_actual:seccion_actual,
          seccion_nuevo:seccion_nuevo,
          descripcion_seccion:descripcion_seccion
        }
      }).done(function(resp){
       // alert(resp);
         if(resp > 0) {
            if(resp==1) {
                $('#modal_editar').modal('hide');
                Swal.fire("Mensaje  de confirmaciòn","Seccion editado exitosamente",
                    "success")
                .then((value)=>{
                    listar_secciones();
               // LimpiarCampos();
                    t_secciones.ajax.reload();
                
                });
            } else {
              //  LimpiarCampos();
                return Swal.fire('Mensaje de error', 'Seccion ya existe en el sistema, utilice otro', 'warning'
                  );
            }
        }else {
            return Swal.fire('Mensaje de error','Seccion no editado','warning');
        }
      })
    }




