<?php
    $nombre = "";
   

    $id = "";
    $funcionBoton = "agregarContinente()";
    if(isset($_REQUEST['id'])){
        $objContinente->id = $_REQUEST['id'];
        foreach ($objContinente->cargar() as $continente) {
            $id = $continente['id'];
            $nombre = $continente['nombre'];
            $funcionBoton = "modificarContinente('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para Continentes</h3>
    <div class="row">
      
        <div class="col-lg-12">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre "><br>
            </div>
      
    </div>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" onclick="<?php echo $funcionBoton; ?>" class="btn btn-primary">Guardar</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
     $('.js-example-basic-single').select2();
});
</script>