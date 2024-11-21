<?php
require './Utilities/functions.php';

if (isset($_POST['productos'])) {
    $selectedProduct = $_POST['productos'];
    $selectedProductData = null;

    foreach ($allProducts as $product) {
        if ($product['cod'] == $selectedProduct) { // si el codigo de un de mis productos es igual al value recibido del post
            $selectedProductData = $product;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <h2>Seleccione un Producto de Tienda</h2>

    <!--Formulario para seleccionar producto-->
    <form action="" method="POST">
        <label for="productos">Productos</label>
        <select name="productos" id="productos">
            <option value="empty">Sin Selección</option>
            <?php
                if (isset($allProducts)) {
                    foreach ($allProducts as $product): ?>
                        <option value="<?php echo $product['cod']; ?>">
                            <?php echo $product['nombre_corto']; ?>
                        </option>
                    <?php endforeach;
                }
            ?>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <h2>Stock Del Producto en Tienda:</h2>
    <?php
    if (isset($selectedProductData)) {
        displayProductStock($selectedProductData);
    } else {
        echo 'Por favor, seleccione un producto.';
    }
    ?>
</body>

</html>