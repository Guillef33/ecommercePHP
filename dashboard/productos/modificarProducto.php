<?php
require '../../config/config.php';
require '../../clases/Connection.php';
require '../../clases/Product.php';
$Producto = new Producto;
$chequeo = $Producto->modificarProducto();
include('../../header.php');

?>

<main class="container">

    <h1>Modificacíon de un producto</h1>

    <?php
    $mensaje = 'No se pudo modificar el producto';
    $css     = 'danger';
    if ($chequeo) {
        $mensaje = 'Producto ' . $Producto->getProductTitle() . ' modificado correctamente';
        $css     = 'success';
    }
    ?>
    <div class="alert alert-<?= $css ?>">
        <?= $mensaje ?>
        <a href="adminProductos.php" class="btn btn-light">volver a panel</a>
    </div>

</main>

<?php
include('../../footer.php');
?>