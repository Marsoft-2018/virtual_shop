<?php   
    require("../modelo/Conexion.php");
    require("../modelo/producto.php");
    $accion = "";
    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
    }
    switch ($accion) {
        case 'listar':
            
            //Prueba...
            $obj = new ProductoPDO();
            foreach ($obj->listar() as $value) {
                echo $value['nombre']."<br>";
            }

            echo "||--------------------------------------------------------------||<br><br>";
            $producto = new ProductoLi();
            $registro = $producto->listar();
            foreach ($registro as $value) {    
                echo  $value['nombre']."<br>";
            }
            break;
        
        default:
            # code...
            break;
    }
