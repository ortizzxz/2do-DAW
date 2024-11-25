<?php
namespace Controllers;

class ErrorController{
    public static function show_error404() : string{
        return '<h1>La pagina no existe</h1>';
    }
}