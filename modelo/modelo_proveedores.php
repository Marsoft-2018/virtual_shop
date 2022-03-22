<?php 
class Modelo_Proveedores extends conexion {
		public $id;	

	public $nombre;
	public $direccion;
	public $telefono;
	public $ciudad;
	public $correo;

	function listar() {
	 	$sql = "SELECT     `id`  , `nombre`  , `direccion`   , `telefono`    , `ciudad`    , `correo`    , `estado`
    , `fecha_reg`
	FROM
    `proveedores`
    ORDER BY proveedores.`nombre` ASC";
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
		$sql = "SELECT * FROM `proveedores` WHERE `id` = '$this->id'";
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
 		$sql = "INSERT INTO proveedores(id,nombre,direccion,telefono,ciudad,correo)VALUES ('".$this->id."','".$this->nombre."','".$this->direccion."','".$this->telefono."','".$this->ciudad."','".$this->correo." ')";

 		if($consulta = $this->conexion->query($sql)){
			echo "Registro agregado con éxito";
			//$this->conexion->cerrar();
			
		} else {
				echo "Registro no agregado";
		}		
 	}


function modificar() {
 		$sql = "UPDATE proveedores SET id = '".$this->id."', nombre = '".$this->nombre."', direccion = '".$this->direccion."', telefono ='".$this->telefono."', ciudad ='".$this->ciudad."', correo ='".$this->correo."'  WHERE id = '".$this->id."'";
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
 		$sql = "DELETE FROM proveedores  WHERE id = '".$this->id."'";
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