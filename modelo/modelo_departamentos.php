<?php
    class Modelo_Departamento extends conexion{
        public $id;
        public $idPais;
        public $nombre;

        public function listar(){
            $sql = "SELECT * FROM departamentos WHERE idPais = '".$this->idPais."' ORDER BY nombre ASC";
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
            $sql = "SELECT * FROM departamentos WHERE id = '".$this->id."'";
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