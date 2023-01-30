<?php
require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';
$Producto = new Producto;
include('../header.php');
$Producto->verProductoPorID();

var_dump($producto['productId']);
var_export($Producto->getProductId());
?>

<main class="container">

    <h1>Confirmación de baja de un producto</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">
        <form action="eliminarProducto.php" method="post">
            <soan class="lead">Se eliminará el producto <?= $Producto->getProductTitle(); ?> </soan>
            <br>
            Producto: <?= $Producto->getProductId() ?> <br>
            Precio: $<?= $Producto->getProductPrice() ?> <br>

            <input type="hidden" name="productTitle" value="<?= $Producto->getProductTitle() ?>">
            <input type="hidden" name="productId" value="<?= $Producto->getProductId() ?>">
            <button class="btn btn-danger">
                Confirmar Baja
            </button>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de producto
            </a>
        </form>
    </div>

    <script>
        Swal.fire(
            'Advertencia',
            'Si pulsa el bot´´on "Confirmar baja", se eliminará el producto',
            'warning'
        );
    </script>

</main>

<?php
include('../footer.php');
?>