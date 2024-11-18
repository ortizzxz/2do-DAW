<?php
session_start();    
if(!isset($_SESSION['usuario'])){
    header ("Location:sesionesLogin.php?redirigido=true");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página principal</title>
    <meta charset = "UTF-8">
</head>
<body>
    <?php echo "Bienvenido ". $_SESSION['usuario'];?>   
    <br><a href = "sesionesLogout.php"> Salir <a>
</body>
</html> 