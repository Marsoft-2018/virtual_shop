
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