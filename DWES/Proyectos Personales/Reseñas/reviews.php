<?php
    $servername = "localhost";
    $usernameDatabase = "root";
    $passwordDatabase = "";
    $database = "test";

    $conn = mysqli_connect($servername, $usernameDatabase, $passwordDatabase, $database);

    if(isset($_POST['review'])){
        $message = $_POST['review'];

        // prepara la sentencia SQL
        $stmt = $conn -> prepare("INSERT INTO reviews (message) VALUES (?)");

        $stmt -> bind_param("s", $message);

        if ($stmt->execute()) {
            echo "Mensaje Enviado";
        } else {
            echo "Error al enviar el mensaje: " . $stmt->error;
        }

        $stmt -> close();
    }
?>


<h1> Envíe su reseña </h1>
<form action="reviews.php" method="post">
        <textarea name="review" rows="6" cols="50"></textarea> <br />
        <button type="submit"> Enviar </button>
</form>

<h2>Ultimas reseñas</h2>

