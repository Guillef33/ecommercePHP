<?php

$cart = [$_POST['cart']];

foreach ($cart as $products) {
?>
    <ul>
        <li><?= $products['name'] ?></li>
        <li><?= $products['name'] ?></li>
    </ul>
    <p>Total: <?= $cart['total'] ?></p>
<?php
}

?>