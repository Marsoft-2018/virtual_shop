<?php
    class ProductoLi extends conexion {
        //private $conexion;
        
        function listar() {
            $sql = "SELECT * FROM productos limit 1, 10";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->close();
                return $arreglo;
            }
        }

        function agregar
    }

?>

