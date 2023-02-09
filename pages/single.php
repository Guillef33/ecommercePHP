<?php

include('../header.php');
require '../config/config.php';
require '../clases/Connection.php';
require '../clases/Product.php';

$Producto = new Producto;
$productIndividual = $Producto->verProductoPorID();

?>



<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="<?php echo '../uploads/' . $productIndividual->getProductImage() ?>" width="100%" height="800px" style="object-fit: cover;" />

        </div>
        <div class="col-4">
            <div>
                <h1 class="product_title"><?php echo $productIndividual->getProductTitle() ?></h1>
                <h3>Precio: $<?php echo $productIndividual->getProductPrice() ?></h3>
                <p>La camiseta alternativa de Argentina representa la igualdad de género. Esta versión para jovenes, luce tonos morados vibrantes y estampados llamativos inspirados en el Sol de Mayo de la bandera nacional. Creada para envolver a los hinchas en comodidad, esta camiseta incorpora tecnología de absorción AEROREADY. Luce el escudo del club tejido.</p>
            </div>
            <form action="cart.php?productId=<?= $productIndividual->getProductId() ?>" method="post">
                <button class="btn btn-dark mr-3">Agregar producto</button>
            </form>

        </div>


    </div>
</div>

<?php

require('../footer.php');

?>