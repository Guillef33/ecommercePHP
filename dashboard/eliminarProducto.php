<?php
require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';
$Producto = new Producto;
include('../header.php');
$check = $Producto->eliminarProducto();
$css = 'danger';
$mensaje = 'No se pudo eliminar el producto';
if ($check) {
    $css = 'success';
    $mensaje = 'Producto ' . $Producto->getProductTitle() . ' eliminado correctamente';
}
?>

<main class="container">

    <h1>Baja de un producto</h1>

    <div class="alert alert-<?= $css ?> col-8 mx-auto">
        <?= $mensaje ?>
        <a href="adminProductos.php" class="btn btn-light">Volver a panel</a>
    </div>

</main>

<?php
include('../footer.php');
?>