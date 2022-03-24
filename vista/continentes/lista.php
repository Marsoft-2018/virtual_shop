<table id="tbl_continentes" class="table  table-responsive">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objContinente->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
               
                <td><?php echo $value['activo'] ?></td>
                <td><?php echo $value['fecha_reg'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal" onclick="editarContinente('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger"  onclick="eliminarContinente('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    $('#tbl_continentes').DataTable();
} );
</script>