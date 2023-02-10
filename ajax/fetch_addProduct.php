<?php

require("../clases/Connection.php");
require_once("../clases/Product.php");
$Producto = new Producto();
$productId = $_POST["productId"];
$productTitle = $_POST["productTitle"];
$productImage = $_POST["productImage"];
$productPrice = $_POST["productPrice"];

var_dump($productId);
var_dump($productTitle);

// unset($_SESSION);

$agregarCarrito = $Producto->agregarAlCarrito($productId, $productTitle, $productImage, $productPrice);


var_dump(json_encode($agregarCarrito));

return json_encode($agregarCarrito);
