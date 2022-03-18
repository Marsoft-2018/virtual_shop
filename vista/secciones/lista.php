<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($objSeccion->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['descripcion'] ?></td>
                <td>
                    <button class="btn btn-warning" onclick="modificarSeccion('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger" onclick="eliminarSeccion('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>