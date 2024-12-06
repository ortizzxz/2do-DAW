<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Butaca</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        header nav ul {
            list-style-type: none;
            padding: 0;
        }
        header nav ul li {
            display: inline;
            margin: 0 15px;
        }
        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        header nav ul li a:hover {
            text-decoration: underline;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 1.1em;
            color: #555;
        }
        select {
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }
        select:focus {
            outline: none;
            border-color: #007bff;
        }
        button {
            padding: 10px 20px;
            font-size: 1.1em;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
        footer p {
            margin: 0;
        }

        #defaultHeader{
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Reservar Butaca</h1>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>?controller=Butaca&action=userDashboard">Volver al Dashboard</a></li>
                <li><a href="<?php echo BASE_URL; ?>?controller=Usuario&action=logOut">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Selecciona una Butaca</h2>
        <form action="<?php echo BASE_URL; ?>?controller=Reserva&action=confirmar" method="POST">
            <label for="butaca">Elige una butaca:</label>
            <select name="butaca_id" id="butaca" required>
                <?php foreach ($butacas as $butaca): ?>
                    <?php if ($butaca['estado'] === 'libre'): ?>
                        <option value="<?php echo $butaca['id']; ?>">
                            Fila <?php echo $butaca['fila']; ?>, Número <?php echo $butaca['numero']; ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <button type="submit">Reservar</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Tu Aplicación. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
