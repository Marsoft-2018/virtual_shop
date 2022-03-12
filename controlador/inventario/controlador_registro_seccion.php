<?php 
require '../../modelo/modelo_secciones.php';

$MR = new Modelo_Secciones();
$seccion = htmlspecialchars($_POST['seccion'],ENT_QUOTES,'UTF-8');
$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
$consulta =$MR->Registrar_Seccion($seccion,$descripcion);
echo $consulta;





 ?>