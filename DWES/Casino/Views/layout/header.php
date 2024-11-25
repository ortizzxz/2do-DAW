<?php
    require_once './Config/config.php'
?>

<header>
        <h1>Casino</h1>
        <nav>
            <ul>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=mostrarBaraja">Mostrar las cartas de la baraja</a></li>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=barajarMostrarResultado">Barajar y Mostrar el Resultado</a></li>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=sacarCarta">Sacar una carta de la baraja</a></li>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=repartirCartas">Repartir Cartas</a></li>
            </ul>
        </nav>
</header>