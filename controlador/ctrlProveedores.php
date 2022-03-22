<?php 

   include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_proveedores.php");
   
 $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objProveedor = new Modelo_Proveedores();
          
            
            
            include("../vista/proveedores/lista.php");
            break;

        case "Mostrar":
            $objProveedor = new Modelo_Proveedores();
            include("../vista/proveedores/index.php");
            break;

        case "Nuevo": case "Editar":
            $objProveedor = new Modelo_Proveedores();
           
            include("../vista/proveedores/formulario.php");        
        break;

        case "Agregar":
            $objProveedor = new Modelo_Proveedores();
           $objProveedor->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
           $objProveedor->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
           $objProveedor->direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
           $objProveedor->telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
            $objProveedor->ciudad = htmlspecialchars($_POST['ciudad'],ENT_QUOTES,'UTF-8');
            $objProveedor->correo = htmlspecialchars($_POST['correo'],ENT_QUOTES,'UTF-8');
            $objProveedor->agregar();
        break;

        case "Modificar":
            $objProveedor = new Modelo_Proveedores();
            $objProveedor->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
           
            $objProveedor->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objProveedor->direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
            $objProveedor->telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
            $objProveedor->ciudad = htmlspecialchars($_POST['ciudad'],ENT_QUOTES,'UTF-8');
            $objProveedor->correo = htmlspecialchars($_POST['correo'],ENT_QUOTES,'UTF-8');
            $objProveedor->modificar();
        break;

        case "Eliminar":
            $objProveedor = new Modelo_Proveedores();
            $objProveedor->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objProveedor->eliminar();
        break;


    }

 ?>