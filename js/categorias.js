

    /*combo secciones*/

function listar_categorias(){
    var id_seccion = $('#cmb_seccion').val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Listar",idSeccion:id_seccion},
        success:function(response){
            $("#listaCategorias").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}

function mostrarCategorias(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function nuevaCategoria(){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function editarCategoria(id){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Editar",id:id},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}

function agregarCategoria(){
   // alert('ok');
    var idSeccion = $("#seccion").val();
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Agregar", idSeccion:idSeccion, nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_categorias();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function modificarCategoria(id){
   // alert('ok');
    var idSeccion = $("#seccion").val();
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Modificar",id:id, idSeccion:idSeccion, nombre:nombre, descripcion:descripcion},
        success:function(response){
            console.log(response);   
            listar_categorias();         
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}

function eliminarCategoria(id){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Eliminar",id:id},
        success:function(response){
            console.log(response); 
            listar_categorias();           
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}
