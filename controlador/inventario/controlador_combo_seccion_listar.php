<?php 
include '../../modelo/modelo_secciones.php';

 $MCS = new Modelo_Secciones();
$consulta =$MCS->listar_combo_seccion();
echo json_encode($consulta);




 ?>