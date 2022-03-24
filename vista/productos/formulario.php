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
            $referencia = $producto['referencia'];
            $descripcion = $producto['descripcion'];
            $precioCompra = $producto['precioCompra'];
            $precioVenta = $producto['precioVenta'];
            $cantidadInicial = $producto['cantidadInicial'];
            $compras = $producto['compras'];
            $ventas = $producto['ventas'];
            $devoluciones = $producto['devoluciones'];
           
            $existencias = $producto['existencias'];
            $cantidadMinima = $producto['cantidadMinima'];
            $imagen = $producto['imagen'];
            $categoria = $producto['categoria'];
            $unidad = $producto['unidad'];
            $funcionBoton = "modificarProducto('".$id."')";
        }
    }
?>
<div>
    <h3>Formulario para Productos</h3>
    <div class="row">
    <div class="col-lg-6">
            <label for=""><b>Codigo:</b></label>
                <input type="text" id="id" value="<?php echo $id; ?>" class="form-control" placeholder="Nombre del producto"><br>
            </div>
        <div class="col-lg-6">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre del producto"><br>
            </div>
            <div class="col-lg-3">
            <label for=""><b>Referencia:</b></label>
                <input type="text" id="referencia" value="<?php echo $referencia; ?>" class="form-control" placeholder="Nombre del producto"><br>
            </div>
        <div class="col-lg-12">
            <label for=""><b>Descripcion:</b></label>
            <input type="text" id="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Precio Compra:</b></label>
            <input type="number" id="precioCompra" value="<?php echo $precioCompra; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Precio Venta:</b></label>
            <input type="number" id="precioVenta" value="<?php echo $precioVenta; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Cantidad Inicial:</b></label>
            <input type="number" id="cantidadInicial" value="<?php echo $cantidadInicial; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Compras:</b></label>
            <input type="number" id="compras" value="<?php echo $compras; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Ventas:</b></label>
            <input type="number" id="ventas" value="<?php echo $ventas; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Devoluciones:</b></label>
            <input type="number" id="devoluciones" value="<?php echo $devoluciones; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Existencias:</b></label>
            <input type="number" id="existencias" value="<?php echo $existencias; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Cantidad Minima:</b></label>
            <input type="number" id="cantidadMinima" value="<?php echo $cantidadMinima; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Categoria</b></label>
            <select class="js-example-basic-single"
             name="state" style="width: 100%;" id="categoria">
                <option value="">Seleccione...</option>
                <?php
                    foreach ($objCategoria->listar() as $value) {
                        $sel = "";
                        if($idCategoria == $value['id'] ){ $sel = "selected"; }
                        ?>
                        <option value="<?php echo $value['id']; ?>" <?php echo $sel ?>><?php echo $value['nombre'] ?></option>
                    <?php } ?>   
            </select>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Medida</b></label>
            <select class="js-example-basic-single"
             name="state" style="width: 100%;" id="medida">
                <option value="">Seleccione...</option>
                <?php
                    foreach ($objMedida->listar() as $value) {
                        $sel = "";
                        if($idMedida == $value['id'] ){ $sel = "selected"; }
                        ?>
                        <option value="<?php echo $value['id']; ?>" <?php echo $sel ?>><?php echo $value['nombre'] ?></option>
                    <?php } ?>   
            </select>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Imagen:</b></label>
            <input type="file" id="imagen" value="<?php echo $imagen; ?>" class="form-control" placeholder="Nombre"><br>
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