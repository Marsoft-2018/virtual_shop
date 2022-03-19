<?php 

   include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_roles.php");
   
 $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objRoles = new Modelo_Roles();
          
            
            
            include("../vista/roles/lista.php");
            break;

        case "Mostrar":
            $objRoles = new Modelo_Roles();
            include("../vista/roles/index.php");
            break;

        case "Nuevo": case "Editar":
            $objRoles = new Modelo_Roles();
           
            include("../vista/roles/formulario.php");        
        break;

        case "Agregar":
            $objRoles = new Modelo_Roles();
           
            $objRoles->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objRoles->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objRoles->agregar();
        break;

        case "Modificar":
            $objRoles = new Modelo_Roles();
            $objRoles->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
           
            $objRoles->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objRoles->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objRoles->modificar();
        break;

        case "Eliminar":
            $objRoles = new Modelo_Roles();
            $objRoles->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objRoles->eliminar();
        break;


    }

 ?>