<?php 

class Modelo_Roles extends conexion {
		public $id;	

	public $nombre;
	public $descripcion;

	function listar() {
	 	$sql = "SELECT * FROM roles ORDER BY nombre ASC";
			$arreglo = array();
			if($consulta = $this->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_assoc($consulta)) {
						$arreglo[] =$consulta_vu;
					
				}
				return $arreglo;
				$this->conexion->cerrar();
		}
 	}
	
	function cargar(){
		$sql = "SELECT * FROM `roles` WHERE `id` = '$this->id'";
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
 		$sql = "INSERT INTO roles(nombre,descripcion)VALUES ('".$this->nombre."','".$this->descripcion."')";

 		if($consulta = $this->conexion->query($sql)){
			echo "Registro agregado con éxito";
			//$this->conexion->cerrar();
			
		} else {
				echo "Registro no agregado";
		}		
 	}

 	 	function modificar() {
 		$sql = "UPDATE roles SET nombre = '".$this->nombre."', descripcion = '".$this->descripcion."' WHERE id = '".$this->id."'";
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
 		$sql = "DELETE FROM roles  WHERE id = '".$this->id."'";
 		try {
	 		if( $this->conexion->query($sql)){
				echo "Registro Eliminado con éxito";
				//$this->conexion->cerrar();
				
			}  			
 		} catch (Exception $e) {
 			echo "Error: ".$e;
 		}		
 	}
}









 ?>