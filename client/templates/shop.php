<?php

require '../../config/config.php';
require '../../clases/Connection.php';
require '../../clases/Product.php';
require '../../clases/Category.php';
$Producto = new Producto;
$productos = $Producto->listarProductos();
include('../../header.php');

?>

<main class="container">
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <?php

                foreach ($productos as $producto) {
                    //    var_dump($producto);

                ?>
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title><?php echo $producto['productTitle'] ?></title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $producto['productTitle'] ?></text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text"><?php echo $producto['productCategory'] ?></p>
                                <p class="card-text"><?php echo $producto['productPrice'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
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
include('../../footer.php');
?>