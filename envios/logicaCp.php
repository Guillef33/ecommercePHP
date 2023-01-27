<?php

//TODO: remove hardcoded values to db.
$precios_envio = ['CABA' => 1000]; //Precio solo existe para CABA
$origenes_posibles = ['CABA'];
$destinos_posibles = ['CABA'];




// input del codigo postal de origen
$cp_origen = 0;

// input del codigo postal de destino
$cp_destino = 0;

// Revisar los codigos postales de CABA
$cp_caba = [1000, 2000];

//Origen
$origen = get_origen($cp_origen);
//Destino
$destino = get_destino($cp_destino);


// Vemos si el cp de origen corresponde a CABA
function get_origen($cp_origen) {
    global $cp_caba;
    if ($cp_origen > $cp_caba[0] && $cp_origen < $cp_caba[1]) {
        return 'CABA';
    }
}

// Vemos si el cp de destino corresponde a CABA
function get_destino($cp_destino) {
    global $cp_caba;
    if ($cp_destino > $cp_caba[0] && $cp_destino < $cp_caba[1]) {
        return 'CABA';
    }
}

//Construyo String de error por destino y/o origen invalidos.
function getErrorStringCp ($cp_origen, $cp_destino) {
    global $destinos_posibles;
    global $origenes_posibles;
    $origen = get_origen($cp_origen);
    $destino = get_destino($cp_destino);

    if (!canISend($destino, $destinos_posibles) && !canIPickUp($origen, $origenes_posibles)){
        return '<p>Disculpa, el servicio de mensajeria solo esta disponible en Buenos Aires</p>';

    }
    else if(!canIPickUp()) {
        return '<p>Disculpa, el servicio de recogida solo esta disponible en Buenos Aires</p>';
    }
    else if(!canISend()){
        return '<p>Disculpa, no enviamos afuera de Buenos Aires</p>';
    }
    else {
        return '';
    }

}


// Compruebo si el servicio de mensajeria funciona en Origen/Destino
function canISend() {
    global $destino;
    globaL $destinos_posibles;

  return in_array($destino, $destinos_posibles);
}

function canIPickUp() {
    global $origen;
    globaL $origenes_posibles;
    return in_array($origen, $origenes_posibles);
}

//Recupero el precio del envio de mi array asociativa ['envio1' => precio1, 'envio2' => precio2 ].
function getPrecioEnvio(){

    global $precios_envio;

    //TODO: remove hardcoded values, $location deberia hacer referencia a distancias
    // para obtener distintos precios. Deberia ser parametro de la funcion.
    // A su vez, la Array $precios_envio deberia popularse con
    // los distintos precios dependientes de la distancia ($origen-$destino)
    // lo que llevaria a reformar ligeramente las claves de dicha array
    // (e.g: 'CABA' pasaria a ser un valor  de una tabla de base de datos que registre un envio
    // dentro de CABA. De la misma manera deberia poder obtenerse de dicha tabla cada uno de los pares
    // Distancia - precio de envio, o, mas precisamente, Precio($origen,$destino)
    $location = 'CABA';
    return $precios_envio[$location];
}

