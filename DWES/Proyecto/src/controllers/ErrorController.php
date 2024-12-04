<?php 
namespace Controllers;

class ErrorController {
    public static function show_Error404() {
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        echo "<p>La página que estás buscando no existe.</p>";
    }
}