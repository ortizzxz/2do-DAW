<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Asegúrate de enlazar tu CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Para iconos -->
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        nav {
            margin-top: 15px;
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        nav ul li {
            display: inline;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #007bff;
        }
        main {
            padding: 40px 0;
            background-color: #fff;
        }
        .dashboard h2 {
            text-align: center;
            color: #333;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            gap: 20px;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 15px;
        }
        .card h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .card p {
            color: #555;
            font-size: 16px;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }

        #defaultHeader{
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Bienvenido al Dashboard de Administrador</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>?controller=Butaca&action=userDashboard"><i class="fas fa-chair"></i> Ver Butacas</a></li>
                    <li><a href="<?php echo BASE_URL; ?>?controller=Usuario&action=registerForm"><i class="fas fa-user-plus"></i> Registrar Usuario</a></li>
                    <li><a href="<?php echo BASE_URL; ?>?controller=Reserva&action=viewReservations"><i class="fas fa-list-alt"></i> Ver Reservas</a></li>
                    <li><a href="<?php echo BASE_URL; ?>?controller=Usuario&action=logOut"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="dashboard">
            <h2>Opciones de Administración</h2>
            <p>Desde aquí puedes gestionar las butacas, usuarios y reservas de manera eficiente.</p>

            <div class="cards">
                <!-- Gestión de Butacas -->
                <div class="card">
                    <h3><i class="fas fa-chair"></i> Gestión de Butacas</h3>
                    <p>Puedes añadir, editar o eliminar butacas.</p>
                </div>

                <!-- Gestión de Usuarios -->
                <div class="card">
                    <h3><i class="fas fa-users"></i> Gestión de Usuarios</h3>
                    <p>Ver la lista de usuarios y gestionar sus permisos.</p>
                </div>

                <!-- Gestión de Reservas -->
                <div class="card">
                    <h3><i class="fas fa-calendar-check"></i> Reservas</h3>
                    <p>Ver todas las reservas realizadas por los usuarios.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 ¿Me he ganado el 10? - Todos los derechos reservados.</p>
    </footer>

</body>

</html>
