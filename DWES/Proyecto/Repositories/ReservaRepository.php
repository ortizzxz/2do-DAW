<?php

namespace Repositories;

use Lib\BaseDatos;
use PDO;
use Exception;

class ReservaRepository 
{
    private BaseDatos $conexion;

    public function __construct() 
    {
        $this->conexion = new BaseDatos();
    }

    /**
     * Obtiene todas las reservas realizadas por un usuario.
     *
     * @param int $userId ID del usuario.
     * @return array Lista de reservas del usuario.
     */
    public function obtenerReservasUsuario(int $userId): array 
    {
        try {
            $sql = "SELECT r.id AS reserva_id, 
                           b.id AS butaca_id, 
                           b.fila, 
                           b.numero, 
                           r.fecha_reserva 
                    FROM reserva r
                    INNER JOIN butaca b ON r.butaca_id = b.id
                    WHERE r.usuario_id = :userId";

            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            // Registrar error en el log para depuración
            error_log("Error al obtener reservas del usuario $userId: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Devuelve una butaca reservada por un usuario.
     *
     * @param int $butacaId ID de la butaca a devolver.
     * @param int $userId ID del usuario que devuelve la butaca.
     * @return bool True si la operación fue exitosa, false en caso de error.
     */
    public function devolverButaca(int $butacaId, int $userId): bool 
    {
        try {
            // Iniciar una transacción
            $this->conexion->beginTransaction();

            // Verificar si la butaca pertenece al usuario
            $sql = "SELECT id FROM reserva WHERE butaca_id = :butacaId AND usuario_id = :userId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            if (!$stmt->fetch()) {
                throw new Exception("La butaca no pertenece al usuario.");
            }

            // Actualizar estado de la butaca a 'libre'
            $sql = "UPDATE butaca SET estado = 'libre' WHERE id = :butacaId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("No se pudo actualizar el estado de la butaca.");
            }

            // Eliminar la reserva del usuario
            $sql = "DELETE FROM reserva WHERE butaca_id = :butacaId AND usuario_id = :userId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':butacaId', $butacaId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("No se pudo eliminar la reserva.");
            }

            // Confirmar transacción
            $this->conexion->commit();
            return true;

        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            if ($this->conexion) {
                $this->conexion->rollBack();
            }
            // Registrar el error para depuración
            error_log("Error al devolver butaca: " . $e->getMessage());
            return false;
        }
    }
}
