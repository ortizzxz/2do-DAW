<?php
namespace Models;

use Lib\BaseDatos;

class Reserva
{
    private BaseDatos $conexion;
    private mixed $stmt;

    function __construct(
        private string|null $id = null,
        private string|null $usuario_id = null,
        private string|null $butaca_id = null,
        private string $fecha_reserva = ''
    ) {
        $this->conexion = new BaseDatos();
    }

    public static function fromArray(array $data): Reserva
    {
        return new Reserva(
            $data['id'] ?? '',
            $data['usuario_id'] ?? '',
            $data['butaca_id'] ?? '',
            $data['fecha_reserva'] ?? ''
        );
    }

}
