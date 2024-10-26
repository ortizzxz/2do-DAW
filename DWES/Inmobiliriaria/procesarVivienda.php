<?php

class ProcesarVivienda {
    private $validador;
    private $almacenamiento;

    public function __construct(ValidadorVivienda $validador, AlmacenamientoVivienda $almacenamiento) {
        // Inyección de dependencias
        $this->validador = $validador;
        $this->almacenamiento = $almacenamiento;
    }

    public function procesarFormulario($datosFormulario, $archivoFoto) {
        $errores = $this->validador->validar($datosFormulario);

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

            if ($archivoFoto && $archivoFoto['error'] == UPLOAD_ERR_OK) {
                if ($archivoFoto['size'] <= 100 * 1024) { // 100 KB
                    $fotoPath = 'fotos/' . basename($archivoFoto['name']);
                    move_uploaded_file($archivoFoto['tmp_name'], $fotoPath);
                    echo "<a href='$fotoPath' target='_blank'>Ver Foto</a><br>";
                } else {
                    echo "<p>Error: La foto excede el tamaño máximo permitido.</p>";
                }
            } else {
                echo "<p>No se subió ninguna foto.</p>";
            }

            // Mostrar resultados al usuario
            echo "<h2>Vivienda registrada correctamente</h2>";
            echo "<p>Tipo: " . htmlspecialchars($vivienda->getTipo()) . "</p>";
            echo "<p>Zona: " . htmlspecialchars($vivienda->getZona()) . "</p>";
            echo "<p>Dirección: " . htmlspecialchars($vivienda->getDireccion()) . "</p>";
            echo "<p>Dormitorios: " . htmlspecialchars($vivienda->getDormitorios()) . "</p>";
            echo "<p>Precio: $" . htmlspecialchars($vivienda->getPrecio()) . "</p>";
            echo "<p>Tamaño: " . htmlspecialchars($vivienda->getTamano()) . "m²</p>";
            echo "<p>Extras: " . htmlspecialchars(implode(', ', $vivienda->getExtras())) . "</p>";
            echo "<p>Observaciones: " . htmlspecialchars($vivienda->getObservaciones()) . "</p>";

            echo "<p>Beneficio estimado para la empresa: $" . htmlspecialchars($vivienda->calcularBeneficio()) . "</p>";

        } else {
            foreach ($errores as $error) {
                echo "<p>$error</p>";
            }
        }
    }
}
