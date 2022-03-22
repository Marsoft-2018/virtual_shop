
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