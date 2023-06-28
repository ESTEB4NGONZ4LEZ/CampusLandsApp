<?php

    namespace Models;

    class Pais{
        protected static $conn;
        private $idPais;
        private $nombrePais;
        
        public function __construct($args = []){
            $this -> idPais = $args['idPais'] ?? '';
            $this -> nombrePais = $args['nombrePais'] ?? '';
        }

        public static function setConn($connDb){
            self::$conn = $connDb;
        }

        public function addPais($nombrePais){
            $statement = self::$conn -> prepare("INSERT INTO pais (nombrePais) VALUES (:nombrePais)");
            $statement -> execute([':nombrePais' => $nombrePais]);
        }

        public function getPaises(){
            $statement = self::$conn -> query("SELECT * FROM pais");
            return $statement -> fetchAll();
        }

        public function getPais($idPais){
            $statement = self::$conn -> prepare("SELECT * FROM pais WHERE idPais = :idPais");
            $statement -> execute([':idPais' => $idPais]);
            return $statement -> fetch();
        }

        public function deletePais($idPais){
            $statement = self::$conn -> prepare("DELETE FROM pais WHERE idPais = :idPais");
            $statement -> execute([':idPais' => $idPais]);
        }

        public function editPais($nombrePais, $idPais){
            $statement = self::$conn -> prepare("UPDATE pais SET nombrePais = :nombrePais WHERE idPais = :idPais");
            $statement -> execute([
                ':nombrePais' => $nombrePais,
                ':idPais' => $idPais
            ]);
        }
        
    }

?>