<?php
namespace Models;

class Butaca {
    private $id;
    private $fila;
    private $numero;
    private $estado;

    public function __construct($fila, $numero, $estado = 'libre') {
        $this->fila = $fila;
        $this->numero = $numero;
        $this->estado = $estado;
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFila() {
        return $this->fila;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}