<?php
class Caballo extends Animal{
    private $raza;

    public function __construct($nombre = "Desconocido", $familia = "N/A", $raza = "Desconocida"){
        parent::__construct($nombre, $familia);
        $this->raza = $raza;
    }

    public function saludo(){
        return "hola soy de raza " . $this->raza;
    }
}
?>