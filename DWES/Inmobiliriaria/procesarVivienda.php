<?php

class ProcesarVivienda
{
    private $validador;
    private $almacenamiento;

    public function __construct(ValidadorVivienda $validador, AlmacenamientoVivienda $almacenamiento)
    {
        // Inyección de dependencias
        $this->validador = $validador;
        $this->almacenamiento = $almacenamiento;
    }

    public function procesarFormulario($datosFormulario, $archivoFoto)
    {
        $errores = $this->validador->validar($datosFormulario);

        // Verificar el tamaño de la imagen primero
        if ($archivoFoto && $archivoFoto['error'] == UPLOAD_ERR_OK) {
            if ($archivoFoto['size'] > 100 * 1024) { // 100KB
                $errores[] = "Error: La foto excede el tamaño máximo permitido de 100KB.";
            }
        }

        if (empty($errores)) {
            $vivienda = new Vivienda(
                $datosFormulario['tipo'],
                $datosFormulario['zona'],
                $datosFormulario['direccion'],
                (int)$datosFormulario['dormitorios'],
                (float)$datosFormulario['precio'],
                (int)$datosFormulario['tamano'],
                isset($datosFormulario['extras']) ? $datosFormulario['extras'] : [],
                $datosFormulario['observaciones']
            );

            // Guardar la vivienda
            $this->almacenamiento->guardar($vivienda);
            $datosVivienda = $vivienda->obtenerDatosParaMostrar();

            echo "<h2>Vivienda registrada correctamente</h2>";
            echo '<ul>';

            foreach ($datosVivienda as $campo => $valor) {
                echo "<li>" . htmlspecialchars($campo) . ": " . htmlspecialchars($valor) . "</li>";
            }

            if ($archivoFoto && $archivoFoto['error'] == UPLOAD_ERR_OK) {
                $fotoPath = 'fotos/' . basename($archivoFoto['name']);
                move_uploaded_file($archivoFoto['tmp_name'], $fotoPath);
                echo "<li><a href='$fotoPath' target='_blank'>Ver Foto</a></li>";
            } else {
                echo "<li>No se subió ninguna foto.</li>";
            }

            echo '</ul>';   

            echo "<a href='./index.php'>Insertar otra vivienda</a>";
            return true;
        } else {
            return $errores;
        }
    }
}
