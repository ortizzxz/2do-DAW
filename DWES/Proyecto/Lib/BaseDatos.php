<?php

namespace Lib;

use PDO;
use PDOException;
use PDOStatement;

class BaseDatos
{
    private PDO $conexion;
    private PDOStatement $stmt;

    public function __construct(
        private $tipo_de_base = 'mysql',
        private string $servidor = SERVERNAME,
        private string $usuario = USERNAME,
        private string $pass = PASSWORD,
        private string $base_datos = DATABASE
    ) {
        $this->conexion = $this->conectar();
    }

    private function conectar(): PDO
    {
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            );

            $conexion = new PDO("mysql:host={$this->servidor};dbname={$this->base_datos}", $this->usuario, $this->pass, $opciones);
            // Establecer el modo de error a excepción
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Ha surgido un error y no se puede conectar a la base de datos. Detalle: " . $e->getMessage();
            exit;
        }
    }

    public function consulta(string $consultaSQL): void
    {
        $this->stmt = $this->conexion->query($consultaSQL);
    }

    public function prepare(string $sql): PDOStatement
    {
        $this->stmt = $this->conexion->prepare($sql);
        return $this->stmt;
    }

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function extraer_registro(): mixed
    {
        return ($fila = $this->stmt->fetch(PDO::FETCH_ASSOC)) ? $fila : false;
    }

    public function extraer_todos(): array
    {
        if (!isset($this->stmt)) {
            return [];
        }
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Métodos para manejar transacciones
    public function beginTransaction(): bool
    {
        return $this->conexion->beginTransaction();
    }

    public function commit(): bool
    {
        return $this->conexion->commit();
    }

    public function rollBack(): bool
    {
        return $this->conexion->rollBack();
    }
}