<table id="tbl_unidades" class="table  table-responsive">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objUnidades->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['descripcion'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal" onclick="editarUnidades('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger"  onclick="eliminarUnidades('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#tbl_unidades').DataTable();
} );
</script>