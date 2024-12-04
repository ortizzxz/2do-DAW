<?php 
namespace Controllers;

use Lib\Pages;
use Controllers\ErrorController;
require_once './src/config/config.php';

class FrontController {
    private Pages $pages;

    public function __construct() {
        $this->pages = new Pages();
    }

    public static function main(): void {
        
        if (isset($_GET['controller'])) {
            $nombre_controlador = '\\Controllers\\' . ucfirst($_GET['controller']) . 'Controller';
        } else {
            $nombre_controlador = '\\Controllers\\' . CONTROLLER_DEFAULT . 'Controller';
        }

        // Verificar si la clase del controlador existe
        if (class_exists($nombre_controlador)) {
            $controlador = new $nombre_controlador();
            
            // Obtener la acción
            if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                $action = $_GET['action'];
                $controlador->$action();
            } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
                // Llamar a la acción por defecto del controlador
                $action_default = ACTION_DEFAULT;
                $controlador->$action_default();
            } else {
                // Mostrar error 404 si la acción no existe
                echo ErrorController::show_Error404();
            }
        } else {
            // Mostrar error 404 si el controlador no existe
            echo ErrorController::show_Error404();
        }
    }

    public function welcomeMessage() {
        $this->pages->render('Front/welcome');
    }
}