<?php


require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
$Categoria = new Category;
$chequeo = $Categoria->modificarCategoria();

include('../../header.php');

?>

<main class="container">

    <h1>Modificación de una categoria</h1>

    <?php
    $mensaje = 'No se pudo modificar la región';
    $css     = 'danger';
    if ($chequeo) {
        $mensaje = 'Categoria ' . $Categoria->getCatName() . ' modificada correctamente';
        $css     = 'success';
    }
    ?>
    <div class="alert alert-<?= $css ?>">
        <?= $mensaje ?>
        <a href="adminCategorias.php" class="btn btn-light">volver a panel</a>
    </div>

</main>


<?php
include('../../footer.php');
?>