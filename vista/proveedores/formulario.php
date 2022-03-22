<?php
    $id = "";
    $nombre = "";
    $direccion = "";
    $telefono = "";
    $ciudad = "";
    $correo = "";
   
    $funcionBoton = "agregarProveedor()";
    if(isset($_REQUEST['id'])){
        $objProveedor->id = $_REQUEST['id'];
        foreach ($objProveedor->cargar() as $proveedor) {
            $id = $proveedor['id'];
            
            $nombre = $proveedor['nombre'];
            $direccion = $proveedor['direccion'];
            $telefono = $proveedor['telefono'];
            $ciudad = $proveedor['ciudad'];
            $correo = $proveedor['correo'];
            $funcionBoton = "modificarProveedor('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para Proveedores</h3>
    <div class="row">
        <div class="col-lg-6">
            <label for=""><b>Documento:</b></label>
                <input type="text" id="id" value="<?php echo $id; ?>" class="form-control" placeholder="Documento del proveedor"><br>
            </div>
        <div class="col-lg-6">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre de la cetegoria"><br>
            </div>
        <div class="col-lg-6">
            <label for=""><b>Dirección:</b></label>
            <input type="text" id="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Teléfono:</b></label>
            <input type="text" id="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Ciudad:</b></label>
            <input type="text" id="ciudad" value="<?php echo $ciudad; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Correo:</b></label>
            <input type="text" id="correo" value="<?php echo $correo; ?>" class="form-control" placeholder="Nombre"><br>
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