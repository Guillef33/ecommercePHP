<?php

require('../../header.php');

// var_dump(realpath(dirname(__FILE__)));
// var_dump(DIRECTORY_SEPARATOR);

?>

<?php require('../../calculadora/logica.php'); ?>
<?php require('../../persistirOrden.php'); ?>
<?php require('../../crearOrden.php'); ?>

<?php

if (isset($_POST['cuotas'])) {
    $numero_de_cuotas = $_POST['cuotas'];
};

if (isset($_POST['tarjetas'])) {
    $tarjeta = $_POST['tarjetas'];
};


if (isset($_POST['cp_origen'])) {
    $cp_origen = $_POST['cp_origen'];
};

if (isset($_POST['cp_destino'])) {
    $cp_destino = $_POST['cp_destino'];
};

?>


<?php
//TODO: remove hardcoded values:
$price = 2000;

//Set final values
$interes = getTotalInterestRate($tarjeta, $numero_de_cuotas);
$total = getTotalPriceWithoutShipment($price, $interes);
$precio_cuota = getPaymentPrice($total, $numero_de_cuotas);
$texto_cuotas = '<p class="alert alert-danger" role="alert">Elegiste ' . $tarjeta . ' en ' . $numero_de_cuotas .  ' cuotas y el precio que vas a pagar en total es de ' . $total .  ' y el monto por cuota es de ' . $precio_cuota . '</p>';
$precio_envio = (canISend() && canIPickUp()) ? getPrecioEnvio() : 0;

?>



<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="../..//inc/img/images/alternativa.jpg" width="100%" height="800px" style="object-fit: cover;" />

        </div>
        <div class="col-4">
            <div>
                <h1 class="product_title">Camiseta oficial Argentina</h1>
                <h3>Precio: $' . <?php echo $price ?> . '</h3>
                <p>La camiseta alternativa de Argentina representa la igualdad de género. Esta versión para jovenes, luce tonos morados vibrantes y estampados llamativos inspirados en el Sol de Mayo de la bandera nacional. Creada para envolver a los hinchas en comodidad, esta camiseta incorpora tecnología de absorción AEROREADY. Luce el escudo del club tejido.</p>
            </div>

            <?php require('../../calculadora/calculadora.php'); ?>

            <?php echo (isset($numero_de_cuotas) &&  isset($tarjeta)) ? $texto_cuotas : ''; ?>

            <?php require('../../envios/envios.php'); ?>

            <?php
            if (isset($cp_destino) && isset($cp_origen)) {
                echo getErrorStringCp($cp_origen, $cp_destino);
            }
            ?>


            <?php
            echo $precio_envio > 0
                ? '<p class="alert alert-danger" role="alert">El precio de tu envio en la region de CABA es de' . $precio_envio . '</p>'
                : ''
            ?>



        </div>

        <div>
            <form action="persistirOrden.php" method="post">
                <h2>Detalle de tu compra</h2>
                <p>Precio: <?php echo $price ?> </p>
                <p>Envio: <?php echo $precio_envio > 0 ? $precio_envio : '' ?></p>
                <p>Pago con tarjeta: <?php echo $total - $price ?></p>
                <p>Total: <?php echo $total + $precio_envio ?></p>
                <button type="submit" name="compro">Comprar</button>

            </form>
            <?php if (isset($_POST['compro'])) {
                persistir(newOrder($price, $tarjeta, $precio_envio, $total, $numero_de_cuotas));
            } ?>
        </div>

    </div>
</div>


</div>

<?php

require('../../footer.php');

?>