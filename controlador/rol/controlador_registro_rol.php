<?php 
require '../../modelo/modelo_rol.php';

$MR = new Modelo_Rol();
$rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
$consulta =$MR->Registrar_Rol($rol,$descripcion);
echo $consulta;





 ?>