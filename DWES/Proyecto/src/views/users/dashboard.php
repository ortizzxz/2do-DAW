<h2>Bienvenido, <?= $_SESSION['user_name'] ?? 'Usuario' ?></h2>
<nav>
    <ul>
        <li><a href="/butacas">Ver Butacas</a></li>
        <li><a href="/reservas">Mis Reservas</a></li>
        <li><a href="/logout">Cerrar Sesión</a></li>
    </ul>
</nav>