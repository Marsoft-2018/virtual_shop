<?php
    abstract class conexionPDO{
        private $host = "localhost";
        private $bdt = "bdt_virtualshop";        
        private $usuario= "root";
        //private $password = ""; //password xampp
        private $password = "password"; //password para linux

        private $link;
        protected $Conexion;
        public function __construct(){
            $this->link  = "mysql:host=".$this->host;
            $this->link .= ";dbname=".$this->bdt;
            try{
                $this->Conexion = new PDO($this->link, $this->usuario, $this->password);
                $this->Conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->Conexion->query("SET NAMES 'utf8';");
            }catch(PDOException $e){
                echo "No hay conexión con la base de datos";
            }
            return $this->Conexion;
        }

        public function cerrarConexion(){
            $this->Conexion = null;
        }
    }

    class conexionLi{

		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;

		public function __construct(){

		    $this->servidor = "localhost";
			$this->usuario = "root";
			//$this->contrasena = ""; //password xampp
			$this->contrasena = "password";//password para linux
			$this->basedatos = "bdt_virtualshop";
        }


		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");

        }

		function cerrar(){
			$this->conexion->close();	
		}

	}

