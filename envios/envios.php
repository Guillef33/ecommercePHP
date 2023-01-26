<?php

require('cp.php')

?>

<form method="post">
    <div class="input-group mb-3">

        <input type="text" name="cp_origen" class="form-control" placeholder="Ingrese el CP de origen">
    </div>
    <input type="text" name="cp_destino" class="form-control" placeholder="Ingrese el CP de destino">
    <button type="submit" class="btn btn-dark">Calcular precio de envios</button>
</form>