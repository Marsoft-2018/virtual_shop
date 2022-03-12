
var t_continentes
function listar_continentes(){
    t_continentes = $("#tabla_continentes").DataTable({
        "ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
      	"autoWidth": false,
        "ajax":{
            "url":"controlador/configuracion/listar_continentes.php",
            type:'POST'
        },
        "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"nombre"},
           
            {"data":"activo",
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
                "data": "activo",
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
    t_continentes.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_continentes').DataTable().page.info();
        t_continentes.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

    document.getElementById("tabla_continentes_filter").style.display="none";

	      $('input.global_filter').on( 'keyup click', function () {
	        filterGlobal();
	    } );
	    $('input.column_filter').on( 'keyup click', function () {
	        filterColumn( $(this).parents('tr').attr('data-column') );
	    });

// modificar datos usuario
    $('#tabla_continentes').on('click','.editar',function(){
    	var data = t_continentes.row($(this).parents('tr')).data();
    	 if(t_continentes.row(this).child.isShown()){
		        var data = t_continentes.row(this).data();
		    }
    	$("#modal_editar").modal({backdrop:'static',keyboard:false})
		$('#modal_editar').modal('show');
		$('#txt_idcontinente').val(data.id);
		$('#txt_nombre_editar').val(data.nombre);
	//	$('#txt_nombre_nuevo').val(data.nombre);
      //  $('#txt_desc_rol_editar').val(data.Descripcion);
		//$('#cmb_estatus').val(data.estatus).trigger("change");
		//$('#cmb_rol_editar').val(data.rol_id).trigger("change");

    })
}




    function filterGlobal() {
        $('#tabla_continentes').DataTable().search(
            $('#global_filter').val(),
        ).draw();
    }



function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}


/*desactivar y activar categoria*/ 
$('#tabla_continentes').on('click', '.activar', function() {
    var data = t_continentes.row($(this).parents('tr')).data();
    if (t_continentes.row(this).child.isShown()) {
        var data = t_continentes.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de activar  el continente?',
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
$('#tabla_continentes').on('click', '.desactivar', function() {
    var data = t_continentes.row($(this).parents('tr')).data();
    if (t_continentes.row(this).child.isShown()) {
        var data = t_continentes.row(this).data();
    }
    Swal.fire({
        title: 'Está seguro de desactivar el continente?',
        text: "Una vez desactivado el continente? afectara lo demas",
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
        url: "controlador/configuracion/control_modificar_estatus_continente.php",
        type: 'POST',
        data: {
            id: id,
            estatus: estatus,
        }
    }).done(function(resp) {
       //alert(resp);
        if (resp > 0) {
            Swal.fire("Mensaje  de confirmaciòn", "Continente " + mensaje + " exitosamente",
                    "success")
                .then((value) => {
                    //LimpiarRegistro();
                    t_continentes.ajax.reload();

                });
        }

    })
}
function Registrar_Continente() {
    var nombre = $('#txt_nombre').val();
  //  var descripcion = $('#txt_desc_secciones').val();
   
     if(nombre.length==0) {
       return   Swal.fire( 'Mensaje de error',  'Digite los campos estan vacios', 'warning'
       );
     }
     $.ajax({
       url:'controlador/configuracion/controlador_registro_configuracion.php',
       type:'POST',
       data:{
        nombre:nombre
       }
     }).done(function(resp){
       if(resp > 0) {
           if(resp==1) {
               $('#modal_registro').modal('hide');
               Swal.fire("Mensaje  de confirmaciòn","Continente registrado exitosamente",
                   "success")
               .then((value)=>{
                   listar_continentes();
              // LimpiarCampos();
                   t_continentes.ajax.reload();
               
               });
           } else {
              // LimpiarCampos();
               return Swal.fire('Mensaje de error', 'Continente ya existe en el sistema, utilice otro', 'warning'
                 );
           }
       }else {
           return Swal.fire('Mensaje de error','Continente no insertado','warning');
       }
     })
}

function Modificar_Continente() {
    var idcontinente = $('#txt_idcontinente').val();
	
	var nombre = $('#txt_nombre_editar').val();
    

	if(nombre.length ==0 ) { 
		return Swal.fire( 'Mensaje de error',  'Digite los campos estan vacios', 'warning'
		);
	}

	

	$.ajax({
		url:"controlador/configuracion/controlador_modificar_continente.php",
         type:'POST',
         data:{
            idcontinente:idcontinente,
         	nombre:nombre
         	
         }
	}).done(function(resp){
		//alert(resp);
		if(resp > 0) {
				$('#modal_editar').modal('hide');
				Swal.fire("Mensaje  de confirmaciòn","continente modificado exitosamente",
					"success")
				.then((value)=>{
				//	LimpiarRegistro();
					t_continentes.ajax.reload();
				//TraerDatosUsuario();
				});
			
		}else {
			return Swal.fire( 'Mensaje de error',  'continente no modificado', 'warning'
		);
		}
	})
}