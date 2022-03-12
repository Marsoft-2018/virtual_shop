<?php 
 require '../../modelo/modelo_empresa.php';

 $ME = new Modelo_Empresa();

$idempresa = htmlspecialchars($_POST['idempresa'],ENT_QUOTES,'UTF-8');
$nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
$nit = htmlspecialchars($_POST['nit'],ENT_QUOTES,'UTF-8');
$direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
$barrio = htmlspecialchars($_POST['barrio'],ENT_QUOTES,'UTF-8');
$ciudad = htmlspecialchars($_POST['ciudad'],ENT_QUOTES,'UTF-8');
$telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
$correo = htmlspecialchars($_POST['correo'],ENT_QUOTES,'UTF-8');
$propietario = htmlspecialchars($_POST['propietario'],ENT_QUOTES,'UTF-8');




$consulta =$ME->Modificar_Datos_Empresa($idempresa,$nombre,$nit,$direccion,$barrio,
$ciudad,$telefono,$correo,$propietario);
echo $consulta;





 ?>