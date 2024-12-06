<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disposición de Butacas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            box-sizing: border-box;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.1em;
        }
        h2 {
            color: #555;
            margin-bottom: 15px;
        }
        .butacas {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        .fila {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            width: 100%;
        }
        .butaca {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ccc;
            border-radius: 5px;
            text-align: center;
            font-size: 0.9em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .butaca.libre {
            background-color: #d4edda;
            color: #155724;
        }
        .butaca.ocupada {
            background-color: #f8d7da;
            color: #721c24;
        }
        .butaca:hover {
            opacity: 0.8;
        }
        .boton-login {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }
        .boton-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido!</h1>
        <p>En este dashboard puedes ver las butacas disponibles y realizar tu reserva.</p>

        <h2>Butacas Disponibles</h2>

        <!-- Mostrar las butacas en filas -->
        <?php 
            $filas = array_chunk($butacas, 20); // Divide las butacas en filas de 20
            foreach ($filas as $index => $fila): 
        ?>
            <div class="fila">
                <?php foreach ($fila as $butaca): ?>
                    <div class="butaca <?php echo $butaca['estado'] === 'libre' ? 'libre' : 'ocupada'; ?>">
                        <?php echo htmlspecialchars($butaca['numero']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <p>Para reservar una butaca, por favor <a class="boton-login" href="<?php echo BASE_URL; ?>?controller=Usuario&action=logOut">Iniciar sesión</a></p>
    </div>
</body>
</html>
