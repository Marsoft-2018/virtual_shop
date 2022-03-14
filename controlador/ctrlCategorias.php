<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_categorias.php");
    require("../modelo/modelo_secciones.php");

    $accion = "";
    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objCategoria = new Modelo_Categorias();
            $objCategoria->idSeccion = htmlspecialchars($_REQUEST['idSeccion'],ENT_QUOTES,'UTF-8');
            
            
            include("../vista/categorias/lista.php");
            break;

        case "Mostrar":
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/index.php");
            break;
        case "Nuevo": case "Editar":
            $objCategoria = new Modelo_Categorias();
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/formulario.php");
        break;

    }