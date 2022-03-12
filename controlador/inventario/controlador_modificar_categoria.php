<?php 
  include '../../modelo/modelo_categorias.php';

 $MP = new Modelo_Categorias();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$idSeccion = htmlspecialchars($_POST['idSeccion'],ENT_QUOTES,'UTF-8');

$categoria_actual = htmlspecialchars($_POST['categoria_actual'],ENT_QUOTES,'UTF-8');
$categoria_nuevo = htmlspecialchars($_POST['categoria_nuevo'],ENT_QUOTES,'UTF-8');
$descripcion_categoria = htmlspecialchars($_POST['descripcion_categoria'],ENT_QUOTES,'UTF-8');
$consulta =$MP->Modificar_Categoria($id,$idSeccion,

 $categoria_actual,$categoria_nuevo,$descripcion_categoria);
echo $consulta;





 ?>