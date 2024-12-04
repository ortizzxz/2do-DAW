<?php
namespace Controllers;

use Services\ButacaService;
use Lib\Pages;

class ButacaController {
    private $butacaService;
    private $pages;

    public function __construct() {
        $this->butacaService = new ButacaService();
        $this->pages = new Pages();
    }

    public function index() {
        $butacas = $this->butacaService->obtenerTodasLasButacas();
        $this->pages->render('butacas/index', ['butacas' => $butacas]);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fila = $_POST['fila'];
            $numero = $_POST['numero'];
            $butaca = $this->butacaService->crearButaca($fila, $numero);
            header('Location: /butacas');
        } else {
            $this->pages->render('butacas/crear');
        }
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevoEstado = $_POST['estado'];
            $this->butacaService->actualizarEstadoButaca($id, $nuevoEstado);
            header('Location: /butacas');
        } else {
            $butaca = $this->butacaService->obtenerButaca($id);
            $this->pages->render('butacas/actualizar', ['butaca' => $butaca]);
        }
    }
}
