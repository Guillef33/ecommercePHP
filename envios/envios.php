<?php

require('cp.php')

?>


<form method="post">
    <h3>¡Conoce cuanto vas a pagar de envio</h3>
    <h5>Ingresa tu CP de origen y destino</h5>
    <div class="input-group mb-6">
        <input type="text" name="cp_origen" class="form-control" placeholder="Ingrese el CP de origen">
    </div>
    <div class="input-group mb-6">
        <input type="text" name="cp_destino" class="form-control" placeholder="Ingrese el CP de destino">
    </div>
    <button type="submit" class="btn btn-dark">Calcular precio de envios</button>
</form>