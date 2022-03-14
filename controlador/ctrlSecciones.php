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
            include("../vista/categorias/formulario.php");
        break;

    }