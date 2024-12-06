<?php
namespace Controllers;

use Lib\Pages;

class AdminController {
    private Pages $pages;

    public function __construct() {
        $this->pages = new Pages();
    }

    /**
     * Muestra el dashboard del administrador.
     * 
     * Solo los usuarios autenticados como administradores pueden acceder a esta página.
     */
    public function dashboard() {
        // Verificar si el usuario está autenticado y si es administrador
        if (!isset($_SESSION['user_id'])) {
            // Si no está autenticado o no es administrador, redirigir a la página de login
            header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
            exit;
        }

        // Aquí va la lógica para mostrar el dashboard del admin
        $this->pages->render('admin/dashboard');
    }

    /**
     * Acción para manejar la gestión de usuarios (Ejemplo de acción administrativa adicional)
     */
    public function gestionarUsuarios() {
        $this->pages->render('admin/gestionarUsuarios');
    }

    /**
     * Otra acción administrativa (Ejemplo para manejar otros aspectos)
     */
    public function generarReportes() {
        $this->pages->render('admin/reportes');
    }
}
?>
