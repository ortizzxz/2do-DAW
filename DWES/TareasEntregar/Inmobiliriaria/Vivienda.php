<?php
class Vivienda
{
    private $tipo;
    private $zona;
    private $direccion;
    private $dormitorios;
    private $precio;
    private $tamano;
    private $extras;
    private $observaciones;

    public function __construct($tipo, $zona, $direccion, $dormitorios, $precio, $tamano, $extras, $observaciones)
    {
        $this->tipo = $tipo;
        $this->zona = $zona;
        $this->direccion = $direccion;
        $this->dormitorios = $dormitorios;
        $this->precio = $precio;
        $this->tamano = $tamano;
        $this->extras = $extras;
        $this->observaciones = $observaciones;
    }

    // Métodos getter
    public function getTipo()
    {
        return $this->tipo;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getDormitorios()
    {
        return $this->dormitorios;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getTamano()
    {
        return $this->tamano;
    }

    public function getExtras()
    {
        return $this->extras;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function calcularBeneficio()
    {
        $porcentajeBeneficio = 0;
        switch ($this->zona) {
            case 'Centro':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.35 : 0.30;
                break;
            case 'Zaidín':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.28 : 0.25;
                break;
            case 'Chana':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.25 : 0.22;
                break;
            case 'Albaicín':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.35 : 0.20;
                break;
            case 'Sacromonte':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.25 : 0.22;
                break;
            case 'Realejo':
                $porcentajeBeneficio = ($this->tamano > 100) ? 0.28 : 0.25;
                break;
        }

        $beneficio = $this->precio * $porcentajeBeneficio;

        return $beneficio;
    }

    public function obtenerDatosParaMostrar() {
        return [
            'Tipo' => $this->getTipo(),
            'Zona' => $this->getZona(),
            'Dirección' => $this->getDireccion(),
            'Dormitorios' => $this->getDormitorios(),
            'Precio' => '$' . $this->getPrecio(),
            'Tamaño' => $this->getTamano() . 'm²',
            'Extras' => implode(', ', $this->getExtras()),
            'Observaciones' => $this->getObservaciones(),
            'Beneficio estimado para la empresa' => '$' . $this->calcularBeneficio()
        ];
    }

    public function obtenerDatosParaXML() {
        return [
            'tipo' => $this->getTipo(),
            'zona' => $this->getZona(),
            'direccion' => $this->getDireccion(),
            'dormitorios' => $this->getDormitorios(),
            'precio' => $this->getPrecio(),
            'tamano' => $this->getTamano(),
            'extras' => implode(', ', $this->getExtras()),
            'observaciones' => $this->getObservaciones(),
            'beneficio' => $this->calcularBeneficio()
        ];
    }
}
