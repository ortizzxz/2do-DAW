<?php
namespace Controllers;

use Services\ReservaService;
use Services\ButacaService;
use Lib\Pages;

class ReservaController {
    private $reservaService;
    private $butacaService;
    private $pages;

    public function __construct() {
        $this->reservaService = new ReservaService();
        $this->butacaService = new ButacaService();
        $this->pages = new Pages();
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            return;
        }
        $reservas = $this->reservaService->obtenerReservasUsuario($_SESSION['user_id']);
        $this->pages->render('reservas/index', ['reservas' => $reservas]);
    }

    public function crear() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $butaca_id = $_POST['butaca_id'];
            if ($this->reservaService->crearReserva($_SESSION['user_id'], $butaca_id)) {
                header('Location: /reservas');
            } else {
                $this->pages->render('reservas/crear', ['error' => 'No se pudo realizar la reserva']);
            }
        } else {
            $butacas_libres = $this->butacaService->obtenerButacasLibres();
            $this->pages->render('reservas/crear', ['butacas' => $butacas_libres]);
        }
    }

    public function cancelar($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            return;
        }
        if ($this->reservaService->cancelarReserva($id, $_SESSION['user_id'])) {
            header('Location: /reservas');
        } else {
            $this->pages->render('reservas/index', ['error' => 'No se pudo cancelar la reserva']);
        }
    }
}