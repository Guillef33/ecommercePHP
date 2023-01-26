<?php

// require('cp.php')

?>

<div class="plugin-wrapper">
    <form method="post" action="../calculadora/index.php">
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

<!-- <div class="plugin-wrapper">
    <form method="post">
        <h3 class="plugin-title">Elegi la provincia de origen y de destino</h3>

        <select id="province-select"></select>
        <script>
            let provinceList = [];

            fetch("https://apis.datos.gob.ar/georef/api/provincias?campos=id,nombre")
                .then(function(response) {
                    return response.json()
                })
                .then((data) => {
                    console.log(data)
                    var list = document.getElementById("province-select");
                    data.provincias.forEach((item) => {
                        provinceList.push(item.nombre);
                        let option = document.createElement("option");
                        option.innerText = item.nombre;
                        option.setAttribute("name", item.nombre);

                        list.appendChild(option);
                    })
                    console.log(displayList)
                })
        </script>

        <button type="submit" class="btn btn-dark">Calcular precio de envios</button>
    </form>
</div> -->

<!-- https://usig.buenosaires.gob.ar/apis/ -->