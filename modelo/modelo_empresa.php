<?php

class Modelo_Empresa {
    private $conexion;


	function __construct()
	{
		require_once 'modelo_conexion.php';
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}



	

	 function listar_empresa() {
	 		$sql = "SELECT     `id`        , `nombre`
             , `nit`         , `direccion`         , `barrio`
             , `ciudad`      , `telefono`             , `correo`             , `logo`
             , `propietario`     , `estado`             , `fecha_reg`
         FROM
             `negocio`;";
			$arreglo = array();
			if($consulta = $this->conexion->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_assoc($consulta)) {
						$arreglo["data"][] =$consulta_vu;
					
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
 		}

         function  Modificar_Foto($idempresa,$ruta) {
            $sql = "call  SP_MODIFICAR_FOTO_EMPRESA('$idempresa','$ruta')";
                   if($consulta = $this->conexion->conexion->query($sql)){
                       if($row = mysqli_fetch_array($consulta)) {
                           return	$id =trim($row[0]);
                       }
                        $arreglo;
                       $this->conexion->cerrar();
                   }
        }

	function Modificar_Datos_Empresa($idempresa,$nombre,$nit,$direccion,$barrio,
	$ciudad,$telefono,$correo,$propietario) {
		$sql = "call SP_MODIFICAR_DATOS_EMPRESA('$idempresa','$nombre','$nit',
		'$direccion','$barrio'
		,'$ciudad','$telefono','$correo','$propietario')";
		if ($consulta = $this->conexion->conexion->query($sql)) {
			//$id_retornado = mysqli_insert_ind($this->conexion->conexion);
			return 1;
			
		}else{
			return 0;
		}
	}
}