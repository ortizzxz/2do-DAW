
<?php
if (!is_dir('assets/img')) {
    echo "No tenemos imagenes";
} else {
    foreach ($mazo as $carta) {
        $image = "./assets/img/" . $carta->getPaloCarta() . "_" . $carta->getNumeroCarta() . ".jpg";

        if (file_exists($image)) {
            echo "<img src='$image'/>";
        } else {
            echo "No tenemos la imagen de esta carta";
        }
    }
}
?>
