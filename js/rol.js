

    /*combo secciones*/

function listar_roles(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlRoles.php",
        data:{accion:"Listar",},
        success:function(response){
            $("#listaRoles").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}

function mostrarRoles(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlRoles.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevoRol(){
    $.ajax({
        type: "POST",
       url:"../controlador/ctrlRoles.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function editarRol(id){
    $.ajax({
        type: "POST",
         url:"../controlador/ctrlRoles.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function agregarRol(){
   // alert('ok');
  
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlRoles.php",
        data:{accion:"Agregar",  nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_roles();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function modificarRol(id){
   // alert('ok');
 
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlRoles.php",
        data:{accion:"Modificar",id:id,  nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_roles();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function eliminarRol(id){
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlRoles.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_roles();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}
