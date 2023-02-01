<?php

require 'config/config.php';
$Categoria = new Category;
$registros = $Categoria->confirmarBaja();
include 'includes/over-all-header.html';
include 'includes/nav.php';
?>

<main class="container">

    <h1>Baja de una categoria</h1>
    <div class="alert alert-danger col-8 mx-auto p-3">
        <a href="adminRegiones.php" class="btn btn-light">
            Volver a panel
        </a>
        <?php
        if ($registros > 0) {
        ?>
            No se puede eliminar la categoria
            <?= $Categoria->getCatName(); ?>
            ya que tiene destinos relacionados.
        <?php
        } else {
        ?>
            <form action="eliminarRegion.php" method="post">
                Se eliminará la región <?= $Categoria->getCatName(); ?>
                <input type="hidden" name="regID" value="<?= $Categoria->getCatId(); ?>">
                <input type="hidden" name="regNombre" value="<?= $Categoria->getCatName(); ?>">
                <button class="btn btn-danger">
                    Confirmar baja
                </button>
                <script>
                    Swal.fire(
                        'Advertencia',
                        'Si pulsa el botón "Confirmar Baja", se eliminará la categoria seleccionada.',
                        'warning'
                    )
                </script>
            </form>
        <?php
        }
        ?>

    </div>

</main>

<?php
include 'includes/footer.php';
?>