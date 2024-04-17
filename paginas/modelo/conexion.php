<?php
    //Crear una clase conexion
    class Conexion {
        //Atributos para la conexion
        private $usuario = "root";
        private $password = "";
        private $servidor = "localhost";
        private $base = "InnovaTech";

        //Metodo para conectar la BD
        public function Conectar() {
            //Iniciar el controlador de errores
            try {
                $cnx = new PDO("mysql:host=$this->servidor; dbname=$this->base;",
                                $this->usuario, $this->password);
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Retornar la conexion
                return $cnx;
            } catch (PDOException $ex) {
                echo "Hubo un error: ".$ex->getMessage();
            }
        }
    }