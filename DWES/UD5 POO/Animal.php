<?php
class Animal{
    private $nombre;
    private $familia;

    public function __construct($nombre = "Desconocido", $familia = "N/A"){
        $this->nombre = $nombre;
        $this->familia = $familia;
    }

    public function saludo(){
        return "Hola, soy un animal de raza " . $this->nombre;
    }
}
?>