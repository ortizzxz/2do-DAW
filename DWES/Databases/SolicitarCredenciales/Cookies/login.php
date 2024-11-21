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

        /* COOKIES */
        $username;
        $cookieValue = 0;
        setcookie($username, $cookieValue);

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
            if(!isset($_COOKIE[$username])) {
                setcookie($username, $cookieValue);
              } else {
                echo "Cookie '" . $username . "' is set!<br>";
                echo "Value is: " . $_COOKIE[$username];
              }
        };

        $stmt -> close();
    };

    mysqli_close($conn);
?>