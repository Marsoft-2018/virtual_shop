<div>
    <div>
        <form action="" onsubmit="return listar_continentes()">
          
            <button type="submit" class="btn btn-primary">Listar</button>
            <button type="button" class="btn btn-success" data-toggle="modal" 
            data-target="#ventana_modal" onclick="nuevoContinente()">Nuevo</button> <br><br>
        </form>
    </div>
    <div id="listaContinentes"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
     $('.js-example-basic-single').select2();
});
</script>