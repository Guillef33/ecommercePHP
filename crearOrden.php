<?php




function newOrder($price, $tarjeta, $costo_envio, $total, $numero_de_cuotas) {
//TODO: Remove harcoded values
    $id_producto = 1;
    $id_usuario = 3;
    $cantidad = 6;


    return [$id_producto, $price, $id_usuario, $tarjeta, $costo_envio, $total, $cantidad, $numero_de_cuotas];

}

?>