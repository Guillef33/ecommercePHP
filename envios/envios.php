<?php

require('cp.php')

?>

<div class="plugin-wrapper">
    <form method="post">
        <h3 class="plugin-title">¡Conoce cuanto vas a pagar de envio</h3>
        <p>Ingresa tu CP de origen y destino</p>
        <div class="input-group mb-6">
            <input type="text" name="cp_origen" class="form-control" placeholder="Ingrese el CP de origen">
        </div>
        <div class="input-group mb-6">
            <input type="text" name="cp_destino" class="form-control" placeholder="Ingrese el CP de destino">
        </div>
        <button type="submit" class="btn btn-dark">Calcular precio de envios</button>
    </form>
</div>