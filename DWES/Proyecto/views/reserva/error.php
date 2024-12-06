<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en la Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .error-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #d9534f;
        }
        .error-message {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .back-link {
            display: inline-block;
            background-color: #5bc0de;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-link:hover {
            background-color: #46b8da;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error en la Reserva</h1>
        <div class="error-message">
            <?php echo isset($errorMessage) ? htmlspecialchars($errorMessage) : 'Ha ocurrido un error desconocido.'; ?>
        </div>  
        <a href="<?php echo BASE_URL . '?controller=Reserva&action=reservar'; ?>" class="back-link">Volver a intentar</a>
    </div>
</body>
</html>