<?php
require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
$Categoria = new Category;
$categorias = $Categoria->listarCategorias();
include('../../header.php');
?>

<main class="container">

    <h1>Panel de administración de categorias</h1>

    <table class="table table-borderless table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Categorias</th>
                <th colspan="2">
                    <a href="formAgregarCategoria.php" class="btn btn-outline-secondary">
                        Agregar <i class="far fa-plus-square ml-1"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categorias as $categoria) {
            ?>
                <tr>
                    <td><?= $categoria['catId'] ?></td>
                    <td><?= $categoria['catName'] ?></td>
                    <td>
                        <a href="formModificarCategoria.php?catId=<?= $categoria['catId'] ?>" class="btn btn-outline-secondary">
                            Modificar <i class="far fa-edit ml-1"></i>
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarCategoria.php?catId=<?= $categoria['catId'] ?>" class="btn btn-outline-secondary">
                            Eliminar <i class="far fa-minus-square ml-1"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</main>

<?php
include('../../footer.php');
?>