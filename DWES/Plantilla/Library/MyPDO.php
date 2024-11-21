<?php
    namespace Library;
    use PDO;
    use PDOException;

    class MyPDO extends PDO{
        private PDO $conexion;
        private mixed $resultado;

        public function __construct(
        private $tipo_de_base = 'mysql',
        private string $servidor = SERVERNAME,
        private string $usuario = USERNAME,
        private string $pass = PASSWORD,
        private string $base_datos= DATABASE) {
            try{

                $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8MB4",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
                );
                parent::__construct("{$this->tipo_de_base}:dbname={$this->base_datos}; host={$this->servidor}", $this->usuario, $this->pass, $opciones);
            
            }catch(PDOException $e){
                echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
                exit;
            }

        }
    }
?>