<?php

namespace Services;

use Repositories\ButacaRepository;
use Repositories\ReservaRepository;

class ReservaService
{
    private ButacaRepository $butacaRepository;
    private ReservaRepository $reservaRepository;

    public function __construct()
    {
        $this->butacaRepository = new ButacaRepository(); // Maneja operaciones relacionadas con las butacas
        $this->reservaRepository = new ReservaRepository(); // Maneja operaciones relacionadas con las reservas
    }

    // ==============================
    // Métodos para gestionar butacas
    // ==============================

    /**
     * Obtiene todas las butacas disponibles.
     *
     * @return array Lista de butacas.
     */
    public function obtenerButacas(): array
    {
        return $this->butacaRepository->obtenerButacas();
    }

    /**
     * Reserva una butaca para un usuario.
     *
     * @param int $butacaId ID de la butaca a reservar.
     * @param int $userId ID del usuario que realiza la reserva.
     * @return bool True si la reserva fue exitosa, false en caso contrario.
     */
    public function reservarButaca(int $butacaId, int $userId): bool
    {
        $reservasActuales = $this->obtenerReservasUsuario($userId);
        if (count($reservasActuales) >= 5) {
            return false; // Rechazar la reserva si ya tiene 5 butacas reservadas
        }

        return $this->butacaRepository->reservarButaca($butacaId, $userId);
    }


    // ==============================
    // Métodos para gestionar reservas
    // ==============================

    /**
     * Devuelve una butaca reservada por un usuario.
     *
     * @param int $butacaId ID de la butaca a devolver.
     * @param int $userId ID del usuario que devuelve la butaca.
     * @return bool True si la devolución fue exitosa, false en caso contrario.
     */
    public function devolverButaca(int $butacaId, int $userId): bool
    {
        return $this->reservaRepository->devolverButaca($butacaId, $userId);
    }

    /**
     * Obtiene todas las reservas realizadas por un usuario.
     *
     * @param int $userId ID del usuario.
     * @return array Lista de reservas del usuario.
     */
    public function obtenerReservasUsuario(int $userId): array
    {
        return $this->reservaRepository->obtenerReservasUsuario($userId);
    }
}
