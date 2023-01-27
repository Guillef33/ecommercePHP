<?php



function getConnection() {

    // Se referencia cada vez que busquemos conectarnos con base de datos
    $connection = mysqli_connect('localhost', 'root', '', 'ecommercephp');
    return $connection;
}

?>