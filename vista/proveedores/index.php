<div>
    <div>
        <form action="" onsubmit="return listar_proveedores()">
          
            <button type="submit" class="btn btn-primary">Listar</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ventana_modal" onclick="nuevoProveedor()">Nuevo</button> <br><br>
        </form>
    </div>
    <div id="listaProveedores"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
     $('.js-example-basic-single').select2();
});
</script>