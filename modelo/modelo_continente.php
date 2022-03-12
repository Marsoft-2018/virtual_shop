<?php

class Modelo_Continente {
    private $conexion;
    public $nombre;
	


	function __construct()
	{
		require_once 'modelo_conexion.php';
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}



	

	 function listar_continentes() {
	 			$sql = "SELECT
                 `id`
                 , `nombre`
                 , `fecha_reg`
                 , `activo`
             FROM
                 `continentes`;";
			$arreglo = array();
			if($consulta = $this->conexion->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_assoc($consulta)) {
						$arreglo["data"][] =$consulta_vu;
					
				}
				return $arreglo;
				$this->conexion->cerrar();
		}
 		}
        function Modificar_Estatus_Continente($id,$estatus) {
            $sql = "UPDATE continentes set 
          activo = '$estatus' where id = '$id'";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				//$id_retornado = mysqli_insert_ind($this->conexion->conexion);
				return 1;
				
			}else{
				return 0;
			}
        }

        function	Registrar_Continente($nombre) {
            $sql = "INSERT INTO continentes(nombre) VALUES('$nombre')";
               if ($consulta = $this->conexion->conexion->query($sql)) {
                   //$id_retornado = mysqli_insert_ind($this->conexion->conexion);
                   return 1;
                   
               }else{
                   return 0;
               }
        }

		function Modificar_Datos_Continente($idcontinente,$nombre) {
			$sql = "call SP_MODIFICAR_CONTINENTE('$idcontinente'
			,'$nombre')";
		if ($consulta = $this->conexion->conexion->query($sql)) {
			//$id_retornado = mysqli_insert_ind($this->conexion->conexion);
			return 1;
			
		}else{
			return 0;
		}
		}
}