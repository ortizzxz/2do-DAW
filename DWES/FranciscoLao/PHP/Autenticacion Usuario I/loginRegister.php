<?php

    /* Conexion a la base de datos */
    $servername = "localhost";
    $usernameDatabase = "root";
    $password = "";
    $database = "test";

    // crear la conexion 
    $conn = mysqli_connect($servername, $usernameDatabase, $password, $database);

    // verificar la conexion
    // die hace un exit
    if(!$conn){
        die("La conexión ha fallado: " . mysqli_connect_error());
    }
    echo "Conexión exitosa <br/>";

    /* isset determina si el param es diferente a null y existe*/
    // trim elimina los espacios en blanco
    if(isset($_POST['username'], $_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        /* Hay que insertar la contraseña hasheada en la BD */
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // preparar la sentencia SQL 
        $stmt = $conn -> prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        
        // vincular param ( dos strings "ss")
        $stmt -> bind_param("ss", $username, $hashedPassword);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        $stmt -> close();
    };
    
    mysqli_close($conn);
?>