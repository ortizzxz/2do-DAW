<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            color: #d9534f; /* Rojo claro para indicar error */
            margin-bottom: 20px;
        }

        p {
            font-size: 1rem;
            color: #555555;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            background-color: #f4f7fc;
            padding: 10px 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Error</h1>
        <!-- Mostrar el mensaje de error proporcionado -->
        <p><?php echo htmlspecialchars($message ?? 'Ha ocurrido un error inesperado.'); ?></p>

        <!-- Enlace para regresar a la página principal -->
        <a href="<?php echo BASE_URL; ?>">Volver al Inicio</a>
    </div>
</body>
</html>
