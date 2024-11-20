<?
    namespace Library;
    use Mysqli;

    class DataBase{
        private Mysqli $conexion;

        public function __construct(
            private string $servername,
            private string $username,
            private string $password,
            private string $database,
        ){
            $this->conexion = $this->conectar(); 
        }

        private function conectar():Mysqli{
            $conexion = new Mysqli($this->servername, $this->username, $this->password, $this->database);

            if($conexion->connect_error){
                die ('Error: ' . $conexion->connect_error);
            }
            
            return $conexion;
        }
    }
?>
