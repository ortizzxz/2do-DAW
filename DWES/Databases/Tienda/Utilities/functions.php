<?php
    require_once './Config/ConstDB.php';
    require_once 'Autoloader.php';

    use Library\MyPDO;

    function fetchAllProducts(){
        try {
            $conexion = new MyPDO();

            try {

                $s = $conexion->prepare('SELECT * FROM productos GROUP BY nombre_corto ASC');
                // hazlo asociativo
                $s->setFetchMode(PDO::FETCH_ASSOC);
                $s->execute();

                $allProductos = $s->fetchAll();
                return $allProductos;
            } catch (PDOException $e) {
                echo 'Error: ' . $e;
            }
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e;
        }

        unset($conexion);
    }

    function productAvailability($input){
        try {
            $conexion = new MyPDO();
            $producto = $input;
            try {

                $s = $conexion->prepare('SELECT tiendas.nombre, stock.unidades FROM tiendas INNER JOIN stock ON tiendas.cod = stock.tienda
                                        WHERE stock.producto = :producto');

                $s->setFetchMode(PDO::FETCH_ASSOC); // hazlo asociativo
                $s->bindParam(':producto', $producto);
                $s->execute();

                $allProductos = $s->fetchAll();
                return $allProductos;
            } catch (PDOException $e) {
                echo 'Error: ' . $e;
            }
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e;
        }

        unset($conexion);
    }

    function displayProductStock($selectedProductData){
        $productCod = $selectedProductData['cod'];
            echo '<h3>Producto: '. $selectedProductData['nombre_corto']. '</h3>';

            $disponibilidad = productAvailability($productCod);
            if ($disponibilidad) {
                echo "<h3>Disponibilidad en tiendas:</h3>";
                foreach ($disponibilidad as $tienda) {
                    echo $tienda['nombre']. " - Unidades: ". $tienda['unidades']. "<br>";
                }
            } else {
                echo "No hay disponibilidad para este producto.";
            }
    }

    $allProducts = fetchAllProducts();
    
?>
