<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }

        p{
            text-align: center;
        }
        a{
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: black;
        }
        a:hover{
            background-color: wheat;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Muchas gracias por su devolución</h1>
        <p>
            <a href="<?php echo BASE_URL; ?>?controller=Reserva&action=reservar">Realizar nueva Reserva</a>
        </p>
    </div>
</body>
</html>
