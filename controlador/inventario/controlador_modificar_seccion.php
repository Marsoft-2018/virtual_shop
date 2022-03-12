<?php 
 include '../../modelo/modelo_secciones.php';

 $MCS = new Modelo_Secciones();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$seccion_actual = htmlspecialchars($_POST['seccion_actual'],ENT_QUOTES,'UTF-8');
$seccion_nuevo = htmlspecialchars($_POST['seccion_nuevo'],ENT_QUOTES,'UTF-8');
$descripcion_seccion = htmlspecialchars($_POST['descripcion_seccion'],ENT_QUOTES,'UTF-8');
$consulta =$MCS->Modificar_Seccion($id,$seccion_actual,$seccion_nuevo,$descripcion_seccion);
echo $consulta;





 ?>