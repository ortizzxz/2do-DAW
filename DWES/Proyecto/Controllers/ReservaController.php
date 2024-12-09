<?php

namespace Controllers;

use Lib\Pages;
use Services\ReservaService;

class ReservaController
{
    private Pages $pages;
    private ReservaService $service;

    public function __construct()
    {
        $this->pages = new Pages();
        $this->service = new ReservaService();
    }

    // ==============================
    // Métodos para el flujo de reserva
    // ==============================

    /**
     * Renderiza el formulario para reservar butacas.
     */
    public function reservar()
    {
        $butacas = $this->service->obtenerButacas();
        $this->pages->render('reserva/form', ['butacas' => $butacas]);
    }

    /**
     * Procesa la confirmación de una reserva.
     */
    public function confirmar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $butacaId = $_POST['butaca_id'];

            // Validar si el usuario está autenticado
            if (!isset($_SESSION['user_id'])) {
                header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
                exit;
            }

            $resultado = $this->service->reservarButaca($butacaId, $_SESSION['user_id']);

            // Redirigir según el resultado de la reserva
            if ($resultado) {
                header("Location: " . BASE_URL . "?controller=Reserva&action=success");
                exit;
            } else {
                $mensajeError = "No se pudo realizar la reserva (Recuerde que solo 5 butacas son permitidas por Usuario)";
                header("Location: " . BASE_URL . "?controller=Reserva&action=error&message=" . urlencode($mensajeError));
                exit;
            }
        } else {
            header("Location: " . BASE_URL . "?controller=Reserva&action=reservar");
            exit;
        }
    }

    // ==============================
    // Métodos para gestionar reservas
    // ==============================

    /**
     * Permite devolver una butaca reservada.
     */
    public function devolverButaca()
    {
        // Validar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['butaca_id'])) {
            $butacaId = $_POST['butaca_id'];
            $userId = $_SESSION['user_id'];

            // Log para depuración
            error_log("Devolviendo butaca - butacaId: $butacaId, userId: $userId");

            // Llamar al servicio para devolver la butaca
            $resultado = $this->service->devolverButaca($butacaId, $userId);

            if ($resultado) {
                $this->pages->render('reserva/successReturn');
            } else {
                $_SESSION['error'] = "No se pudo devolver la butaca.";
            }
        } else {
            $_SESSION['error'] = "Solicitud inválida.";
        }
    }

    /**
     * Muestra las reservas del usuario actual.
     */
    public function viewReservations()
    {
        // Validar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
            exit;
        }

        $userId = $_SESSION['user_id'];
        $reservas = $this->service->obtenerReservasUsuario($userId);

        $this->pages->render('reserva/view', ['reservas' => $reservas]);
    }

    // ==============================
    // Métodos para respuestas del flujo
    // ==============================

    /**
     * Renderiza la página de éxito después de una reserva.
     */
    public function success()
    {
        $this->pages->render('reserva/success');
    }

    /**
     * Renderiza la página de error con un mensaje específico.
     */
    public function error()
    {
        $errorMessage = $_GET['message'] ?? 'Ha ocurrido un error al procesar la reserva';
        $this->pages->render('reserva/error', ['errorMessage' => $errorMessage]);
    }
}
