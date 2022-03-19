

    /*combo secciones*/

function listar_unidades(){
   
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlUnidades.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaUnidades").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}

function mostrarUnidades(){
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlUnidades.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevaUnidad(){
    $.ajax({
        type: "POST",
          url:"../controlador/ctrlUnidades.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function editarUnidades(id){
    $.ajax({
        type: "POST",
          url:"../controlador/ctrlUnidades.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function agregarUnidad(){
   // alert('ok');
   
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
          url:"../controlador/ctrlUnidades.php",
        data:{accion:"Agregar",  nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_unidades();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function modificarUnidad(id){
   // alert('ok');
    
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlUnidades.php",
        data:{accion:"Modificar",id:id, nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_unidades();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function eliminarUnidades(id){
    $.ajax({
        type:"POST",
          url:"../controlador/ctrlUnidades.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_unidades();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}
