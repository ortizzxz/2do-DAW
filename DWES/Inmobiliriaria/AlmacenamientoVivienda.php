<?php
class AlmacenamientoVivienda{
    private $rutaArchivo;

    public function __construct($rutaArchivo){
        if (!file_exists(dirname($rutaArchivo))) {
            mkdir(dirname($rutaArchivo), 0777, true);
        }
        $this->rutaArchivo = $rutaArchivo;
    }

    public function guardar(Vivienda $vivienda){
        // Convertir el objeto Vivienda a una cadena de texto
        $datos = sprintf(
            "%s, %s, %s, %d, %.2f, %d, %s, \"%s\", Beneficio: %.2f\n",
            $vivienda->getTipo(),
            $vivienda->getZona(),
            $vivienda->getDireccion(),
            $vivienda->getDormitorios(),
            $vivienda->getPrecio(),
            $vivienda->getTamano(),
            implode(', ', $vivienda->getExtras()),
            $vivienda->getObservaciones(),
            $vivienda->calcularBeneficio()
        );

        // Guardar los datos en el archivo
        file_put_contents($this->rutaArchivo, $datos, FILE_APPEND);
    }
}
