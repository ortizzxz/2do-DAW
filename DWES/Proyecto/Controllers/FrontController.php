<?php 
namespace Controllers;

use Lib\Pages;

class FrontController {
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    /**
     * Método principal que gestiona la petición, carga el controlador y ejecuta la acción correspondiente.
     */
    public static function main(): void 
    {
        session_start(); // Iniciar la sesión

        // Determinar el controlador que se debe cargar
        $controllerName = isset($_GET['controller']) ? 'Controllers\\' . $_GET['controller'] . 'Controller' : 'Controllers\\' . CONTROLLER_DEFAULT;

        // Verificar si la clase del controlador existe
        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            // Verificar si la acción solicitada existe
            if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
                $action = $_GET['action'];
                $controller->$action();
            } elseif (empty($_GET['controller']) && empty($_GET['action'])) {
                // Acción por defecto
                $actionDefault = ACTION_DEFAULT;
                $controller->$actionDefault();
            } else {
                // Si la acción no existe, mostrar error 404
                self::showError404();
            }
        } else {
            // Si el controlador no existe, mostrar error 404
            self::showError404();
        }
    }

    /**
     * Método para mostrar un mensaje de bienvenida.
     */
    public function welcomeMessage(): void
    {
        $this->pages->render('Front/welcome');
    }

    /**
     * Muestra una página de error 404.
     */
    private static function showError404(): void
    {
        echo ErrorController::show_Error404();
    }
}
?>
