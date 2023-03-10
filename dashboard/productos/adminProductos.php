<?php

require '../../config/config.php';
require '../../clases/Connection.php';
require '../../clases/Product.php';
$Producto = new Producto;
$productos = $Producto->listarProductos();
include('../../header.php');
?>

<main class="container">
    <h1>Panel de administración de productos</h1>

    <a href="../categorias/adminCategorias" class="btn btn-outline-secondary">
        Ver Categorias <i class="far fa-edit ml-1"></i>
    </a>

    <table class="table table-borderless table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre de Producto</th>
                <th>Precio</th>
                <th>Category</th>
                <th>Imagen</th>
                <th colspan="2">
                    <a href="formAgregarProducto.php" class="btn btn-outline-secondary">
                        Agregar <i class="far fa-plus-square ml-1"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {
            ?>
                <tr>
                    <td><?= $producto['productId'] ?></td>
                    <td><?= $producto['productTitle'] ?></td>
                    <td>$<?= $producto['productPrice'] ?></td>
                    <td><?= $producto['catName'] ?></td>
                    <td><img class="image-dashboard" src="<?= '../../uploads/' . $producto['productImage'] ?>" /></td>

                    <td>
                        <a href="formModificarProducto.php?productId=<?= $producto['productId'] ?>" class="btn btn-outline-secondary">
                            Modificar <i class="far fa-edit ml-1"></i>
                        </a>

                    </td>
                    <td>
                        <a href="formEliminarProducto.php?productId=<?= $producto['productId'] ?>" class="btn btn-outline-secondary">
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