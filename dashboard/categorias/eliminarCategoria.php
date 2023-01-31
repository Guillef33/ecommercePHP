<?php
require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
$Categoria = new Category;
$chequeo = $Categoria->eliminarCategoria();

$css = 'danger';
$mensaje = 'No se pudo eliminar la categoria';
if ($chequeo) {
    $css = 'success';
    $mensaje = 'Categoria' . $Categoria->getCatName() . ' eliminada correctamente';
}

include('../../header.php');
?>

<main class="container">

    <h1>Baja de una categoria</h1>

    <div class="alert alert-<?= $css ?>">
        <?= $mensaje ?>
        <a href="adminCategoria.php" class="btn btn-light ml-2">
            volver a panel
        </a>
    </div>

</main>

<?php
include('../../footer.php');
?>