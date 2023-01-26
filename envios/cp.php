<?php


// input del codigo postal de origen
$cp_origen = 0;

// input del codigo postal de destino
$cp_destino = 0;

if (isset($_POST['cp_origen'])) {
    $cp_origen = $_POST['cp_origen'];
};

if (isset($_POST['cp_destino'])) {
    $cp_destino = $_POST['cp_destino'];
};

// var_dump('CP de origen es' . $cp_origen);
// var_dump('CP de destino es' . $cp_destino);

// Revisar los codigos postales de CABA
$cp_caba = [1000, 2000];

// Precio del envio
$precio_envio = 0;

// Vemos si el cp de origen corresponde a CABA
function get_origen($cp_origen, $cp_caba)
{

    if ($cp_origen > $cp_caba[0] && $cp_origen < $cp_caba[1]) {
        return 'CABA';
    }
}

function get_destino($cp_destino, $cp_caba)
{

    // Vemos si el cp de destino corresponde a CABA
    if ($cp_destino > $cp_caba[0] && $cp_destino < $cp_caba[1]) {
        return 'CABA';
    }
}

// Comprobamos si el envio es en caba y asiganos el precio fijo de CABA
if (get_origen($cp_origen, $cp_caba) && get_destino($cp_destino, $cp_caba)) {
    $precio_envio = 1000;
}

if ($precio_envio > 0) {
    echo 'Gracias. El precio de tu envio en la region de CABA es de' . $precio_envio;
}
