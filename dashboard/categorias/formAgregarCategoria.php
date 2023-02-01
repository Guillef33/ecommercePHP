<?php
require '../../config/config.php';
require '../../clases/Category.php';
require '../../clases/Connection.php';
include('../../header.php');
?>

<main class="container">
    <h1>Alta de una nueva categoria</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="agregarCategoria.php" method="post">

            <div class="form-group">
                <label for="regNombre">Nombre de la categoria:</label>
                <input type="text" name="catName" id="catName" class="form-control">
            </div>

            <label for="catName">Nombre de la categoria:</label>
            <button class="btn btn-dark">Agregar </button>
            <a href="adminCategorias.php" class="btn btn-outline-secondary">
                Volver a panel de regiones
            </a>
        </form>

    </div>


</main>

<?php
include('../../footer.php');
?>