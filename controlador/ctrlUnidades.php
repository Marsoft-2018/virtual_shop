<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_unidades.php");
   

    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objUnidades = new Modelo_Unidades();
       
            
            
            include("../vista/unidades/lista.php");
            break;

        case "Mostrar":
            $objUnidades = new Modelo_Unidades();
            include("../vista/unidades/index.php");
            break;

        case "Nuevo": case "Editar":
            $objUnidades = new Modelo_Unidades();
           
            include("../vista/unidades/formulario.php");        
        break;

        case "Agregar":
            $objUnidades = new Modelo_Unidades();
           
            $objUnidades->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objUnidades->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objUnidades->agregar();
        break;

        case "Modificar":
            $objUnidades = new Modelo_Unidades();
            $objUnidades->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
          
            $objUnidades->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objUnidades->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objUnidades->modificar();
        break;

        case "Eliminar":
            $objUnidades = new Modelo_Unidades();
            $objUnidades->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objUnidades->eliminar();
        break;


    }