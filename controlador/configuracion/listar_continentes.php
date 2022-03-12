<?php 
 include '../../modelo/modelo_continente.php';

 $MCS = new Modelo_Continente();
 $consulta =$MCS->listar_continentes();
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