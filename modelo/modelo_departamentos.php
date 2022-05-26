<?php
    class Modelo_Departamento extends conexion{
        private $id;
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
    }

?>