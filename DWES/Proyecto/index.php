<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teatro Ayala</title>
</head>
<body>
    <?php
        require_once './vendor/autoload.php';
        require_once "./Config/config.php";
        
        use Controllers\FrontController;
        FrontController::main();
    ?>
</body>
</html>