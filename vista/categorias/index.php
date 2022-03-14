<div>
    <div>
        <form action="" onsubmit="return listar_categorias()">
            <label for="">Sección</label>
            <select name="" id="cmb_seccion">
                <option value="">Seleccione..</option>
                <?php
                foreach ($objSeccion->listar() as $value) {
                    ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Listar</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ventana_modal" onclick="nuevaCategoria()">Nuevo</button>
        </form>
    </div>
    <div id="listaCategorias"></div>
</div>