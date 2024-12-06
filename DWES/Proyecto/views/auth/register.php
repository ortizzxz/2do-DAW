<?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
$apellidoDos = isset($_GET['apellidoDos']) ? $_GET['apellidoDos'] : '';
$DNI = isset($_GET['DNI']) ? $_GET['DNI'] : '';
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$errors = isset($_GET['errors']) ? json_decode(urldecode($_GET['errors']), true) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .errors {
            color: red;
            margin-bottom: 20px;
        }

        .errors ul {
            list-style: none;
            padding: 0;
        }

        .errors li {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1.1em;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        
        <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?php echo BASE_URL; ?>Usuario/registrar/" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>

            <label for="apellido">Primer Apellido</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo htmlspecialchars($apellido); ?>" required>

            <label for="apellidoDos">Segundo Apellido</label>
            <input type="text" name="apellidoDos" id="apellidoDos" value="<?php echo htmlspecialchars($apellidoDos); ?>">

            <label for="DNI">DNI</label>
            <input type="text" name="DNI" id="DNI" value="<?php echo htmlspecialchars($DNI); ?>" required>

            <label for="correo">Correo</label>
            <input type="text" name="correo" id="correo" value="<?php echo htmlspecialchars($correo); ?>" required>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>

</body>
</html>
