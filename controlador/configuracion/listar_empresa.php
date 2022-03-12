<?php 
 include '../../modelo/modelo_empresa.php';

 $MCS = new Modelo_Empresa();
 $consulta =$MCS->listar_empresa();
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