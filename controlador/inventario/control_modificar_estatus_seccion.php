<?php 
 include '../../modelo/modelo_secciones.php';

 $MCS = new Modelo_Secciones();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

$consulta =$MCS->Modificar_Estatus_Seccion($id,$estatus);
echo $consulta;





 ?>