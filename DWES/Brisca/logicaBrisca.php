<?php


function agregarCartas($baraja){
    $oro = ["oros_1", "oros_2", "oros_3", "oros_4", "oros_5", "oros_6", "oros_7", "oros_10", "oros_11", "oros_12"];
    $copa = ["copas_1", "copas_2", "copas_3", "copas_4", "copas_5", "copas_6", "copas_7", "copas_10", "copas_11", "copas_12"];
    $espada = ["espadas_1", "espadas_2", "espadas_3", "espadas_4", "espadas_5", "espadas_6", "espadas_7", "espadas_10", "espadas_11", "espadas_12"];
    $basto = ["bastos_1", "bastos_2", "bastos_3", "bastos_4", "bastos_5", "bastos_6", "bastos_7", "bastos_10", "bastos_11", "bastos_12"];

    $baraja = [ $oro, $copa, $espada, $basto ];

    return $baraja;
}

const VALOR_PUNTOS = [
    "1" => 11, 
    "3" => 10,
    "12" => 4,
    "11" => 3,
    "10" => 2
];

function juegaTresCartas() {
    
    $jugadorUno = [];
    $baraja = []; 
    $baraja = agregarCartas($baraja);
    
    for($i = 0; $i < 3; $i++){
        
        //  palo y carta aleatoria utilizando array_rand
        $paloIndex = array_rand($baraja);
        $cartaIndex = array_rand($baraja[$paloIndex]);

        // saber cual es nuestra carta
        $carta = $baraja[$paloIndex][$cartaIndex];

        // Añadir la carta al jugador
        $jugadorUno[] = $carta;
        
        // eliminar carta
        unset($baraja[$paloIndex][$cartaIndex]);
    }

    // Muestra las cartas que ha recibido el jugador. Se adjunta una carpeta con imágenes de cartas para que puedas usarlas en la presentación.
    echo "<H1>Mi Baraja</H1>";

    for ($i = 0; $i < count($jugadorUno); $i++) {
        echo "<img src='./imagenes/" . $jugadorUno[$i] . ".jpg'>";
    }
}

function juegaDiezCartas() {
    
    $jugadorUno = [];
    $baraja = [];
    $puntosTotales = 0;
    $baraja = agregarCartas($baraja);

    for($i = 0; $i < 10; $i++){

        //  palo y carta aleatoria utilizando array_rand
        $paloIndex = array_rand($baraja);
        $cartaIndex = array_rand($baraja[$paloIndex]);

        // saber cual es nuestra carta
        $carta = $baraja[$paloIndex][$cartaIndex];

        // Añadir la carta al jugador
        $jugadorUno[] = $carta;
        
        // eliminar carta
        unset($baraja[$paloIndex][$cartaIndex]);
    }

    echo "<H1>Mi Baraja</H1>";
    for ($i = 0; $i < count($jugadorUno); $i++) {
        echo "<img src='./imagenes/" . $jugadorUno[$i] . ".jpg'>";

        foreach(VALOR_PUNTOS as $key => $value){
            if(strpos($jugadorUno[$i], $key) !== false){
                $puntosTotales += $value;
            }
        }

    }

    echo "<H1>Puntos totales: " . $puntosTotales . "</H1>";

}

if(isset($_POST['opcionSeleccionada'])){

    $eleccion = $_POST['opcionSeleccionada'];

    if ($eleccion == "3"){
        juegaTresCartas();

    } else if ($eleccion == "10"){
        juegaDiezCartas();
    }else {
        echo "Error";
    }
}
?>