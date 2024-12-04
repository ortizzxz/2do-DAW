<?php
namespace Services;

use Models\Butaca;
use Repositories\ButacaRepository;

class ButacaService {
    private $butacaRepository;

    public function __construct() {
        $this->butacaRepository = new ButacaRepository();
    }

    public function crearButaca($fila, $numero) {
        $butaca = new Butaca($fila, $numero);
        $this->butacaRepository->save($butaca);
        return $butaca;
    }

    public function obtenerTodasLasButacas() {
        return $this->butacaRepository->findAll();
    }

    public function obtenerButaca($id) {
        return $this->butacaRepository->findById($id);
    }

    public function actualizarEstadoButaca($id, $nuevoEstado) {
        $butaca = $this->butacaRepository->findById($id);
        if ($butaca) {
            $butacaObj = new Butaca($butaca['fila'], $butaca['numero'], $nuevoEstado);
            $butacaObj->setId($id);
            $this->butacaRepository->update($butacaObj);
            return true;
        }
        return false;
    }

    public function obtenerButacasLibres() {
        return $this->butacaRepository->findByEstado('libre');
    }
}