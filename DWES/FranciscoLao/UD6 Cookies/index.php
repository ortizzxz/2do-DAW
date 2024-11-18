<?php
    session_start();

    if (!isset($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 0;
    }

    $_SESSION['visitas']++;

    echo "Has visitado esta página " . $_SESSION['visitas'] . " veces.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>

</body>
</html>