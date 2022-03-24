<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_continentes.php");
   

    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objContinente = new Modelo_Continentes();
       
            
            
            include("../vista/continentes/lista.php");
            break;

        case "Mostrar":
            $objContinente = new Modelo_Continentes();
            include("../vista/continentes/index.php");
            break;

        case "Nuevo": case "Editar":
            $objContinente = new Modelo_Continentes();
           
            include("../vista/continentes/formulario.php");        
        break;

        case "Agregar":
            $objContinente = new Modelo_Continentes();
           
            $objContinente->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objContinente->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objContinente->agregar();
        break;

        case "Modificar":
            $objContinente = new Modelo_Continentes();
            $objContinente->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
          
            $objContinente->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objContinente->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objContinente->modificar();
        break;

        case "Eliminar":
            $objContinente = new Modelo_Continentes();
            $objContinente->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objContinente->eliminar();
        break;


    }