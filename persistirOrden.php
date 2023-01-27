<?php

require('db.php');

$db = getConnection();

function persistir($order) {
    global $db;
    //Get Last order Id
    $last_id = mysqli_query($db, 'SELECT * FROM ordenes')->num_rows;

    //Add order Id to order values in first position.
    $order = array_unshift($order, $last_id +1);

    // To DO: mejorar esto
    $insertar_nuevo_orden = "INSERT INTO ordenes 
        (id_orden, id_producto, precio, id_usuario, tarjeta, costo_envio, total, cantidad, numero_de_cuotas) 
    VALUES 
        ($order)";

    // Todo Do PDO
    mysqli_query($db, $insertar_nuevo_orden);
}
