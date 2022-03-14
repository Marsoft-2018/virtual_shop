<table>
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
        foreach ($objCategoria->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['descripcion'] ?></td>
                <td>
                    <button class="btn btn-warning" onclick="editarCategoria('<?php echo $value['id'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger" onclick="eliminarCategoria('<?php echo $value['id'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>