<?php

namespace Services;

use Repositories\ButacaRepository;

class ButacaService
{
    private ButacaRepository $repository;

    public function __construct()
    {
        $this->repository = new ButacaRepository();
    }

    /**
     * Obtiene todas las butacas disponibles.
     *
     * @return array Lista de butacas.
     */
    public function obtenerButacas(): array
    {
        return $this->repository->obtenerButacas();
    }

    /**
     * Obtiene todas las reservas de un usuario.
     *
     * @param int $userId ID del usuario.
     * @return array Lista de reservas del usuario.
     */
    public function obtenerReservasUsuario(int $userId): array
    {
        return $this->repository->obtenerReservasUsuario($userId);
    }

    /**
     * Reserva una butaca para un usuario, verificando que no exceda el límite permitido.
     *
     * @param int $butacaId ID de la butaca a reservar.
     * @param int $userId ID del usuario que realiza la reserva.
     * @return bool True si se realiza la reserva correctamente, False en caso contrario.
     */
    public function reservarButaca(int $butacaId, int $userId): bool
    {
        // Verificar si el usuario ya tiene 5 reservas activas
        if ($this->repository->contarReservas($userId) >= 5) {
            return false; // No se permite reservar más de 5 butacas por usuario
        }

        return $this->repository->reservarButaca($butacaId, $userId);
    }

    /**
     * Devuelve una butaca previamente reservada por un usuario.
     *
     * @param int $butacaId ID de la butaca a devolver.
     * @param int $userId ID del usuario que realiza la devolución.
     * @return bool True si la devolución se realiza correctamente, False en caso contrario.
     */
    public function devolverButaca(int $butacaId, int $userId): bool
    {
        return $this->repository->devolverButaca($butacaId, $userId);
    }

    /**
     * Obtiene las reservas detalladas de un usuario.
     *
     * @param int $userId ID del usuario.
     * @return array Detalles de las reservas del usuario.
     */
    public function obtenerReservasUsuarioDetalladas(int $userId): array
    {
        return $this->repository->obtenerReservasUsuarioDetalladas($userId);
    }
}
