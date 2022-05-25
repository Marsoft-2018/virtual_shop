
function listar_usuarios(){
  
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlUsuarios.php",
        data:{accion:"Listar"},
        success:function(response){
            $("#listaUsuarios").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    }); 
    return false;
}
function mostrarUsuarios(){
    $.ajax({
        type:"POST",
        url:"../controlador/ctrlUsuarios.php",
        data:{accion:"Mostrar"},
        success:function(response){
            $("#contenido_principal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err.type);
        }
    }); 
}


function nuevoUsuario(){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlUsuarios.php",
        data:{accion:"Nuevo"},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    });
}

function editarUsuario(email){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlUsuarios.php",
        data:{accion:"Editar",email:email},
        success:function(response){
            $("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    });
}



function agregarUsuario(){
    guardarUsuario("Agregar");
    listar_usuarios();
}

function modificarUsuario(){
    guardarUsuario("Modificar");
    listar_usuarios();
}

function eliminarUsuario(email){
    $.ajax({
        type: 'POST',
        url: "../controlador/ctrlUsuarios.php",
        data:  {accion:"Eliminar", email:email}, 
        success: function(data){                
            //$("#datosProductos").html(data);
            console.log("respose: "+data);
            listar_usuarios();
        },
        error: function(data){
            console.log('Error: '+data);
        }
    }); 
}

function guardarUsuario(accion){
    var imagen = $('#imagen').prop('files')[0];             
    var formulario = new FormData();    
    formulario.append('email', $('#email').val() );
    formulario.append('imagen',imagen);
    formulario.append('nombreUsuario',$("#nombreUsuario").val());    
    formulario.append('clave',$("#clave").val());
    formulario.append('idRol',$("#idRol").val());
    formulario.append('primerNombre',$("#primerNombre").val());
    formulario.append('segundoNombre',$("#segundoNombre").val());
    formulario.append('primerApellido',$("#primerApellido").val());
    formulario.append('segundoApellido',$("#segundoApellido").val());
    formulario.append('TipoDoc',$("#TipoDoc").val());
    formulario.append('numerodoc',$("#numerodoc").val());
    formulario.append('ciudad',$("#ciudad").val());
    formulario.append('direccion',$("#direccion").val());
    formulario.append('telefono',$("#telefono").val());

    $.ajax({
        type: 'POST',
        url: "../controlador/ctrlUsuarios.php?accion="+accion,
        data:  formulario,                        
        processData:false,
        cache:false,
        contentType: false,
        success: function(data){                
            //$("#datosProductos").html(data);
            console.log("respose: "+data);
        },
        error: function(data){
            console.log('Error: '+data);
        }
    }); 
}