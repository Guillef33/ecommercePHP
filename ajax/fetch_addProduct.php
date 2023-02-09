<?php 
    
    require_once("../clases/Product.php");
    $product = new Producto();
    $respuesta = $product->agregarAlCarrito($_GET["id"],$_GET["productTitle"]);
    return json_encode($respuesta);
?>