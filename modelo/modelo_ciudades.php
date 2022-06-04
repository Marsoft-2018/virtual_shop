<?php
    class Modelo_Ciudad extends conexion{
        public $id;
        public $idDepto;
        public $nombre;

        public function listar(){
            $sql = "SELECT * FROM municipios WHERE idDepto = '".$this->idDepto."' ORDER BY nombre ASC";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->close();
                return $arreglo;
            }
        }

        public function cargar(){
            $sql = "SELECT * FROM municipios WHERE id = '".$this->id."'";
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