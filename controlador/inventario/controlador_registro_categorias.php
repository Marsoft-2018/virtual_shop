<?php 
include '../../modelo/modelo_categorias.php';

 $MP = new Modelo_Categorias();
$idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');
$categoria = htmlspecialchars($_POST['categoria'],ENT_QUOTES,'UTF-8');
$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');

$consulta =$MP->Registrar_Categoria($idSeccion,$categoria,$descripcion);
echo $consulta;





 ?>