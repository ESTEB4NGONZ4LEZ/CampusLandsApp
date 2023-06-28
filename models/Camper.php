<?php

    namespace Models;

    class Camper{
        protected static $conn;
        private $idCamper;
        private $nombreCamper;
        private $apellidoCamper;
        private $fechaNac;
        private $idReg;
        
        public function __construct($args = []){
            $this -> idCamper = $args['idCamper'] ?? '';
            $this -> nombreCamper = $args['nombreCamper'] ?? '';
            $this -> apellidoCamper = $args['apellidoCamper'] ?? '';
            $this -> fechaNac = $args['fechaNac'] ?? '';
            $this -> idReg = $args['idReg'] ?? '';
        }

        public static function setConn($connDb){
            self::$conn = $connDb;
        }

        public function getRegiones(){
            $statement = self::$conn -> query("SELECT * FROM region");
            return $statement -> fetchAll();
        }

         public function addCamper($nombreCamper, $apellidoCamper, $fechaNac, $idReg){
            $statement = self::$conn -> prepare("INSERT INTO campers (nombreCamper, apellidoCamper, fechaNac, idReg) VALUES (:nombreCamper, :apellidoCamper, :fechaNac, :idReg)");
            $statement -> execute([
                ':nombreCamper' => $nombreCamper,
                ':apellidoCamper' => $apellidoCamper,
                ':fechaNac' => $fechaNac,
                ':idReg' => $idReg
            ]);
        }

        public function getCampers(){
            $statement = self::$conn -> query("SELECT * FROM campers");
            return $statement -> fetchAll();
        }

        public function getCamper($idCamper){
            $statement = self::$conn -> prepare("SELECT * FROM campers WHERE idCamper = :idCamper");
            $statement -> execute([':idCamper' => $idCamper]);
            return $statement -> fetch();
        }

        public function deleteCamper($idCamper){
            $statement = self::$conn -> prepare("DELETE FROM campers WHERE idCamper = :idCamper");
            $statement -> execute([':idCamper' => $idCamper]);
        }

        public function editCamper($nombreCamper, $apellidoCamper, $fechaNac, $idReg, $idCamper){
            $statement = self::$conn -> prepare("UPDATE campers SET nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper, fechaNac = :fechaNac, idReg = :idReg WHERE idCamper = :idCamper");
            $statement -> execute([
                ':nombreCamper' => $nombreCamper,
                ':apellidoCamper' => $apellidoCamper,
                ':fechaNac' => $fechaNac,
                ':idReg' => $idReg,
                ':idCamper' => $idCamper
            ]);
        }
    }

?>