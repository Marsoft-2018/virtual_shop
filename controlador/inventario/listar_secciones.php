<?php 
 include '../../modelo/modelo_secciones.php';

 $MCS = new Modelo_Secciones();
 $consulta =$MCS->listar_secciones();
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