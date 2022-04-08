
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
    var formData = new FormData();
    formData.append('accion','Agregar');
    formData.append('imagen',imagen);
    formData.append('id',$("#id").val());
    formData.append('nombre',$("#nombre").val());    
    formData.append('referencia',$("#referencia").val());
    formData.append('descripcion',$("#descripcion").val());
    formData.append('precioCompra',$("#precioCompra").val());
    formData.append('precioVenta',$("#precioVenta").val());
    formData.append('cantidadMinima',$("#cantidadMinima").val());
    formData.append('categoria',$("#categoria").val());
    formData.append('medida',$("#medida").val());

    $.ajax({
        type: "POST",
        url:"../controlador/ctrlProductos.php",
        data: formData,
        success: function(response){
            console.log("respose: "+response);
            return false;
        },
        error: function(err){
            console.log("El error es: "+err);
            return false;
        }
    });

}