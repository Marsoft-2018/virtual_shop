<?php 
class Modelo_Categorias extends conexion{
	public $id;	
	public $idSeccion;
	public $categoria;
	public $descripcion;

	function listar_categorias($id_seccion) {
	 	$sql = "SELECT `categorias`.`id`, `categorias`.`nombre`, `categorias`.`descripcion`
    , `categorias`.`idSeccion`, `secciones`.`nombre` AS `seccion`, `categorias`.`estado`
    , `categorias`.`fechaRegistro` FROM `categorias`
    INNER JOIN `secciones` 
        ON (`categorias`.`idSeccion` = `secciones`.`id`)
        WHERE categorias.`idSeccion` = '$id_seccion'";
			$arreglo = array();
			if($consulta = $this->conexion->query($sql)){
				while($consulta_vu = mysqli_fetch_assoc($consulta)) {
						$arreglo["data"][] =$consulta_vu;
					
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
						$arreglo["data"][] =$consulta_vu;
					
				}
				return $arreglo;
				$this->conexion->cerrar();
		}
	}


 	function	Registrar_Categoria($idSeccion,$categoria,$descripcion) {
 		$sql = "INSERT INTO categorias(idSeccion,nombre,descripcion) VALUES('$idSeccion','$categoria','$descripcion')";
			if ($consulta = $this->conexion->query($sql)) {
				//$id_retornado = mysqli_insert_ind($this->conexion);
				return 1;
				
			}else{
				return 0;
			}
 	}

 	function Modificar_Categoria($id,$idSeccion, $categoria_actual,$categoria_nuevo,$descripcion_categoria) {
 		 $sql = "call  SP_MODIFICAR_CATEGORIA('$id','$idSeccion','$categoria_actual','$categoria_nuevo','$descripcion_categoria')";
            if($consulta = $this->conexion->query($sql)){
                if($row = mysqli_fetch_array($consulta)) {
                    return  $id =trim($row[0]);
                }
                
                $this->conexion->cerrar();
        }
 	}

 	function Modificar_Estatus_Categoria($id,$estatus) {
 		$sql = "UPDATE categorias set 
          estado = '$estatus' where id = '$id'";
			if ($consulta = $this->conexion->query($sql)) {
				//$id_retornado = mysqli_insert_ind($this->conexion->conexion);
				return 1;
				
			}else{
				return 0;
			}
 	}

}


 ?>