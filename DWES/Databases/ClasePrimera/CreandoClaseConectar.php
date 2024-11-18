<!DOCTYPE html>
<head>
    <title>Clase DB</title>
</head>
<body>
    <?php 
        require_once 'Autoloader.php';
        require_once 'ConstDB.php';
        use Library\DataBase;

        error_reporting(0);
        mysqli_report(MYSQLI_REPORT_OFF);

        $conexion = new DataBase(SERVERNAME, DATABASE, USERNAME, PASSWORD);
    ?>
    <h2>Conexion Establecida</h2>
</body>
</html>