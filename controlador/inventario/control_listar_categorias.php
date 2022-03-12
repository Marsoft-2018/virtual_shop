<?php 
 	include '../../modelo/modelo_categorias.php';

 $MP = new Modelo_Categorias();
  $id_seccion = htmlspecialchars($_POST['id_seccion'],ENT_QUOTES,'UTF-8');
   
 $consulta =$MP->listar_categorias($id_seccion);
if($consulta) {
	echo json_encode($consulta);
} else {
	echo '{
		"sEcho":1,
		"iTotalRecords":"0",
		"iTotalDisplayRecords":"0",
		"aaData":[]
	}';
}


 ?>