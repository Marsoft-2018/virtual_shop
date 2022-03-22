<?php
    $nombre = "";
    $descripcion = "";
   
    $id = "";
    $funcionBoton = "agregarProducto()";
    if(isset($_REQUEST['id'])){
        $objProducto->id = $_REQUEST['id'];
        foreach ($objProducto->cargar() as $producto) {
            $id = $producto['id'];
            
            $nombre = $producto['nombre'];
            $descripcion = $producto['descripcion'];
            $funcionBoton = "modificarProducto('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para Secciones</h3>
    <div class="row">
    <div class="col-lg-6">
            <label for=""><b>Codigo:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre del producto"><br>
            </div>
        <div class="col-lg-6">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre del producto"><br>
            </div>
        <div class="col-lg-12">
            <label for=""><b>Descripcion:</b></label>
            <input type="text" id="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
    </div>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" onclick="<?php echo $funcionBoton; ?>" class="btn btn-primary">Guardar</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>