<?php
    require_once('./config/config.php');
?>
<header id="defaultHeader">
    <h1>Teatro Ayala</h1> 

    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Si el usuario está logueado, mostrar un dashboard diferente dependiendo de su rol -->
        <?php if (isset($_SESSION['es_secretario']) && $_SESSION['es_secretario'] == 1): ?>
            <a href="<?php echo BASE_URL; ?>?controller=Admin&action=dashboard">Dashboard Admin</a>
            <a href="<?php echo BASE_URL; ?>?controller=Usuario&action=logOut">Cerrar sesión</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>?controller=Butaca&action=userDashboard">Dashboard Usuario</a>
        <a href="<?php echo BASE_URL; ?>?controller=Reserva&action=devolverButaca">Devolver Entrada</a>
        <a href="<?php echo BASE_URL; ?>?controller=Butaca&action=descargarPDF">Descargar Entradas</a>
        <a href="<?php echo BASE_URL; ?>?controller=Usuario&action=logOut">Cerrar sesión</a>
        <?php endif; ?>
    <?php else: ?>
        <!-- Si el usuario no está logueado, mostrar solo el login -->
        <a href="<?php echo BASE_URL; ?>?controller=Usuario&action=login">Log In</a>
    <?php endif; ?>
</header>

<hr>
