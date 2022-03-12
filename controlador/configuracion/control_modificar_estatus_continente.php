<?php 
 include '../../modelo/modelo_continente.php';

 $MCS = new Modelo_Continente();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

$consulta =$MCS->Modificar_Estatus_Continente($id,$estatus);
echo $consulta;





 ?>