<?php
    $nombre = "";
    $descripcion = "";

    $id = "";
    $funcionBoton = "agregarRol()";
    if(isset($_REQUEST['id'])){
        $objRoles->id = $_REQUEST['id'];
        foreach ($objRoles->cargar() as $rol) {
            $id = $rol['id'];
          
            $nombre = $rol['nombre'];
            $descripcion = $rol['descripcion'];
            $funcionBoton = "modificarRol('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para Perfiles</h3>
    <div class="row">
      
        <div class="col-lg-12">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre de la cetegoria"><br>
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