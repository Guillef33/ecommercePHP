<?php

//Productos
require('db.php');

$select = 'SELECT * from productos';

$insertar_nuevo_producto = "INSERT INTO productos (title, price, image, description, category ) 
VALUES ('Camiseta Argentina', 1000, 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes')";

$resultado = mysqli_query($connection, $insertar_nuevo_producto);

var_dump($connection);
var_dump($resultado);

?>

