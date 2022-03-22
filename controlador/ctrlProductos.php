<?php 

include("../modelo/modelo_conexion.php");
require("../modelo/modelo_producto.php");
$accion = "";
if(isset($_POST['accion'])){
    $accion = $_POST['accion'];
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
       // $objSeccion = new Modelo_Secciones();
        include("../vista/productos/formulario.php");        
    break;

    case "Agregar":
        $objProductos = new Modelo_Productos();
        $objProductos->idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
        $objProductos->nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
        $objProductos->descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
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
  