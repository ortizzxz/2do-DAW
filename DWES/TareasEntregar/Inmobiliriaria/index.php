<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Viviendas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="formulario">


        <form action="procesar_vivienda.php" method="POST" enctype="multipart/form-data">
            <label for="tipo">Tipo de vivienda:</label>
            <select name="tipo" id="tipo" required>
                <option value="Piso">Piso</option>
                <option value="Adosado">Adosado</option>
                <option value="Chalet">Chalet</option>
                <option value="Casa">Casa</option>
            </select><br>

            <label for="zona">Zona:</label>
            <select name="zona" id="zona" required>
                <option value="Centro">Centro</option>
                <option value="Zaidín">Zaidín</option>
                <option value="Chana">Chana</option>
                <option value="Albaicín">Albaicín</option>
                <option value="Sacromonte">Sacromonte</option>
                <option value="Realejo">Realejo</option>
            </select><br>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" required><br>

            <label for="dormitorios">Número de dormitorios:</label>
            <input type="text" name="dormitorios" id="dormitorios" min="1" max="5" required><br>

            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" required><br>

            <label for="tamano">Tamaño en m²:</label>
            <input type="text" name="tamano" id="tamano" required><br>

            <label>Extras:</label>
            <input type="checkbox" name="extras[]" value="Piscina"> Piscina
            <input type="checkbox" name="extras[]" value="Jardín"> Jardín
            <input type="checkbox" name="extras[]" value="Garage"> Garage <br>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto"><br>

            <label for="observaciones">Observaciones:</label><br>
            <textarea name="observaciones" id="observaciones"></textarea><br>

            <input type="submit" value="Registrar Vivienda">
            <?php

            // Muestra los errores si existen
            if (isset($_SESSION['errores'])) {
                foreach ($_SESSION['errores'] as $error) {
                    echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
                }
                unset($_SESSION['errores']);
            }
            ?>
        </form>
    </div>
</body>

</html>