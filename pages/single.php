<?php

include('../header.php');
require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';

$Producto = new Producto;
$productIndividual = $Producto->verProductoPorID();

?>

<script src="../inc/js/addProduct.js"></script>


<div class="container">
    <div class="row">
        <form action="../ajax/fetch_addProduct.php" method="post">
            <input type="hidden" name="productId" value="<?php echo $productIndividual->getProductId() ?>" />
            <input type="hidden" name="productTitle" value="<?php echo $productIndividual->getProductTitle() ?>" />
            <input type="hidden" name="productImage" value="<?php echo $productIndividual->getProductImage() ?>" />
            <input type="hidden" name="productPrice" value="<?php echo $productIndividual->getProductPrice() ?>" />

            <div class="col-8">
                <img src="<?php echo '../uploads/' . $productIndividual->getProductImage() ?>" width="100%" height="800px" style="object-fit: cover;" />
            </div>
            <div class="col-4">
                <div>
                    <h1 class="product_title"><?php echo $productIndividual->getProductTitle() ?></h1>
                    <h3>Precio: $<?php echo $productIndividual->getProductPrice() ?></h3>
                    <p>La camiseta alternativa de Argentina representa la igualdad de género. Esta versión para jovenes, luce tonos morados vibrantes y estampados llamativos inspirados en el Sol de Mayo de la bandera nacional. Creada para envolver a los hinchas en comodidad, esta camiseta incorpora tecnología de absorción AEROREADY. Luce el escudo del club tejido.</p>
                </div>
                <button class="btn btn-dark mr-3">Agregar producto</button>
        </form>

    </div>


</div>
</div>

<?php

require('../footer.php');

?>