<?php

namespace Controllers;

use Lib\Pages;
use Services\ButacaService;
use Services\PDFService;
use Services\UsuarioService;

class ButacaController
{
    private Pages $pages;
    private ButacaService $service;
    private UsuarioService $usuarioService; 

    public function __construct()
    {
        $this->pages = new Pages();
        $this->service = new ButacaService();
        $this->usuarioService = new UsuarioService();
    }

    /**
     * Muestra el dashboard del usuario con información de sus reservas y butacas disponibles.
     */
    public function userDashboard()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
            exit;
        }

        // Obtener butacas disponibles
        $butacas = $this->service->obtenerButacas();

        // Obtener reservas del usuario
        $reservasUsuario = $this->service->obtenerReservasUsuario($_SESSION['user_id']);

        // Renderizar la vista del dashboard
        $this->pages->render('user/dashboard', [
            'butacas' => $butacas,
            'reservasUsuario' => $reservasUsuario
        ]);
    }

    /**
     * Permite al usuario reservar una butaca.
     */
    public function reservarButaca()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['butaca_id'])) {
            $butacaId = (int) $_POST['butaca_id'];
            $userId = $_SESSION['user_id'];

            $resultado = $this->service->reservarButaca($butacaId, $userId);

            if ($resultado) {
                $_SESSION['success'] = 'Butaca reservada con éxito.';
            } else {
                $_SESSION['error'] = 'No se pudo reservar la butaca.';
            }
        }

        // Redirigir al dashboard del usuario
        header("Location: " . BASE_URL . "?controller=Butaca&action=userDashboard");
        exit;
    }

    /**
     * Muestra todas las butacas y reservas existentes.
     */
    public function showAll()
    {
        $butacas = $this->service->obtenerButacas();

        // Renderizar la vista para mostrar todas las butacas
        $this->pages->render('welcome/dashboard', [
            'butacas' => $butacas
        ]);
    }

    /**
     * Permite al usuario devolver una butaca reservada.
     */
    public function devolverButaca()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['butaca_id'])) {
            $butacaId = (int) $_POST['butaca_id'];
            $userId = $_SESSION['user_id'];

            $resultado = $this->service->devolverButaca($butacaId, $userId);

            if ($resultado) {
                $_SESSION['success'] = 'Butaca devuelta con éxito.';
            } else {
                $_SESSION['error'] = 'No se pudo devolver la butaca.';
            }
        }

        // Redirigir al dashboard del usuario
        header("Location: " . BASE_URL . "?controller=Butaca&action=userDashboard");
        exit;
    }

    /**
     * Genera y descarga un PDF con las reservas del usuario.
     */
    public function descargarPDF()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Obtener los datos del usuario (nombre, correo, ID, etc.)
    $usuario = $this->usuarioService->findById($userId); 

    // Obtener butacas detalladas del usuario
    $butaca = $this->service->obtenerReservasUsuarioDetalladas($userId);


    // Iniciar el buffer de salida
    ob_start();

    // Crear un objeto PDFService
    $pdfService = new PDFService();

    // Generar el PDF, pasando los datos adicionales junto con las reservas
    $pdfService->generarPDFReservas($butaca, $usuario); // Ahora pasamos también el objeto $usuario

    // Enviar el contenido y limpiar el buffer
    ob_end_flush();
}

}
