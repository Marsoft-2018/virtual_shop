<table id="tbl_usuarios" class="table  table-responsive">
    <thead>
        <tr>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>1er Nombre</th>
            <th>2do Nombre</th>
            <th>1er Apellido</th>
            <th>2do Apellido</th>
            <th>Tipo Doc</th>
            <th>Numero</th>
            <th>Foto</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th></th>
        </tr>
    </thead>
    <tbody>



       <?php 
        foreach ($objUsuarios->listar() as $value) {
            ?>
            <tr>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['nombreUsuario'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['primerNombre'] ?></td>
                <td><?php echo $value['segundoNombre'] ?></td>
                <td><?php echo $value['primerApellido'] ?></td>
                <td><?php echo $value['segundoApellido'] ?></td>
                <td><?php echo $value['TipoDoc'] ?></td>
                <td><?php echo $value['numerodoc'] ?></td>
                <td><img src="../images/usuarios/<?php  echo $value['foto']?>" class="img-circle  img-fluid" ></td>
                <td><?php echo $value['ciudad'] ?></td>
                <td><?php echo $value['direccion'] ?></td>
                <td><?php echo $value['telefono'] ?></td>
              
                
                <td><?php     echo $value['estado'] ?></td>
                <td><?php echo $value['fechaRegistro'] ?></td>
                <td>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#ventana_modal"  onclick="editarUsuario('<?php echo $value['email'] ?>')">
                        editar
                    </button> 
                    <button class="btn btn-danger" onclick="eliminarUsuario('<?php echo $value['email'] ?>')"><i class="fa fa-trash"></i></button>   
                </td>
            </tr>
            <?php
        }?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    $('#tbl_usuarios').DataTable();
} );
</script>