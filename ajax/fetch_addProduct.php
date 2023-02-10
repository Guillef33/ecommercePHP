<?php

require_once("../clases/Product.php");
$Producto = new Producto();
// $productId = $_GET["productId"];
// $productTitle = $_GET["productTitle"];

$addCart = $_GET['AddCart'];

// var_dump($productId, $productTitle);
var_dump($addCart);
$agregarCarrito = $Producto->agregarAlCarrito($productId, $productTitle);

return json_encode($agregarCarrito);
