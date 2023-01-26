<?php

//Productos
require('db.php');
require('./calculadora/logica.php');
require('./envios/cp.php');


var_dump($tarjetas, $precio_envio, $total, $numero_de_cuotas, $price);

// To DO: mejorar esto
$last_id = mysqli_query($connection, 'SELECT * FROM ordenes')->num_rows;
var_dump($last_id);

$insertar_nuevo_orden = "INSERT INTO ordenes (id_orden, id_producto, precio, id_usuario, tarjeta, costo_envio, total, cantidad, numero_de_cuotas ) 
VALUES ($last_id + 1, 2, $price, 3, 2, $precio_envio, $total, 6, $numero_de_cuotas)";

// Todo Do PDO
$resultado = mysqli_query($connection, $insertar_nuevo_orden);

var_dump($connection);
var_dump($resultado);
