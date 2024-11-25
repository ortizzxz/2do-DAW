<?php
    namespace Models;
    class Carta{
        const PALOS = ["espadas", "oros", "bastos", "copas"];
        const CARTAS = array(
            1 => "as",
            2 => "dos",
            3 => "tres",
            4 => "cuatro",
            5 => "cinco",
            6 => "seis",
            7 => "siete",     
            8 => "ocho",     
            9 => "nueve",     
            10 => "sota",
            11 => "caballo",
            12 => "rey"
        );

        function __construct(private int $numeroCarta, private string $paloCarta){
            $this->numeroCarta = $numeroCarta;
            $this->paloCarta = $paloCarta;
        }

        function getPaloCarta(){
            return $this->paloCarta;
        }

        function getNumeroCarta(){
            return $this->numeroCarta;
        }
    }