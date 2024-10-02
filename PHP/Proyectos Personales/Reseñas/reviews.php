<?php
    session_start();

$servername = "localhost";
$usernameDatabase = "root";
$passwordDatabase = "";
$database = "test";

$conn = mysqli_connect($servername, $usernameDatabase, $passwordDatabase, $database);

   if(isset($_POST['review'])){
    $message = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (message) VALUES (?)");
    $stmt->bind_param("s", $message);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Mensaje Enviado";
    } else {
        $_SESSION['message'] = "Error al enviar el mensaje: " . $stmt->error;
    }

    $stmt->close();
    
    // Redirigir después de procesar el formulario
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>


<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
}
?>

<h1>Envíe su reseña</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <textarea name="review" rows="6" cols="50"></textarea> <br />
    <button type="submit">Enviar</button>
</form>

<h2>Últimas reseñas</h2>

<?php
// Consulta para obtener las últimas reseñas
$sql = "SELECT message FROM reviews ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar las reseñas
    while($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<p>" . htmlspecialchars($row["message"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "No hay reseñas aún.";
}

// Cerrar la conexión
$conn->close();
?>
