<?php 

class Modelo_Continentes extends conexion {
	public $id;
	public $nombre;
	public $descripcion;
	
	function listar() {
	 		$sql = "SELECT     `id`    , `nombre`    , `fecha_reg`    , `activo`
		FROM     `continentes`;";
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
 		$sql = "INSERT INTO continentes(nombre)
		 VALUES ( '".$this->nombre."')";

 		if($consulta = $this->conexion->query($sql)){
			echo "Registro agregado con éxito";
			//$this->conexion->cerrar();
			
		} 		
 	}
	 
	function cargar(){
		$sql = "SELECT * FROM `continentes` WHERE `id` = '$this->id'";
		$arreglo = array();
		if($consulta = $this->conexion->query($sql)){
			while($consulta_vu = mysqli_fetch_assoc($consulta)) {
				$arreglo[] =$consulta_vu;				
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
 		
	function modificar() {
 		$sql = "UPDATE continentes SET  nombre = '".$this->nombre."' WHERE id = '".$this->id."'";
 		try {
	 		if( $this->conexion->query($sql)){
				echo "Registro modificado con éxito";
				//$this->conexion->cerrar();
				
			}  			
 		} catch (Exception $e) {
 			echo "Error: ".$e;
 		}		
 	}

 		function eliminar() {
 		$sql = "DELETE FROM continentes  WHERE id = '".$this->id."'";
 		try {
	 		if( $this->conexion->query($sql)){
				echo "Registro modificado con éxito";
				//$this->conexion->cerrar();
				
			}  			
 		} catch (Exception $e) {
 			echo "Error: ".$e;
 		}
}
}
 ?>