<?php
class AlmacenamientoVivienda
{
    private $rutaArchivo;

    public function __construct($rutaArchivo)
    {
        if (!file_exists(dirname($rutaArchivo))) {
            mkdir(dirname($rutaArchivo), 0777, true);
        }
        $this->rutaArchivo = $rutaArchivo;
    }

    public function guardar(Vivienda $vivienda)
    {
        if (file_exists($this->rutaArchivo)) {
            $xml = simplexml_load_file($this->rutaArchivo);
        } else {
            $xml = new SimpleXMLElement('<viviendas></viviendas>');
        }

        $viviendaXML = $xml->addChild('vivienda');

        foreach ($vivienda->obtenerDatosParaXML() as $campo => $valor) {
            $viviendaXML->addChild($campo, htmlspecialchars($valor));
        }
        // $xml->asXML($this->rutaArchivo);

        $dom = new DOMDocument("1.0", "utf-8");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());

        $dom->save($this->rutaArchivo);

    }
}