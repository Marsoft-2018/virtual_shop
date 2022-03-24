
function listar_continentes(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlContinentes.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaContinentes").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}
function mostrarContinentes(){
    $.ajax({
        type:"POST",
       url:"../controlador/ctrlContinentes.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}


function editarContinentes(id){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlContinentes.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}


function agregarContinente(){
   // alert('ok');
  
    var nombre = $("#nombre").val();
   
   
    $.ajax({
        type:"POST",
         url:"../controlador/ctrlContinentes.php",
        data:{accion:"Agregar",  nombre:nombre},
        success:function(response){
            console.log(response);   
            listar_continentes();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevoContinente(){
    $.ajax({
        type: "POST",
         url:"../controlador/ctrlContinentes.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function modificarContinente(id){
    var nombre = $("#nombre").val();

   

    $.ajax({
        type:"POST",
        url:"../controlador/ctrlContinentes.php",
        data:{accion:"Modificar", nombre:nombre},
        success:function(response){
            console.log(response);   
            listar_continentes();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}



function eliminarContinente(id){
    $.ajax({
        type:"POST",
       url:"../controlador/ctrlContinentes.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_continentes();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}