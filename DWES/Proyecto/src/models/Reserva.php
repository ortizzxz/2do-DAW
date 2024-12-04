<?php
namespace Models;

class Reserva {
    private $id;
    private $usuario_id;
    private $butaca_id;
    private $fecha_reserva;

    public function __construct($usuario_id, $butaca_id) {
        $this->usuario_id = $usuario_id;
        $this->butaca_id = $butaca_id;
        $this->fecha_reserva = date('Y-m-d H:i:s');
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getButacaId() {
        return $this->butaca_id;
    }

    public function getFechaReserva() {
        return $this->fecha_reserva;
    }
}