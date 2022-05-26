<?php
    $email = "";
    $nombreUsuario = "";
    $clave = "";
    $idRol = "";
    $primerNombre = "";
    $segundoNombre = "";
    $primerApellido = "";
    $segundoApellido = "";
    $TipoDoc = "";
    $numerodoc = "";
    $ciudad = "";
    $direccion = "";
    $telefono = "";
    
    $funcionBoton = "agregarUsuario()";
    if(isset($_REQUEST['email'])){
        $objUsuarios->email = $_REQUEST['email'];
        foreach ($objUsuarios->cargar() as $usuario) {
            $email = $usuario['email'];
            
            $nombreUsuario = $usuario['nombreUsuario'];
            $clave = $usuario['clave'];
            $idRol = $usuario['idRol'];
            $primerNombre = $usuario['primerNombre'];
            $segundoNombre = $usuario['segundoNombre'];
            $primerApellido = $usuario['primerApellido'];
            $segundoApellido = $usuario['segundoApellido'];
            $TipoDoc = $usuario['TipoDoc'];
            $numerodoc = $usuario['numerodoc'];
            $foto = $usuario['foto'];
            $ciudad = $usuario['ciudad'];
           
            $direccion = $usuario['direccion'];
            $telefono = $usuario['telefono'];
           
           
         
            $funcionBoton = "modificarUsuario('".$email."')";
        }
    }
?>
<div>    
    <h3>Formulario para usuarios</h3>
    <div class="row">
    <div class="col-lg-6">
            <label for=""><b>Correo:</b></label>
                <input type="text" id="email" value="<?php echo $email; ?>" class="form-control" placeholder="Nombre del usuario"><br>
            </div>
        <div class="col-lg-6">
            <label for=""><b>Nombre:</b></label>
                <input type="text" id="nombreUsuario" value="<?php echo $nombreUsuario; ?>" class="form-control" placeholder="Nombre del usuario"><br>
            </div>
            <div class="col-lg-6">
            <label for=""><b>Clave:</b></label>
                <input type="text" id="clave" value="<?php echo $clave; ?>" class="form-control" placeholder="Clave"><br>
            </div>
               <div class="col-lg-6">
            <label for=""><b>Rol</b></label>
            <select class="form form-control js-example-basic-single"
             name="state" style="width: 100%;" id="idRol">
                <option value="">Seleccione...</option>
                <?php
                    $objRoles = new Modelo_Roles();
                    foreach ($objRoles->listar() as $value) {
                        $sel = "";
                        if($objRoles == $value['id'] ){ $sel = "selected"; }
                        ?>
                        <option value="<?php echo $value['id']; ?>" <?php echo $sel ?>><?php echo $value['nombre'] ?></option>
                    <?php } ?>   
            </select>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Primer Nombre:</b></label>
            <input type="text" id="primerNombre" value="<?php echo $primerNombre; ?>" class="form-control" placeholder="primer Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Segundo Nombre:</b></label>
            <input type="text" id="segundoNombre" value="<?php echo $segundoNombre; ?>" class="form-control" placeholder="Nombre"><br>
        </div>

         <div class="col-lg-6">
            <label for=""><b>Primer Apellido:</b></label>
            <input type="text" id="primerApellido" value="<?php echo $primerApellido; ?>" class="form-control" placeholder="primer Nombre"><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Segundo Apellido:</b></label>
            <input type="text" id="segundoApellido" value="<?php echo $segundoApellido; ?>" class="form-control" placeholder="Nombre"><br>
        </div>
         <div class="col-lg-6">
            <label for=""><b>Tipo Documento</b> </label>
                <select class="form form-control js-example-basic-single" name="state"
                        style="width: 100%;" id="TipoDoc"> 
                    <option value="CC">Cedula</option>
                    <option value="TI">Tarjeta Identidad</option>
                    <option value="DE">Cedula Extrangeria</option>
                    <option value="PP">Pasaporte</option>
                        </select> <br> <br>
            </div>
             <div class="col-lg-6">
            <label for=""><b>Documento:</b></label>
            <input type="text" id="numerodoc" value="<?php echo $numerodoc; ?>" class="form-control" placeholder="Documento"><br>
        </div>        
        <div class="col-lg-4">
            <label for=""><b>Pais:</b></label>
            <select name="" id="pais"  class="form-control" onchange="cargarDepartamentos(this.value)">
                <option value="">Seleccione...</option>
                <?php
                    foreach ($objPaises->cargar() as $pais) { ?>
                     <option value="<?php echo $pais['id'] ?>"><?php echo $pais['nombre'] ?></option>   
                <?php 
                   } 
                ?>
            </select>
        </div>                
        <div class="col-lg-4">
            <label for=""><b>Departamento:</b></label>
            <select name="" id="departamentos"  class="form-control"  onchange="cargarCiudades(this.value)">
                <option value="">Seleccione...</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for=""><b>Ciudad:</b></label>
            <select name="" id="ciudad"  class="form-control">
                <option value="">Seleccione...</option>
            </select>
        </div>

         <div class="col-lg-6">
            <label for=""><b>Direccion:</b></label>
            <input type="text" id="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder=""><br>
        </div>
        <div class="col-lg-6">
            <label for=""><b>Telefono:</b></label>
            <input type="text" id="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder=""><br>
        </div>

        
    </div>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     <button type="button"  class="btn btn-primary" onclick="<?php echo $funcionBoton?>">Guardar</button>
    
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>