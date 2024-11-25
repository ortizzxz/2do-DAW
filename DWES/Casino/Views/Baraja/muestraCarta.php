
<?php
if (!is_dir('assets/img')) {
    echo "No tenemos imagenes";
} else {
    $image = "./assets/img/" . $carta->getPaloCarta() . "_" . $carta->getNumeroCarta() . ".jpg";

    if (file_exists($image)) {
        echo "<img src='$image'/>";
    } else {
        echo "No tenemos la imagen de esta carta";
    }

    echo '<br/>';
    echo '<br/>';

    foreach ($mazo as $cartas) {
        $image = "./assets/img/" . $cartas->getPaloCarta() . "_" . $cartas->getNumeroCarta() . ".jpg";

        if (file_exists($image)) {
            echo "<img src='$image'/>";
        } else {
            echo "No tenemos la imagen de esta carta";
        }
    }
}
?>
