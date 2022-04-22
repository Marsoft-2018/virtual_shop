<?php 

include("../modelo/modelo_conexion.php");
require("../modelo/modelo_producto.php");
require("../modelo/modelo_categorias.php");
require("../modelo/modelo_secciones.php");
require("../modelo/modelo_unidades.php");
$accion = "";
if(isset($_REQUEST['accion'])){
    $accion = $_REQUEST['accion'];
}

switch ($accion){
    case "Listar":
        $objProductos = new Modelo_Productos();
       // $objCategoria->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
        
        
        include("../vista/productos/lista.php");
        break;

    case "Mostrar":
        $objProductos = new Modelo_Productos();
        include("../vista/productos/index.php");
        break;

    case "Nuevo": case "Editar":
        $objProductos = new Modelo_Productos();
        $objCategoria = new Modelo_Categorias();
        $objUnidades = new Modelo_Unidades();
       // $objSeccion = new Modelo_Secciones();
        include("../vista/productos/formulario.php");        
    break;

    case "Agregar":
        $objProductos = new Modelo_Productos();   
        
        if(isset($_FILES['imagen'])){
            $archivo = $_FILES['imagen'];
            $nombreIMG  = $archivo["name"];
            $tipo       = $archivo["type"];
            $nombreTemp = $archivo["tmp_name"];
            $tamanho    = $archivo["size"];
            $destino    = "../images/productos/";

            @unlink($destino.$nombreIMG);
            $resultado = @move_uploaded_file($nombreTemp, $destino.$nombreIMG);
            if ($resultado){
                $objProductos->imagen = $nombreIMG;                
            } else {
                $objProductos->imagen = "default.png"; 
            }
        }else{
           $objProductos->imagen = "default.png"; 
        }
        $objProductos->id                =  $_POST['id'];
        $objProductos->nombre            =  $_POST['nombre'];
        $objProductos->referencia        =  $_POST['referencia'];
        $objProductos->descripcion       =  $_POST['descripcion'];
        $objProductos->precioCompra      =  $_POST['precioCompra'];
        $objProductos->precioVenta       =  $_POST['precioVenta'];
        //$objProductos->cantidadInicial =  $_POST['cantidadInicial'];
        $objProductos->cantidadMinima    =  $_POST['cantidadMinima'];
        $objProductos->idCategoria       =  $_POST['categoria'];
        $objProductos->idUnidad          =  $_POST['medida'];
        $objProductos->agregar();
    break;

    case "Modificar":
        $objProductos = new Modelo_Productos();
        $objProductos->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
        $objProductos->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
        $objProductos->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
        $objProductos->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
        $objProductos->modificar();
    break;

    case "Eliminar":
        $objProductos = new Modelo_Productos();
        $objProductos->id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
        $objProductos->eliminar();
    break;


}
  