<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_departamentos.php");
    require("../modelo/modelo_ciudades.php");

    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objCiudad = new Modelo_Ciudad();
            $objCiudad->idPais = htmlspecialchars($_POST['idPais'],ENT_QUOTES,'UTF-8');
            include("../vista/Ciudads/lista.php");
            break;
        case "listarDatos":
            $objCiudad = new Modelo_Ciudad();
            $objCiudad->idDepto = htmlspecialchars($_POST['idDepartamento'],ENT_QUOTES,'UTF-8');
            echo json_encode($objCiudad->listar());
            break;

        case "Mostrar":
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/index.php");
            break;

        case "Nuevo": case "Editar":
            $objCiudad = new Modelo_Ciudad();
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/formulario.php");        
        break;

        case "Agregar":
            $objCiudad = new Modelo_Ciudad();
            $objCiudad->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objCiudad->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objCiudad->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objCiudad->agregar();
        break;

        case "Modificar":
            $objCiudad = new Modelo_Ciudad();
            $objCiudad->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objCiudad->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objCiudad->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objCiudad->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objCiudad->modificar();
        break;

        case "Eliminar":
            $objCiudad = new Modelo_Ciudad();
            $objCiudad->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objCiudad->eliminar();
        break;


    }