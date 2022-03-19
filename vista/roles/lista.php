<table id="tbl_roles" class="table  table-responsive">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objRoles->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['descripcion'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal" onclick="editarRol('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger"  onclick="eliminarRol('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#tbl_roles').DataTable();
} );
</script>