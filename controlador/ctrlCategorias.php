<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_categorias.php");
    require("../modelo/modelo_secciones.php");

    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objCategoria = new Modelo_Categorias();
            $objCategoria->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            
            
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

        case "Agregar":
            $objCategoria = new Modelo_Categorias();
            $objCategoria->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objCategoria->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objCategoria->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objCategoria->agregar();
        break;

        case "Modificar":
            $objCategoria = new Modelo_Categorias();
            $objCategoria->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objCategoria->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objCategoria->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objCategoria->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objCategoria->modificar();
        break;

        case "Eliminar":
            $objCategoria = new Modelo_Categorias();
            $objCategoria->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objCategoria->eliminar();
        break;


    }