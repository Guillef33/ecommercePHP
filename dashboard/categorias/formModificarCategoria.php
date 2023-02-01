<?php
require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
$Categoria = new Category;
$Categoria->verCategoriaPorID();

include('../../header.php');
?>

<main class="container">
    <h1>Modificación de una categoria</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="modificarCategoria.php" method="post">

            <div class="form-group">
                <label for="regNombre">Nombre de la categoria:</label>
                <input type="text" name="catName" value="<?= $Categoria->getCatName(); ?>" id="catName" class="form-control">
                <input type="hidden" name="catId" value="<?= $Categoria->getCatId() ?>">
            </div>

            <button class="btn btn-dark">Modificar categoria</button>
            <a href="adminCategorias.php" class="btn btn-outline-secondary">
                Volver a panel de categorias
            </a>
        </form>

    </div>


</main>

<?php
include('../../footer.php');
?>