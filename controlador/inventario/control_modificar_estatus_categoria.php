<?php 
 include '../../modelo/modelo_categorias.php';

 $MP = new Modelo_Categorias();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

$consulta =$MP->Modificar_Estatus_Categoria($id,$estatus);
echo $consulta;





 ?>