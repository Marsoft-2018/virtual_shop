
function listar_productos(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProductos.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaProductos").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}
function mostrarProductos(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProductos.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}


function nuevoProducto(){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlProductos.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    });
}

function cargarCategorias(idSeccion){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"listarDatos",idSeccion:idSeccion},
        success:function(response){
            response = JSON.parse(response);
            $("#categoria").html("");
            $.each(response,function(i,item){
				$("#categoria").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
			});
            console.log("Datos: "+response);
            //$("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function agregarProducto(){
    var imagen = $('#imagen').prop('files')[0];  
	var accion = "Agregar";
            
    var formulario = new FormData();    
    formulario.append('id', $('#id').val() );
    formulario.append('imagen',imagen);
    formulario.append('nombre',$("#nombre").val());    
    formulario.append('referencia',$("#referencia").val());
    formulario.append('descripcion',$("#descripcion").val());
    formulario.append('precioCompra',$("#precioCompra").val());
    formulario.append('precioVenta',$("#precioVenta").val());
    formulario.append('cantidadMinima',$("#cantidadMinima").val());
    formulario.append('categoria',$("#categoria").val());
    formulario.append('medida',$("#medida").val());

    $.ajax({
        type: 'POST',
        url: "../controlador/ctrlProductos.php?accion="+accion,
        data:  formulario,                        
        processData:false,
        cache:false,
        contentType: false,
        success: function(data){                
            //$("#datosProductos").html(data);
            console.log("respose: "+data);
        },
        error: function(data){
            console.log('Error: '+data);
        }
    }); 
}