<?php 

 require '../../modelo/modelo_empresa.php';

$ME = new Modelo_Empresa();
 $idempresa = htmlspecialchars($_POST['idempresa'],ENT_QUOTES,'UTF-8');
 $nombrearchivo = htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8');
 if(is_array($_FILES) && count($_FILES)>0) {
 	if(move_uploaded_file($_FILES['foto']['tmp_name'],"img/".$nombrearchivo)) {
 		$ruta ='controlador/configuracion/img/'.$nombrearchivo;
 		$consulta = $ME->Modificar_Foto($idempresa,$ruta);
 		echo $consulta;
 	} else {
 		echo 0;
 	}
 }else {
 	
 		echo 0;
 }





 ?>