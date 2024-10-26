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
        if ($datos['dormitorios'] < 1 || $datos['dormitorios'] > 5) {
            $errores[] = "El número de dormitorios debe estar entre 1 y 5.";
        }

        // Validar precio
        if ($datos['precio'] <= 0) {
            $errores[] = "El precio debe ser mayor que cero.";
        }

        // Validar tamaño en metros cuadrados
        if ($datos['tamano'] <= 0) {
            $errores[] = "El tamaño debe ser mayor que cero.";
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
