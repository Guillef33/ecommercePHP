<?php

require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';
require '../clases/Category.php';
$Producto = new Producto;
$productos = $Producto->listarProductos();
include('../header.php');

?>

<main class="container">

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <?php

                foreach (array_slice($productos, 0, 9) as $producto) {
                ?>
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo '../uploads/' . $producto['productImage']  ?>" style="height: 300px; object-fit: cover;" />
                            <div class="card-body">
                                <h2><?php echo $producto['productTitle'] ?></h2>
                                <p class="card-text"><?php echo "Categoria:" . $producto['catName'] ?></p>
                                <p class="card-text"><?php echo "Precio:" . $producto['productPrice'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="single.php?productId=<?= $producto['productId'] ?>">
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
        </div>
    </div>

</main>

<?php
include('../footer.php');
?>