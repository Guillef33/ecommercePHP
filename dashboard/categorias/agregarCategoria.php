<?php

require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
$Categoria = new Category;
$chequeo = $Categoria->agregarCategoria();
include('../../header.php');

?>

<main class="container">

    <h1>Alta de una categoria</h1>

    <?php
    $mensaje = 'No se pudo agregar la categoria';
    $css     = 'danger';
    if ($chequeo) {
        $mensaje = 'cCtegoria ' . $Categoria->getCatName() . ' agregada correctamente';
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