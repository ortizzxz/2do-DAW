<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validación de campos
    $tipo = $_POST['tipo'];
    $zona = $_POST['zona'];
    $direccion = $_POST['direccion'];
    $dormitorios = (int)$_POST['dormitorios'];
    $precio = (float)$_POST['precio'];
    $tamano = (int)$_POST['tamano'];
    $extras = isset($_POST['extras']) ? implode(', ', $_POST['extras']) : 'Ninguno';
    $observaciones = $_POST['observaciones'];

    // Validación y manejo de la foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        if ($_FILES['foto']['size'] <= 100 * 1024) { // 100 KB
            $fotoPath = 'fotos/' . basename($_FILES['foto']['name']);
            if (!file_exists('fotos')) {
                mkdir('fotos', 0777, true);
            }
            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
            $fotoLink = "<a href='$fotoPath' target='_blank'>Ver Foto</a>";
        } else {
            die("Error: La foto excede el tamaño máximo permitido.");
        }
    } else {
        $fotoLink = "No se subió ninguna foto.";
    }

    // Cálculo del beneficio
    $porcentajeBeneficio = 0;
    switch ($zona) {
        case 'Centro':
            $porcentajeBeneficio = ($tamano > 100) ? 0.35 : 0.30;
            break;
        case 'Zaidín':
            $porcentajeBeneficio = ($tamano > 100) ? 0.28 : 0.25;
            break;
        case 'Chana':
            $porcentajeBeneficio = ($tamano > 100) ? 0.25 : 0.22;
            break;
        case 'Albaicín':
            $porcentajeBeneficio = ($tamano > 100) ? 0.35 : 0.20;
            break;
        case 'Sacromonte':
            $porcentajeBeneficio = ($tamano > 100) ? 0.25 : 0.22;
            break;
        case 'Realejo':
            $porcentajeBeneficio = ($tamano > 100) ? 0.28 : 0.25;
            break;
    }
    $beneficio = $precio * $porcentajeBeneficio;

    // Almacenamiento de los datos
    $dataLine = "$tipo, $zona, $direccion, $dormitorios, $precio, $tamano, $extras, \"$observaciones\", Beneficio: $beneficio\n";
    file_put_contents('viviendas.txt', $dataLine, FILE_APPEND);

    // Mostrar resultados
    echo "<h2>Vivienda registrada correctamente</h2>";
    echo "<p>Tipo: $tipo</p>";
    echo "<p>Zona: $zona</p>";
    echo "<p>Dirección: $direccion</p>";
    echo "<p>Dormitorios: $dormitorios</p>";
    echo "<p>Precio: $$precio</p>";
    echo "<p>Tamaño: {$tamano}m²</p>";
    echo "<p>Extras: $extras</p>";
    echo "<p>Observaciones: $observaciones</p>";
    echo "<p>$fotoLink</p>";
    echo "<p>Beneficio estimado para la empresa: $$beneficio</p>";
}
?>