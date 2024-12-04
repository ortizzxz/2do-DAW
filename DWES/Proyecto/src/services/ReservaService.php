<?php
namespace Services;

use Models\Reserva;
use Repositories\ReservaRepository;
use Repositories\ButacaRepository;

class ReservaService {
    private $reservaRepository;
    private $butacaRepository;

    public function __construct() {
        $this->reservaRepository = new ReservaRepository();
        $this->butacaRepository = new ButacaRepository();
    }

    public function crearReserva($usuario_id, $butaca_id) {
        $butaca = $this->butacaRepository->findById($butaca_id);
        if ($butaca && $butaca['estado'] === 'libre') {
            $reserva = new Reserva($usuario_id, $butaca_id);
            $this->reservaRepository->save($reserva);
            $this->butacaRepository->actualizarEstado($butaca_id, 'ocupada');
            return true;
        }
        return false;
    }

    public function obtenerReservasUsuario($usuario_id) {
        return $this->reservaRepository->findByUsuario($usuario_id);
    }

    public function cancelarReserva($reserva_id, $usuario_id) {
        $reserva = $this->reservaRepository->findById($reserva_id);
        if ($reserva && $reserva['usuario_id'] === $usuario_id) {
            $this->reservaRepository->delete($reserva_id);
            $this->butacaRepository->actualizarEstado($reserva['butaca_id'], 'libre');
            return true;
        }
        return false;
    }
}