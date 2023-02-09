<?php
require 'config/config.php';
require 'clases/Connection.php';
require 'clases/Product.php';
$Producto = new Producto;
$productos = $Producto->listarProductos();
require('header.php');
?>

<main class="container">
    <div class="row">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">La tienda de los campeones del mundo</h1>
                <p class="lead fw-normal">Elegi los mejores productos de la seleccion argentina.</p>
                <a class="btn btn-outline-secondary" href="http://localhost/PHPTraining/calculadora/pages/shop">Ir a la tienda</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>

    <div class="row">

        <?php

        foreach (array_slice($productos, 0, 3) as $producto) {
        ?>
            <div class="col-4">
                <div class="card shadow-sm">
                    <img src="<?php echo 'uploads/' . $producto['productImage']  ?>" style="height: 300px; object-fit: cover;" />
                    <div class="card-body">
                        <h2><?php echo $producto['productTitle'] ?></h2>
                        <p class="card-text"><?php echo "Categoria:" . $producto['catName'] ?></p>
                        <p class="card-text"><?php echo "Precio:" . $producto['productPrice'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="pages/single.php?productId=<?= $producto['productId'] ?>">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                </a>
                                <!-- <button class="btn btn-dark mr-3">Agregar producto</button> -->
                            </div>
                            <small class="text-muted">Adidas</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>

    </div>

</main>


</div>

<?php

require('footer.php');

?>