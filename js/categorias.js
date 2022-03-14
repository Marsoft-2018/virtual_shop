

var t_categorias;





function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}

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
        type:"POST",
        url:"../controlador/ctrlCategorias.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}
