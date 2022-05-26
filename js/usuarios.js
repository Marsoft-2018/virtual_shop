
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
    //listar_usuarios();
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
        
    var email =  $('#email').val() ;
    var nombreUsuario = $("#nombreUsuario").val();    
    var clave = $("#clave").val();
    var idRol = $("#idRol").val();
    var primerNombre = $("#primerNombre").val();
    var segundoNombre = $("#segundoNombre").val();
    var primerApellido = $("#primerApellido").val();
    var segundoApellido = $("#segundoApellido").val();
    var TipoDoc = $("#TipoDoc").val();
    var numerodoc = $("#numerodoc").val();
    var ciudad = $("#ciudad").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();

    $.ajax({
        type: 'POST',
        url: "../controlador/ctrlUsuarios.php",
        data:  {
            accion:accion,
            email:email,
            nombreUsuario:nombreUsuario,
            clave:clave,
            idRol:idRol,
            primerNombre:primerNombre,
            segundoNombre:segundoNombre,
            primerApellido:primerApellido,
            segundoApellido:segundoApellido,
            TipoDoc:TipoDoc,
            numerodoc:numerodoc,
            ciudad:ciudad,
            direccion:direccion,
            telefono:telefono
        }, 
        success: function(data){                
            //$("#datosProductos").html(data);
            console.log("respose: "+data);
        },
        error: function(data){
            console.log('Error: '+data);
        }
    }); 
}

function cargarDepartamentos(idPais){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlDepartamentos.php",
        data:{accion:"listarDatos",idPais:idPais},
        success:function(response){
            response = JSON.parse(response);
            $("#departamentos").html("");
            $("#departamentos").append("<option value=''>Seleccione...</option>");
            $.each(response,function(i,item){
				$("#departamentos").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
			});
            console.log("Datos: "+response);
            //$("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}


function cargarCiudades(idDepartamento){
    $.ajax({
        type: "POST",
        url:"../controlador/ctrlCiudades.php",
        data:{accion:"listarDatos",idDepartamento:idDepartamento},
        success:function(response){
            response = JSON.parse(response);
            $("#ciudad").html("");
            $("#ciudad").append("<option value=''>Seleccione...</option>");
            $.each(response,function(i,item){
				$("#ciudad").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
			});
            console.log("Datos: "+response);
            //$("#contenido_modal").html(response);
        },
        error: function(err){
            console.log("El error es: "+err);
        }
    })
}