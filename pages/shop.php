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

                foreach ($productos as $producto) {
                ?>
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo '../uploads/' . $producto['productImage']  ?>" />
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title><?php echo $producto['productTitle'] ?></title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $producto['productTitle'] ?></text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text"><?php echo "Categoria:" . $producto['productCategory'] ?></p>
                                <p class="card-text"><?php echo "Precio:" . $producto['productPrice'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="single.php?productId=<?= $producto['productId'] ?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                        </a>
                                        <button class="btn btn-dark mr-3">Agregar producto</button>

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