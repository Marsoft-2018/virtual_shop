<?php
    include("../modelo/modelo_conexion.php");
    require("../modelo/modelo_categorias.php");

    $accion = "";
    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
    }
    $id_seccion = 1;
    switch ($accion){
        case "Listar":
            $MP = new Modelo_Categorias();
            $id_seccion = htmlspecialchars($_REQUEST['id_seccion'],ENT_QUOTES,'UTF-8');
            
            $consulta =$MP->listar_categorias($id_seccion);
            if($consulta) {
                echo json_encode($consulta);
            } else {
                echo '{
                    "sEcho":1,
                    "iTotalRecords":"0",
                    "iTotalDisplayRecords":"0",
                    "aaData":[]
                }';
            }
            break;

        case "Cargar":
            $MP = new Modelo_Categorias();
            $MP->id = htmlspecialchars($_REQUEST['id'],ENT_QUOTES,'UTF-8');
            
            $consulta =$MP->cargar();
            if($consulta) {
                echo json_encode($consulta);
            } else {
                echo '{
                    "sEcho":1,
                    "iTotalRecords":"0",
                    "iTotalDisplayRecords":"0",
                    "aaData":[]
                }';
            }
            break;
        
        case "Editar";
        

    }