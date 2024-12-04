<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teatro IES Francisco Ayala</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Teatro IES Francisco Ayala</h1>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="/login">Iniciar Sesión</a></li>
                    <li><a href="/register">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>