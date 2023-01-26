<?php

require('header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="./inc/img/images/alternativa.jpg" width="100%" height="800px" style="object-fit: cover;" />

        </div>
        <div class="col-4">
            <div>
                <h1 class="product_title">Camiseta oficial Argentina</h1>
                <h3>Precio: $2000</h3>
                <p>La camiseta alternativa de Argentina representa la igualdad de género. Esta versión para jovenes, luce tonos morados vibrantes y estampados llamativos inspirados en el Sol de Mayo de la bandera nacional. Creada para envolver a los hinchas en comodidad, esta camiseta incorpora tecnología de absorción AEROREADY. Luce el escudo del club tejido.</p>
            </div>
            <?php require('./calculadora/calculadora.php');
            ?>
            <?php // require('./calculadora/logica.php');
            ?>

            <?php // require('./envios/envios.php'); 
            ?>
            <?php // require('./envios/cp.php');
            ?>

            <?php // require('./crearOrden.php'); 
            ?>
            <?php // require('./persistirOrden.php'); 
            ?>


            <?php


            ?>

            <?php if (isset($_POST['compro'])) {
                persistir($connection, $order);
            }   
            ?>

        </div>
        <div>
            <form action="persistirOrden.php" method="post">
                <h2>Detalle de tu compra</h2>
                <p>Precio: <?php echo $price ?> </p>
                <p>envio <?php echo $precio_envio  ?></p>
                <p>Pago con tarjeta: <?php echo $total - $price ?></p>
                <p>Total: <?php echo $total + $precio_envio ?></p>
                <button type="submit" name="compro" value="compro">Comprar</button>

            </form>




        </div>

    </div>
</div>


</div>

<?php

require('footer.php');

?>