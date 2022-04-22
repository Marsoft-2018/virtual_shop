<?php
    class Modelo_Productos extends conexion {
        public $id;
        public $nombre;
        public $referencia;
        public $descripcion;
        public $precioCompra;
        public $precioVenta;
        public $cantidadInicial;
        public $compras;
        public $ventas;
        public $devoluciones;
        public $existencias;
        public $cantidadMinima;
        public $IdNegocio;
        public $idCategoria;
        public $idUnidad;
        public $imagen;
        public $estado;
        public $fecha_reg;
        private $sql;
        private $datos;
        
        function listar() {
            $sql = "SELECT p.id,p.nombre,p.referencia,p.descripcion,
            p.precioCompra,p.precioVenta,
            p.cantidadInicial,p.compras,p.ventas,p.devoluciones,
            p.existencias,p.cantidadMinima,p.imagen,p.estado,p.fecha_reg,
            cat.nombre AS categoria, uni.nombre AS unidad
            
             FROM 
             productos AS p
              INNER JOIN `unidades` AS uni  ON (`p`.`idUnidad` = `uni`.`id`)
              INNER JOIN `categorias`  AS cat ON (`p`.`idCategoria` = `cat`.`id`)
              
              ORDER BY p.nombre ASC
              LIMIT 0,10";
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
            $sql = "SELECT * FROM `productos` WHERE `id` = '$this->id'";
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
            $this->sql = "INSERT INTO productos(IdNegocio,id, nombre, referencia, descripcion, precioCompra, precioVenta, cantidadInicial, cantidadMinima, idCategoria, idUnidad, imagen) VALUES('1','".$this->id."', '".$this->nombre."', '".$this->referencia."', '".$this->descripcion."', '".$this->precioCompra."', '".$this->precioVenta."', '".$this->cantidadInicial."', '".$this->cantidadMinima."', '".$this->idCategoria."', '".$this->idUnidad."', '".$this->imagen."')";
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
    }
       
?>