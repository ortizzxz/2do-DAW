<?php
    $servername = "localhost";
    $usernameDatabase = "root";
    $passwordDatabase = "";
    $database = "test";

    // conexion
    $conn = mysqli_connect($servername, $usernameDatabase, $passwordDatabase, $database);

    // verificamos conexion
    if(!$conn){
        die("La conexion ha fallado <br/>");
    }
    echo ("Conexion exitosa <br/>");

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
            echo("Bienvenido al sistema");
        }else{
            echo("Login Incorrecto");
        };


        $stmt -> close();
    };

    mysqli_close($conn);
?>