<?php
class ValidadorVivienda
{
    public function validar($datos)
    {
        $errores = [];

        // Validar tipo de vivienda
        if (!in_array($datos['tipo'], ['Piso', 'Adosado', 'Chalet', 'Casa'])) {
            $errores[] = "Tipo de vivienda no válido.";
        }

        // Validar zona
        if (!in_array($datos['zona'], ['Centro', 'Zaidín', 'Chana', 'Albaicín', 'Sacromonte', 'Realejo'])) {
            $errores[] = "Zona no válida.";
        }

        // Validar dirección
        if (empty($datos['direccion'])) {
            $errores[] = "La dirección es obligatoria.";
        }

        // Validar número de dormitorios
        $dormitorios = $datos['dormitorios'];
        $dormitorios = filter_var($dormitorios, FILTER_SANITIZE_NUMBER_INT);

        if (!filter_var($dormitorios, FILTER_VALIDATE_INT)) {
            $errores[] = "El número de dormitorios debe ser un número";
        } else {
            $dormitorios = intval($dormitorios); 
            if ($dormitorios > 5 || $dormitorios < 1) {
                $errores[] = "El número de dormitorios debe estar entre 1 y 5.";
            }
        }

        // Validar precio
        $precio = $datos['precio'];
        $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_INT);

        if (!filter_var($precio, FILTER_VALIDATE_INT)) {
            $errores[] = "El precio debe ser un numero.";
        }else{
            $precio = intval($precio);
            if($precio < 0){
                $errores['precio'] = "El precio tiene que ser mayor que 0.";
            }
        }

        // Validar tamaño en metros cuadrados
        $tamano = $datos['tamano'];
        $tamano = filter_var($tamano, FILTER_SANITIZE_NUMBER_INT);

        if (!filter_var($tamano, FILTER_VALIDATE_INT)) {
            $errores[] = "El tamaño debe ser un numero.";
        }else{
            $tamano = intval($tamano);
            if($tamano < 0){
                $errores['tamano'] = "El tamaño tiene que ser mayor que 0.";
            } 
        }

        // Validar foto
        if (isset($datos['foto']) && $datos['foto']['error'] == UPLOAD_ERR_OK) {
            if ($datos['foto']['size'] > 100 * 1024) { // 100 KB
                $errores[] = "La foto excede el tamaño máximo permitido de 100 KB.";
            }
        } elseif (isset($datos['foto'])) {
            $errores[] = "Error al subir la foto.";
        }

        return $errores;
    }
}
