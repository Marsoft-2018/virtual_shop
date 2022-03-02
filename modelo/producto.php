<?php
    class ProductoLi {
        private $conexion;
        function __construct()
        {
            require_once 'Conexion.php';
            $this->conexion = new conexionLi();
            $this->conexion->conectar();
        }

        function listar() {
            $sql = "SELECT * FROM productos limit 1, 10";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->cerrar();
                return $arreglo;
            }
        }
    }

require("Conexion.php");
class ProductoPDO extends conexionPDO {
	
    private $sql;

    public function listar(){
        $this->sql = "SELECT * FROM productos limit 1, 10";
        try {
           $stm = $this->Conexion->prepare($this->sql);
           $stm->execute();
           $reg = $stm->fetchAll(PDO::FETCH_ASSOC);  
           return $reg; 				
        } catch (Exception $e) {
            echo "Error al consultar los datos. <br>".$e;
        }
    }
}

//Prueba...
$obj = new ProductoPDO();
foreach ($obj->listar() as $value) {
    echo $value['nombre']."<br>";
}

echo "<--------------------------------------------------------------><br><br>";
$MR = new ProductoLi();
$consulta = $MR->listar();
foreach ($consulta as $key => $value) {    
    echo  $value['nombre']."<br>";
}

