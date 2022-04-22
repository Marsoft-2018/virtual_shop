<table class="table" id="tbl_productos">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Descripción</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Cant Inicial</th>
            <th>Compras</th>
            <th>Ventas</th>
            <th>Devoluciones</th>
            <th>Existencias</th>
            <th>Cant Minima</th>
            <th>Categoria</th>
            <th>Unidad</th>
            <th>Imagen</th>
            <th>Estado</th>
            <th>Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objProductos->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['referencia'] ?></td>
                <td><?php echo $value['descripcion'] ?></td>
                <td><?php echo $value['precioCompra'] ?></td>
                <td><?php echo $value['precioVenta'] ?></td>
                <td><?php echo $value['cantidadInicial'] ?></td>
                <td><?php echo $value['compras'] ?></td>
                <td><?php echo $value['ventas'] ?></td>
                <td><?php echo $value['devoluciones'] ?></td>
                <td><?php echo $value['existencias'] ?></td>
                <td><?php echo $value['cantidadMinima'] ?></td>
                <td><?php echo $value['categoria'] ?></td>
                <td><?php echo $value['unidad'] ?></td>
                <td><img src="../images/productos/<?php  echo $value['imagen']?>" class="img-circle" ></td>
                <td><?php     echo $value['estado'] ?></td>
                <td><?php echo $value['fecha_reg'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal"  onclick="editarProducto('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger" onclick="eliminarProducto('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
    $('#tbl_productos').DataTable();
} );
</script>