<?php
    include("../modelo/modelo_conexion.php");
   
    require("../modelo/modelo_secciones.php");

    $accion = "";
    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objSeccion = new Modelo_Secciones();
            
            
            include("../vista/secciones/lista.php");
            break;

        case "Mostrar":
            $objSeccion = new Modelo_Secciones();
            include("../vista/secciones/index.php");
            break;
        case "Nuevo": case "Editar":
           
            $objSeccion = new Modelo_Secciones();
            include("../vista/secciones/formulario.php");
        break;
         case "Agregar":
            $objSeccion = new Modelo_Secciones();
           
            $objSeccion->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objSeccion->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objSeccion->agregar();
        break;

         case "Modificar":
              $objSeccion = new Modelo_Secciones();
            $objSeccion->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            
            $objSeccion->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objSeccion->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objSeccion->modificar();
        break;

          case "Eliminar":
            $objSeccion = new Modelo_Secciones();
            $objSeccion->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objSeccion->eliminar();
        break;

    }