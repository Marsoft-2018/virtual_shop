<?php 


class Modelo_Secciones {
	private $conexion;


	function __construct()
	{
		require_once 'modelo_conexion.php';
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}



	

	 function listar_secciones() {
	 		$sql = "SELECT     `id`    , `nombre`    , `descripcion`    , `estado`
    			, `fecha_reg`
				FROM
   				 `secciones`;";
			$arreglo = array();
			if($consulta = $this->conexion->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_assoc($consulta)) {
						$arreglo["data"][] =$consulta_vu;
					
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
 		}






 		function Registrar_Seccion($seccion,$descripcion) {
 			$sql = "call  SP_REGISTRAR_SECCION('$seccion','$descripcion')";
			if($consulta = $this->conexion->conexion->query($sql)){
				if($row = mysqli_fetch_array($consulta)) {
					return	$id =trim($row[0]);
				}
				 $arreglo;
				$this->conexion->cerrar();
			}
 		}


 		function Modificar_Estatus_Seccion($id,$estatus) {
		$sql = "UPDATE secciones set 
          estado = '$estatus' where id = '$id'";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				//$id_retornado = mysqli_insert_ind($this->conexion->conexion);
				return 1;
				
			}else{
				return 0;
			}
	}


	function Modificar_Seccion($id,$seccion_actual,$seccion_nuevo,$descripcion_seccion) {
        $sql = "call  SP_MODIFICAR_SECCION('$id','$seccion_actual','$seccion_nuevo','$descripcion_seccion')";
            if($consulta = $this->conexion->conexion->query($sql)){
                if($row = mysqli_fetch_array($consulta)) {
                    return  $id =trim($row[0]);
                }
                 $arreglo;
                $this->conexion->cerrar();
        }
    }

    function listar_combo_seccion() {
    	$sql = "SELECT id, nombre
				 FROM secciones
				 WHERE estado = 1";
			$arreglo = array();
			if($consulta = $this->conexion->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_array($consulta)) {
						$arreglo[] =$consulta_vu;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
    }


 	}















 ?>