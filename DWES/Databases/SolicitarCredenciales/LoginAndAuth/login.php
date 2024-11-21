<?php
    $servername = "localhost";
    $usernameDatabase = "root";
    $passwordDatabase = "";
    $database = "test";

    // conexion
    $conn = mysqli_connect($servername, $usernameDatabase, $passwordDatabase, $database);

    if(isset($_POST['username'], $_POST['password'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        //sentencia 
        $stmt = $conn -> prepare("SELECT password FROM users WHERE username = ?");

        //vincular params 
        $stmt -> bind_param("s", $username);
        $stmt -> execute();
        $stmt -> bind_result($hashedPassword);
        $stmt -> fetch();

        //ejecutamos consulta
        if( password_verify($password, $hashedPassword)){
            echo("Login Correcto");
        }else{
            echo("Login Incorrecto");
        };

        $stmt -> close();
    };

    mysqli_close($conn);
?>