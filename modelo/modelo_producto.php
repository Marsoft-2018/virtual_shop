<?php
    class Modelo_Productos extends conexion {
        //private $conexion;
        
        function listar() {
            $sql = "SELECT p.id,p.nombre,p.referencia,p.descripcion,
            p.precioCompra,p.precioVenta,
            p.cantidadInicial,p.compras,p.ventas,p.devoluciones,
            p.existencias,p.cantidadMinima,p.imagen,p.estado,p.fecha_reg,
            cat.nombre AS categoria, uni.nombre AS unidad
            
             FROM 
             productos AS p
              INNER JOIN `unidades` AS uni  ON (`p`.`idUnidad` = `uni`.`id`)
              INNER JOIN `categorias`  AS cat ON (`p`.`idCategoria` = `cat`.`id`)
              
              ORDER BY p.nombre ASC
              LIMIT 0,10";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->close();
                return $arreglo;
            }
        }

        function cargar(){
            $sql = "SELECT * FROM `productos` WHERE `id` = '$this->id'";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;				
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function agregar() {
            var_dump($_REQUEST);
        }
    }

?>

