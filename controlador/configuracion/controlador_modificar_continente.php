<?php 
  include '../../modelo/modelo_continente.php';

  $MCS = new Modelo_Continente();

$idcontinente = htmlspecialchars($_POST['idcontinente'],ENT_QUOTES,'UTF-8');
$nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');





$consulta =$MCS->Modificar_Datos_Continente($idcontinente,$nombre);
echo $consulta;





 ?>