<?php
namespace Controllers;
use Models\Barajaes;
use Lib\Pages;

class BarajaController{
    private Barajaes $baraja;
    private Pages $pages;

    public function __construct(){
        $this->baraja = new Barajaes();
        $this->pages = new Pages();
    }

    public function mostrarBaraja(Barajaes $mazo = null) : void{
        if($mazo == null){
            $mazo = $this->baraja;
        }

        $this->pages->render('Baraja/muestraBaraja', ['mazo' => $mazo->getBaraja()]);
    }

    public function barajarMostrarResultado(Barajaes $mazo = null) : void{
        if($mazo == null){
            $mazo = $this->baraja;
        }

        $this->baraja->barajar();

        $this->pages->render('Baraja/muestraBaraja', ['mazo' => $mazo->getBaraja()]);
    }

    public function sacarCarta(Barajaes $mazo = null) : void{
        if($mazo == null){
            $mazo = $this->baraja;
        }

        $carta = $this->baraja->sacarCarta();
        $this->pages->render('Baraja/muestraCarta', ['carta' => $carta, 'mazo' => $mazo->getBaraja()]);
    }

    public function repartirCartas($numJugadores){
        $modulo = 40 % 3;
        $cartasPorJugador = ((40 - $modulo) / $numJugadores);
        
        $manos = $this->baraja->repartirCartas($numJugadores, $cartasPorJugador);
        echo $cartasPorJugador;
        $this->pages->render('Baraja/muestraManos', ['manos' => $manos]);
    }
}