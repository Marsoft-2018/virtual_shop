<?php
    class Modelo_Usuarios extends conexion {
        public $email;
        public $nombreUsuario;
        public $clave;
        public $idRol;
        public $primerNombre;
        public $segundoNombre;
        public $primerApellido;
        public $segundoApellido;
        public $TipoDoc;
        public $numerodoc;
        public $foto;
        public $ciudad;
        public $direccion;
        public $telefono;
        public $estado;
        public $fechaRegistro;
        private $sql;
        private $datos;
        
        function listar() {
            $sql = "SELECT
                    `us`.`email`     , `us`.`nombreUsuario`, `us`.`clave`
                    , `us`.`idRol`    , `r`.`nombre`
                    , `us`.`primerNombre`    , `us`.`segundoNombre`
                    , `us`.`primerApellido`    , `us`.`segundoApellido`
                    , `us`.`TipoDoc`    , `us`.`numerodoc`
                    , `us`.`foto`    , `us`.`ciudad`
                    , `us`.`direccion`    , `us`.`telefono`
                    , `us`.`estado`    , `us`.`fechaRegistro`
                FROM
                    `usuarios` AS `us`
                    INNER JOIN `roles` AS `r`  ON (`us`.`idRol` = `r`.`id`)
                    ORDER BY us.`primerNombre` ASC";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;                    
                }
                $this->conexion->close();
                return $arreglo;
            }
        }

        function cargar(){
            $sql = "SELECT
                    `us`.`email`     , `us`.`nombreUsuario`, `us`.`clave`
                    , `us`.`idRol`    , `r`.`nombre`
                    , `us`.`primerNombre`    , `us`.`segundoNombre`
                    , `us`.`primerApellido`    , `us`.`segundoApellido`
                    , `us`.`TipoDoc`    , `us`.`numerodoc`
                    , `us`.`foto`    , `us`.`ciudad`
                    , `us`.`direccion`    , `us`.`telefono`
                    , `us`.`estado`    , `us`.`fechaRegistro`
                FROM
                    `usuarios` AS `us`
                    INNER JOIN `roles` AS `r`  ON (`us`.`idRol` = `r`.`id`)
                      WHERE us.`email` = '$this->email'";
            $arreglo = array();
            if($consulta = $this->conexion->query($sql)){
                while($consulta_vu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] =$consulta_vu;				
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function agregar() {
            $this->sql = "INSERT INTO usuarios(email, nombreUsuario, clave, idRol, primerNombre, segundoNombre, primerApellido, segundoApellido, TipoDoc, numerodoc, foto,ciudad,direccion,telefono) VALUES('".$this->email."', '".$this->nombreUsuario."', '".$this->clave."', '".$this->idRol."', '".$this->primerNombre."', '".$this->segundoNombre."', '".$this->primerApellido."', '".$this->segundoApellido."', '".$this->TipoDoc."', '".$this->numerodoc."', '".$this->foto."','".$this->ciudad."','".$this->direccion."','".$this->telefono."')";

            if($consulta = $this->conexion->query($this->sql)){
                echo "Registro agregado con éxito";
                //$this->conexion->cerrar();
                
            } else {
                    echo "Registro no agregado";
            } 
            //     $stmt = $this->conexion->prepare($this->sql);
            //     $stmt->bind_param($this->id, $this->nombre, $this->referencia, $this->descripcion, $this->precioCompra, $this->precioVenta, $this->cantidadInicial, $this->cantidadMinima, $this->idCategoria, $this->idUnidad, $this->imagen);

            //     $stmt->execute();
            //     if($stmt->execute()){
            //         echo "Registro agregado con éxito";
            //         printf("%d Fila insertada.\n", $stmt->affected_rows);                
            //     } else {
            //         printf("Error: %s.\n", mysqli_stmt_error($th));
            //         echo "Registro no agregado";
            //     }
             
            // $stmt->close();
        }
        
        function modificar() {
            $this->sql = "UPDATE usuarios SET nombreUsuario = '".$this->nombreUsuario."', referencia = '".$this->referencia."', descripcion = '".$this->descripcion."', precioCompra = '".$this->precioCompra."', precioVenta = '".$this->precioVenta."', cantidadInicial = '".$this->cantidadInicial."', cantidadMinima = '".$this->cantidadMinima."', idCategoria = '".$this->idCategoria."', idUnidad = '".$this->idUnidad."', imagen = '".$this->imagen."' WHERE email = '".$this->email."'";
            if($consulta = $this->conexion->query($this->sql)){
                echo "Registro guardado con éxito";
                //$this->conexion->cerrar();                
            } else {
                    echo "Registro no modificado";
            } 
        }
                
        function eliminar() {
            $this->sql = "DELETE FROM usuarios WHERE email = '".$this->email."'";
            if($consulta = $this->conexion->query($this->sql)){
                echo "Registro eliminado con éxito";
                //$this->conexion->cerrar();                
            } else {
                echo "Registro no eliminado";
            } 
        }
    }
       
?>