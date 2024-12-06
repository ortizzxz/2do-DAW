<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Exitosa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        header {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 2em;
        }

        main {
            flex: 1;
            text-align: center;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        main p {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #f1f1f1;
            color: #777;
            text-align: center;
            padding: 15px;
            font-size: 0.9em;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #0056b3;
        }

        #defaultHeader {
            padding: 10px 0;
            font-size: 1em;
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>

    <header>
        <h1>Reserva Exitosa</h1>
    </header>

    <main>
        <p>Tu reserva se ha realizado con éxito.</p>
        <a href="<?php echo BASE_URL; ?>?controller=Butaca&action=userDashboard">Volver al Dashboard</a>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Tu Aplicación. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
