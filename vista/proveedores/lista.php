<table id="tbl_proveedores" class="table  table-responsive">
    <thead>
        <tr>
            <th>NIT/CEDULA</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objProveedor->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['direccion'] ?></td>
                <td><?php echo $value['telefono'] ?></td>
                <td><?php echo $value['ciudad'] ?></td>
                <td><?php echo $value['correo'] ?></td>
                <td><?php echo $value['estado'] ?></td>
                <td><?php echo $value['fecha_reg'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal" onclick="editarProveedor('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger"  onclick="eliminarProveedor('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    $('#tbl_proveedores').DataTable();
} );
</script>