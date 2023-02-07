<?php

require '../../config/config.php';
require '../../clases/Connection.php';
require '../../clases/Product.php';
require '../../clases/Category.php';
$Producto = new Producto;
$productos = $Producto->listarProductos();
include('../../header.php');

$images = $Producto->uploadImages();

$Categoria = new Category;
$categorias = $Categoria->listarCategorias();

?>

<main class="container">
    <h1>Alta de un nuevo producto</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="agregarProducto.php" method="post" enctype='multipart/form-data'>

            <div class="form-group">
                <label for="productTitle">Nombre del Producto:</label>
                <input type="text" name="productTitle" id="productTitle" class="form-control" required>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="productPrice" class="form-control" placeholder="Ingrese el precio" required>
                </div>
            </div>

            <!-- <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="number" name="productCategory" class="form-control" placeholder="Ingrese la categoria" required>
                </div>
            </div> -->

            <div class="form-group">
                <label for="catId">Categoria</label>
                <select name="catId" id="catId" class="form-control" required>
                    <option value="">Seleccione una categoria</option>
                    <?php
                    foreach ($categorias as $categoria) {
                    ?>
                        <option value="<?= $categoria['catId'] ?>"><?= $categoria['catName'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <!-- <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="text" name="image" class="form-control" placeholder="Ingrese la url de la imagen" required>
                </div>
            </div> -->

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <input type='file' name="productImage" id="productImage" />
                        <!-- <input type='submit' value='Submit' name='submit' /> -->
                    </div>
                </div>
            </div>



            <button class="btn btn-dark mr-3">Agregar producto</button>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de productos
            </a>

        </form>

    </div>


</main>

<?php
include('../../footer.php');
?>