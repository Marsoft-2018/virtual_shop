<?php 
 include '../../modelo/modelo_continente.php';

 $MCS = new Modelo_Continente();
$nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
//$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
$consulta =$MCS->Registrar_Continente($nombre);
echo $consulta;





 ?>