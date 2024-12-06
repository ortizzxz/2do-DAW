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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
        .no-reservas {
            text-align: center;
            font-size: 1.2em;
            color: #666;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reservas de Butacas</h1>
        
        <?php if (empty($reservas)): ?>
            <div class="no-reservas">No hay reservas disponibles.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Fila</th>
                        <th>Número</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reserva['fila']); ?></td>
                            <td><?php echo htmlspecialchars($reserva['numero']); ?></td>
                            <td>
                                <form action="<?php echo htmlspecialchars(BASE_URL . '?controller=Reserva&action=devolverButaca'); ?>" method="POST">
                                    <input type="hidden" name="butaca_id" value="<?php echo htmlspecialchars($reserva['butaca_id']); ?>">
                                    <button type="submit">Devolver Butaca</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
