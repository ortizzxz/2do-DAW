<?php

namespace Repositories;

use Lib\BaseDatos;
use PDO;
use Exception;

class ButacaRepository
{
    private BaseDatos $conexion;

    public function __construct()
    {
        $this->conexion = new BaseDatos();
    }

    /**
     * Obtiene todas las butacas disponibles.
     *
     * @return array Lista de todas las butacas.
     */
    public function obtenerButacas(): array
    {
        $sql = "SELECT * FROM butaca ORDER BY fila, numero";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Se puede cambiar por PDO::FETCH_CLASS si se prefiere trabajar con objetos
    }

    /**
     * Obtiene las reservas de un usuario específico.
     *
     * @param int $userId ID del usuario.
     * @return array Lista de reservas del usuario.
     */
    public function obtenerReservasUsuario(int $userId): array
    {
        $sql = "SELECT r.id AS reserva_id, b.id AS butaca_id, b.fila, b.numero, b.estado 
                FROM reserva r 
                JOIN butaca b ON r.butaca_id = b.id 
                WHERE r.usuario_id = :userId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return ($stmt->rowCount() === 0) ? [] : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Cuenta las reservas de un usuario.
     *
     * @param int $userId ID del usuario.
     * @return int Número de reservas del usuario.
     */
    public function contarReservas(int $userId): int
    {
        $sql = "SELECT COUNT(*) FROM reserva WHERE usuario_id = :userId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

    /**
     * Realiza una reserva de una butaca para un usuario.
     *
     * @param int $butacaId ID de la butaca.
     * @param int $userId ID del usuario.
     * @return bool True si se realizó correctamente la reserva, False en caso contrario.
     */
    public function reservarButaca(int $butacaId, int $userId): bool
    {
        try {
            $this->conexion->beginTransaction();

            // Verificar cuántas reservas tiene el usuario
            if ($this->contarReservas($userId) >= 5) {
                throw new Exception("El usuario ya tiene el máximo de 5 reservas permitidas.");
            }

            // Actualizar el estado de la butaca a "ocupada"
            $sql = "UPDATE butaca SET estado = 'ocupada' WHERE id = :butacaId AND estado = 'libre'";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            if (!$stmt->execute() || !$stmt->rowCount()) {
                throw new Exception("La butaca no está disponible.");
            }

            // Registrar la reserva
            $sql = "INSERT INTO reserva (usuario_id, butaca_id) VALUES (:userId, :butacaId)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("No se pudo registrar la reserva.");
            }

            $this->conexion->commit();
            return true;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Devuelve una butaca previamente reservada.
     *
     * @param int $butacaId ID de la butaca.
     * @param int $userId ID del usuario.
     * @return bool True si la devolución se realiza correctamente, False en caso contrario.
     */
    public function devolverButaca(int $butacaId, int $userId): bool
    {
        try {
            $this->conexion->beginTransaction();

            // Verificar si la butaca pertenece al usuario
            $sql = "SELECT id FROM reserva WHERE butaca_id = :butacaId AND usuario_id = :userId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            if (!$stmt->fetch()) {
                throw new Exception("Esta butaca no pertenece al usuario.");
            }

            // Actualizar estado de la butaca a 'libre'
            $sql = "UPDATE butaca SET estado = 'libre' WHERE id = :butacaId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("No se pudo actualizar el estado de la butaca.");
            }

            // Eliminar la reserva
            $sql = "DELETE FROM reserva WHERE butaca_id = :butacaId AND usuario_id = :userId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("No se pudo eliminar la reserva.");
            }

            $this->conexion->commit();
            return true;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Obtiene detalles de las reservas de un usuario.
     *
     * @param int $userId ID del usuario.
     * @return array Detalles de las reservas del usuario.
     */
    public function obtenerReservasUsuarioDetalladas(int $userId): array
    {
        $sql = "SELECT r.id, b.fila, b.numero, b.estado, r.fecha_reserva
                FROM reserva r 
                JOIN butaca b ON r.butaca_id = b.id 
                WHERE r.usuario_id = :userId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
