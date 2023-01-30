<?php

require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';
$Producto = new Producto;
include('../header.php');
$Producto->verProductoPorID();


var_dump($Producto->getProductId());
var_dump($Producto->verProductoPorID());
var_dump($producto['productId']);

?>



<main class="container">
    <h1>Modificación de un Producto</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="modificarProducto.php" method="post">

            <div class="form-group">
                <label for="destNombre">Nombre del Producto:</label>
                <input type="text" name="productTitle" value="<?= $Producto->getProductTitle(); ?>" id="productTitle" class="form-control" required>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="productPrice" value="<?= $Producto->getProductPrice(); ?>" class="form-control" placeholder="Ingrese el precio" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="media" name="productImage" value="<?= $Producto->getProductImage(); ?>" class="form-control" placeholder="Clic para modificar la imagen" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="text" name="productCategory" value="<?= $Producto->getProductCategory(); ?>" class="form-control" placeholder="Elegir la categoria del productow" required>
                </div>
            </div>

            <input type="hidden" name="productId" value="<?= $Producto->getProductId() ?>">
            <button class="btn btn-dark mr-3">Modificar Producto</button>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de Productos
            </a>

        </form>

    </div>


</main>

<?php
include('../footer.php');
?>