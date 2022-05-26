<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_paises.php");
    require("../modelo/modelo_departamentos.php");

    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }
    
    switch ($accion){
        case "Listar":
            $objDpto = new Modelo_Departamento();
            $objDpto->idPais = htmlspecialchars($_POST['idPais'],ENT_QUOTES,'UTF-8');
            include("../vista/departamentos/lista.php");
            break;
        case "listarDatos":
            $objDpto = new Modelo_Departamento();
            $objDpto->idPais = htmlspecialchars($_POST['idPais'],ENT_QUOTES,'UTF-8');
            echo json_encode($objDpto->listar());
            break;

        case "Mostrar":
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/index.php");
            break;

        case "Nuevo": case "Editar":
            $objDpto = new Modelo_Departamento();
            $objSeccion = new Modelo_Secciones();
            include("../vista/categorias/formulario.php");        
        break;

        case "Agregar":
            $objDpto = new Modelo_Departamento();
            $objDpto->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objDpto->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objDpto->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objDpto->agregar();
        break;

        case "Modificar":
            $objDpto = new Modelo_Departamento();
            $objDpto->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objDpto->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
            $objDpto->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
            $objDpto->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
            $objDpto->modificar();
        break;

        case "Eliminar":
            $objDpto = new Modelo_Departamento();
            $objDpto->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
            $objDpto->eliminar();
        break;


    }