
var t_empresa
function listar_empresa(){
    t_empresa = $("#tabla_empresa").DataTable({
        "ordering":false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 100,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"controlador/configuracion/listar_empresa.php",
            type:'POST'
        },
        "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"nombre"},
            {"data":"nit"},
            {"data":"direccion"},
            {"data":"barrio"},
            {"data":"ciudad"},
            {"data":"telefono"},
            {"data":"correo"},
            {"data":"logo",
            render: function (data, type, row ) {
            	 return '<img src="'+data+'" class="img-circle" style="width:28px">';
            	}
        	},
            {"data":"propietario"},
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
    t_empresa.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_empresa').DataTable().page.info();
        t_empresa.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

    document.getElementById("tabla_empresa_filter").style.display="none";

	      $('input.global_filter').on( 'keyup click', function () {
	        filterGlobal();
	    } );
	    $('input.column_filter').on( 'keyup click', function () {
	        filterColumn( $(this).parents('tr').attr('data-column') );
	    });

// modificar datos usuario
    $('#tabla_empresa').on('click','.editar',function(){
    	var data = t_empresa.row($(this).parents('tr')).data();
    	 if(t_empresa.row(this).child.isShown()){
		        var data = t_empresa.row(this).data();
		    }
    	$("#modal_editar").modal({backdrop:'static',keyboard:false})
		$('#modal_editar').modal('show');
		$('#txt_idempresa').val(data.id);
		$('#txt_nombre').val(data.nombre);
		$('#txt_nit').val(data.nit);
        $('#txt_direccion').val(data.direccion);
        $('#txt_barrio').val(data.barrio);
        $('#txt_ciudad').val(data.ciudad);
        $('#txt_telefono').val(data.telefono);
        $('#txt_correo').val(data.correo);
        $('#txt_propietario').val(data.propietario);
		//$('#cmb_estatus').val(data.estatus).trigger("change");
		//$('#cmb_rol_editar').val(data.rol_id).trigger("change");

    })
}




    function filterGlobal() {
        $('#tabla_empresa').DataTable().search(
            $('#global_filter').val(),
        ).draw();
    }



function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}

function Editar_Foto() {

	var idempresa =$('#txt_idempresa').val();
	var archivo = $('#imagen_editar').val();
	var f = new Date();
	var extension = archivo.split('.').pop();
	var nombrearchivo = "IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+
	f.getHours()+""+f.getMinutes()+""+f.getSeconds()+"."+extension;
 
	var formData = new FormData();
	var foto = $("#imagen_editar")[0].files[0];
	if(archivo.length==0) { 
		return Swal.fire('Mensaje de error','Debe seleccionar un archivo', 'warning'
		);
	}
	
	formData.append('idempresa',idempresa);
	formData.append('foto',foto);
	formData.append('nombrearchivo',nombrearchivo);

	$.ajax({
		url:'controlador/configuracion/controlador_empresa_editar_foto.php',
		type:'POST',
		data:formData,
		contentType:false,
		processData:false,
		success:function(resp){
			//alert(resp);
			if(resp!=0){
               if(resp==1){
                t_empresa.ajax.reload();
                $('#modal_registro').modal('hide');
                Swal.fire("Mensaje  de confirmaciòn","Foto Actualizada exitosamente","success");  
           		 } 
			}
		
		}

	});
	return false;
}

function modificar_datos() {
    var idempresa = $('#txt_idempresa').val();
	
	var nombre = $('#txt_nombre').val();
    var nit = $('#txt_nit').val();
    var direccion = $('#txt_direccion').val();
    var barrio = $('#txt_barrio').val();
    var ciudad = $('#txt_ciudad').val();
    var telefono = $('#txt_telefono').val();
    var correo = $('#txt_correo').val();
	var propietario = $('#txt_propietario').val();

	if(nombre.length ==0 || nit.length==0) { 
		return Swal.fire( 'Mensaje de error',  'Digite los campos estan vacios', 'warning'
		);
	}

	

	$.ajax({
		url:"controlador/configuracion/controlador_editar_empresa.php",
         type:'POST',
         data:{
            idempresa:idempresa,
         	nombre:nombre,
         	nit:nit,
             direccion:direccion,
             barrio:barrio,
             ciudad:ciudad,
             telefono:telefono,
             correo:correo,
             propietario:propietario
         }
	}).done(function(resp){
		//alert(resp);
		if(resp > 0) {
				$('#modal_editar').modal('hide');
				Swal.fire("Mensaje  de confirmaciòn","Empresa modificado exitosamente",
					"success")
				.then((value)=>{
				//	LimpiarRegistro();
					t_empresa.ajax.reload();
				//TraerDatosUsuario();
				});
			
		}else {
			return Swal.fire( 'Mensaje de error',  'Empresa no modificado', 'warning'
		);
		}
	})
}