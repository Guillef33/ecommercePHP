<?php

$price = 2000;

// var_dump($_POST);

if (isset($_POST['cuotas'])) {
    $numero_de_cuotas = $_POST['cuotas'];
};

if (isset($_POST['tarjetas'])) {
    $tarjetas = $_POST['tarjetas'];
};

$interes_tarjeta = null;

switch ($tarjetas) {
    case ($tarjetas = 'master'):
        $interes_tarjeta = 0.3;
        break;
    case ($tarjetas = 'visa'):
        $interes_tarjeta = 0.4;
        break;
    case ($tarjetas = 'uala'):
        $interes_tarjeta = 0.5;
        break;
    default:
        ($tarjetas = 'american');
        $interes_tarjeta = 0.6;
        break;
}


switch ($numero_de_cuotas) {
    case $numero_de_cuotas = '3':
        $interes_cuota = 0.3;
        break;
    case $numero_de_cuotas = '6':
        $interes_cuota = 0.6;
        break;
    default:
        $numero_de_cuotas = '1';
        $interes_cuota = 0.1;
        break;
}

$interes = $interes_tarjeta * (1 + $interes_cuota);

$total = round($price * (1 + $interes));

$precio_cuota = round($total / $numero_de_cuotas);
// Solucion temporal usar valor de array $_POST
if (isset($_POST['cuotas']) &&  (isset($_POST['tarjetas']))) {
    echo '<p class="alert alert-danger" role="alert">Elegiste ' . $_POST['tarjetas'] . 'en ' . $_POST['cuotas'] .  ' cuotas y el precio que vas a pagar en total es de ' . $total .  'y el monto por cuota es de ' . $precio_cuota . '</p>';
}

// Actualizar precio con el total?
$price = $total;
// echo  "<div class='container'><h1>El precio de este producto es de $price </h1></div>";
