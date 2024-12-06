<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario</title>
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
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }

        p {
            text-align: center;
            color: #555;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        h3 {
            color: #555;
            margin-top: 20px;
        }

        .butacas {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .butaca {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
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
            transform: scale(1.1);
            opacity: 0.8;
        }

        select,
        button {
            padding: 10px;
            font-size: 1em;
            width: 100%;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        select:focus,
        button:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-weight: bold;
            border: none;
            margin-top: 20px;
        }

        button:hover {
            background-color: #218838;
        }

        .form-container {
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenido al Dashboard</h1>
        <p>En este dashboard puedes ver las butacas disponibles y realizar tus reservas de manera rápida y sencilla.</p>

        <h2>Butacas Disponibles</h2>

        <div class="butacas">
            <?php foreach ($butacas as $butaca): ?>
                <div class="butaca <?php echo $butaca['estado'] === 'libre' ? 'libre' : 'ocupada'; ?>">
                    <?php echo htmlspecialchars($butaca['numero']); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-container">
            <h3>Realiza tu Reserva</h3>
            <form action="<?php echo BASE_URL; ?>?controller=Reserva&action=reservar" method="POST">
                <label for="butaca">Selecciona una butaca libre:</label>
                <select name="butaca" id="butaca" required>
                    <?php foreach ($butacas as $butaca): ?>
                        <?php if ($butaca['estado'] === 'libre'): ?>
                            <option value="<?php echo htmlspecialchars($butaca['id']); ?>">
                                Butaca Nº <?php echo htmlspecialchars($butaca['numero']); ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Reservar</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>¿Tienes problemas con la reserva? <a href="mailto:mimail@quenopondre.xd">Contáctanos</a></p>
    </div>

</body>

</html>
