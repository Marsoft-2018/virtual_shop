<?php 
class Modelo_Categorias extends conexion{
	public $id;	
	public $idSeccion;
	public $nombre;
	public $descripcion;

	function listar() {
	 	$sql = "SELECT `categorias`.`id`, `categorias`.`nombre`, `categorias`.`descripcion`
    , `categorias`.`idSeccion`, `secciones`.`nombre` AS `seccion`, `categorias`.`estado`
    , `categorias`.`fechaRegistro` FROM `categorias`
    INNER JOIN `secciones` 
        ON (`categorias`.`idSeccion` = `secciones`.`id`)
        WHERE categorias.`idSeccion` = '".$this->idSeccion."'";
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
		$sql = "SELECT * FROM `categorias` WHERE `id` = '$this->id'";
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
 		$sql = "INSERT INTO categorias(idSeccion,nombre,descripcion)VALUES ('".$this->idSeccion."', '".$this->nombre."','".$this->descripcion."')";

 		if($consulta = $this->conexion->query($sql)){
			echo "Registro agregadocon éxito";
			//$this->conexion->cerrar();
			
		} 		
 	}

 	function modificar() {
 		$sql = "UPDATE categorias SET idSeccion = '".$this->idSeccion."', nombre = '".$this->nombre."', descripcion = '".$this->descripcion."' WHERE id = '".$this->id."'";
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
 		$sql = "DELETE FROM categorias  WHERE id = '".$this->id."'";
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