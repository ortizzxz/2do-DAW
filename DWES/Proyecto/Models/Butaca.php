<?php

namespace Models;
use Lib\BaseDatos;
class Butaca
{
    private BaseDatos $conexion;
    private mixed $stmt;

    public function __construct(
        private string $id = '',
        private string $fila = '',
        private string $numero = '',
        private string $estado = ''
    ) {
        $this->conexion = new BaseDatos();
    }

    // Métodos getter
    public function getId()
    {
        return $this->id;
    }

    public function getFila()
    {
        return $this->fila;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getEstado()
    {
        return $this->estado;
    }

 public static function fromArray(array $data): Butaca
    {
        return new Butaca(
            $data['id'] ?? '',
            $data['fila'] ?? '',
            $data['numero'] ?? '',
            $data['estado'] ?? '',
        );
    }}
