<?php

require('../envios/logicaCp.php');

$interes_tarjeta = null;

function getInteresTarjeta($tarjetas){

    switch ($tarjetas) {
        case 'master':
            $interes_tarjeta = 0.3;
            break;
        case 'visa':
            $interes_tarjeta = 0.4;
            break;
        case 'uala':
            $interes_tarjeta = 0.5;
            break;
        case 'american';
            $interes_tarjeta = 0.6;
            break;
    }

    return $interes_tarjeta;
}

function getInteresCuotas($numero_de_cuotas)
{
    switch ($numero_de_cuotas) {
        case '3':
            $interes_cuota = 0.3;
            break;
        case '6':
            $interes_cuota = 0.6;
            break;
        default:
            $interes_cuota = 0;
            break;
    }

    return $interes_cuota;
}

function getTotalInterestRate($tarjetas, $numero_de_cuotas) {
    $interes = getInteresTarjeta($tarjetas) * (1 + getInteresCuotas($numero_de_cuotas));
    return $interes;
}

function getTotalPriceWithoutShipment($price, $interes) {
    $total = round($price * (1 + $interes));
    return $total;
}

function getPaymentPrice($total, $numero_de_cuotas) {
    $precio_cuota = round($total / $numero_de_cuotas);
    return $precio_cuota;
}
