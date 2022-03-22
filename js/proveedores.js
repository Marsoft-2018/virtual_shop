
function listar_proveedores(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProveedores.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaProveedores").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}
function mostrarProveedores(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProveedores.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}


function editarProveedor(id){
    $.ajax({
        type: "POST",
         url:"../controlador/ctrlProveedores.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}


function agregarProveedor(){
   // alert('ok');
   var id = $("#id").val();
    var nombre = $("#nombre").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var ciudad = $("#ciudad").val();
    var correo = $("#correo").val();
   
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlProveedores.php",
        data:{accion:"Agregar",id:id,  nombre:nombre, direccion:direccion, 
        telefono:telefono,ciudad:ciudad, correo:correo},
        success:function(response){
            console.log(response);   
            listar_proveedores();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevoProveedor(){
    $.ajax({
        type: "POST",
         url:"../controlador/ctrlProveedores.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function modificarProveedor(id){
    var nombre = $("#nombre").val();

    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var ciudad = $("#ciudad").val();
    var correo = $("#correo").val();

    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProveedores.php",
        data:{accion:"Modificar",id:id,  nombre:nombre, direccion:direccion,telefono:telefono,
                                ciudad:ciudad,correo:correo},
        success:function(response){
            console.log(response);   
            listar_proveedores();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}



function eliminarProveedor(id){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlProveedores.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_proveedores();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}