<?php

namespace Models;

class Barajaes
{
    private array $baraja = [];

    function __construct()
    {
        $baraja = [];
        $palos = Carta::PALOS;

        for ($i = 0; $i < sizeof($palos); $i++) {
            for ($j = 1; $j <= 12; $j++) {
                $carta = new Carta($j, $palos[$i]);
                $baraja[] = $carta;
            }
        }

        $this->setBaraja($baraja);
    }

    function setBaraja($baraja){
        $this->baraja = $baraja;
    }

    function getBaraja(): mixed
    {
        return $this->baraja;
    }

    function barajar(){
        shuffle($this->baraja);
    }

    function sacarCarta()
    {
        // Palo y carta aleatoria utilizando array_rand
        $nCarta = array_rand($this->baraja);
        $carta = $this->baraja[$nCarta];
        unset($this->baraja[$nCarta]);

        return $carta;
    }

    function repartirCartas($numJugadores){
        
    }
}