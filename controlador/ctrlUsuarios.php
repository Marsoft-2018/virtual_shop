<?php 

require("../modelo/modelo_conexion.php");
require("../modelo/modelo_paises.php");
require("../modelo/modelo_departamentos.php");
require("../modelo/modelo_ciudades.php");
require("../modelo/modelo_usuarios.php");
require("../modelo/modelo_roles.php");

$accion = "";
if(isset($_REQUEST['accion'])){
    $accion = $_REQUEST['accion'];
}

switch ($accion){
    case "Listar":
        $objUsuarios = new Modelo_Usuarios();
       // $objCategoria->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
        
        
        include("../vista/usuarios/lista.php");
        break;

    case "Mostrar":
        $objUsuarios = new Modelo_Usuarios();
        include("../vista/usuarios/index.php");
        break;

    case "Nuevo": case "Editar":
        $objUsuarios = new Modelo_Usuarios();
        $objRoles = new Modelo_Roles();
        $objPaises = new Modelo_Pais();
        $objDepartamento = new Modelo_Departamento();    
        $objCiudad = new Modelo_Ciudad();    
      
       // $objSeccion = new Modelo_Secciones();
        include("../vista/usuarios/formulario.php");        
    break;

    case "Agregar": case "Modificar":
        $objUsuarios = new Modelo_Usuarios();   
        
        $objUsuarios->email          =  $_POST['email'];
        $objUsuarios->nombreUsuario  =  $_POST['nombreUsuario'];
        $objUsuarios->clave  =  $_POST['clave'];
        $objUsuarios->idRol          =  $_POST['idRol'];
        $objUsuarios->primerNombre        =  $_POST['primerNombre'];
        $objUsuarios->segundoNombre       =  $_POST['segundoNombre'];
        $objUsuarios->primerApellido      =  $_POST['primerApellido'];
        $objUsuarios->segundoApellido       =  $_POST['segundoApellido'];
        $objUsuarios->TipoDoc    =  $_POST['TipoDoc'];
        $objUsuarios->numerodoc       =  $_POST['numerodoc'];
        $objUsuarios->ciudad       =  $_POST['ciudad'];
        $objUsuarios->direccion       =  $_POST['direccion'];
        $objUsuarios->telefono       =  $_POST['telefono'];
        
        if ($accion == "Agregar") {
            $objUsuarios->agregar();
        }else{
            $objUsuarios->modificar();
        }
    break;

    case "Eliminar":
        echo "Accion: ".$accion;
        $objUsuarios = new Modelo_Usuarios();
        $objUsuarios->email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
        $objUsuarios->eliminar();
        @unlink("../images/usuarios/".$_POST['email']);
    break;


}
  