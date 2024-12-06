<?php 
namespace Controllers;

class ErrorController {

    /**
     * Muestra un mensaje de error genérico.
     * 
     * @param string $message El mensaje de error a mostrar.
     * @param int $code El código de error (por ejemplo, 404, 500, etc.).
     * @return string El HTML con el mensaje de error.
     */
    public static function showError(string $message, int $code = 404): string
    {
        // Se puede mejorar para un diseño básico y amigable para el usuario
        $html = "<div style='background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px;'>";
        $html .= "<h2 style='color: #721c24;'>Error $code</h2>";
        $html .= "<p style='color: #721c24;'>$message</p>";
        $html .= "<p><a href='" . BASE_URL . "' style='color: #721c24;'>Volver al inicio</a></p>";
        $html .= "</div>";
        
        return $html;
    }

    /**
     * Muestra un error 404.
     * 
     * @return string El HTML con el mensaje de error 404.
     */
    public static function show_Error404(): string
    {
        return self::showError("La página que buscas no existe", 404);
    }

    /**
     * Muestra un error 500.
     * 
     * @return string El HTML con el mensaje de error 500.
     */
    public static function show_Error500(): string
    {
        return self::showError("Hubo un problema en el servidor. Intenta nuevamente más tarde.", 500);
    }
}
?>
