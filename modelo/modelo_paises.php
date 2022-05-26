<?php
    class Modelo_Pais extends conexion{
        private $id;
        public $nombre;

        public function cargar(){
            $sql = "SELECT * FROM paises ORDER BY nombre ASC";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->close();
                return $arreglo;
            }
        }
    }

?>