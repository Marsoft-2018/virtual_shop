
function listar_secciones(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaSecciones").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}
function mostrarSecciones(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevaSeccion(){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}


function agregarSeccion(){
   // alert('ok');
   
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Agregar",  nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_secciones();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function editarSeccion(id){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function modificarSeccion(id){
    alert('ok');
 
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlSecciones.php",
        data:{accion:"Modificar",id:id,  nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_secciones();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}



function eliminarSeccion(id){
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlSecciones.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_secciones();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}