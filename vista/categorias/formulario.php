<?php
    $nombre = "";
    $descripcion = "";
    $idSeccion = "";
    $id = "";
    $funcionBoton = "agregarCategoria()";
    if(isset($_REQUEST['id'])){
        $objCategoria->id = $_REQUEST['id'];
        foreach ($objCategoria->cargar() as $categoria) {
            $id = $categoria['id'];
            $idSeccion = $categoria['idSeccion'];
            $nombre = $categoria['nombre'];
            $descripcion = $categoria['descripcion'];
            $funcionBoton = "modificarCategoria('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para categorias</h3>
    <div class="row">
        <div class="col-lg-8">
            <label for=""><b>Sección</b></label>
            <select class="js-example-basic-single form form-control" name="state" style="width: 100%;" id="cmb_seccion_agregar">
                <option value="">Seleccione...</option>
                <?php
                    foreach ($objSeccion->listar() as $value) {
                        $sel = "";
                        if($idSeccion == $value['id'] ){ $sel = "selected"; }
                        ?>
                        <option value="<?php echo $value['id']; ?>" <?php echo $sel ?>><?php echo $value['nombre'] ?></option>
                    <?php } ?>   
            </select>
        </div>
        <div class="col-lg-12">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre de la cetegoria"><br>
            </div>
        <div class="col-lg-12">
            <label for=""><b>Descripcion:</b></label>
            <input type="text" id="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
    </div>
    <button type="button" onclick="<?php echo $funcionBoton; ?>"></button>
</div>