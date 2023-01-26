   <?php

    require('logica.php');
    require('envios/cp.php');

    ?>

   <div class="plugin-wrapper">
       <form id='cuotas_form' class="calculadora-cuotas-form" method="post">
           <h3 class=" plugin-title">¡Nuestras promociones bancarias!</h3>
           <p>Calcula las cuotas de acuerdo a tu tarjeta y tus descuentos</p>
           <div>
               <select class="form-select" id="select-tarjetas" name="tarjetas" class="boton-tarjetas-credito">
                   <option selected>Elije tu tarjeta</option>
                   <option name="master">Master Card</option>
                   <option name="american">AMEX</option>
                   <option name="uala">Uala</option>
                   <option name="visa">VISA</option>
               </select>
           </div>
           <div>
               <select class="form-select" aria-label="Select de cuotas" id="select-cuotas" name="cuotas" class="boton-cantidad-cuotas">
                   <option selected>Elije cuantas cuotas</option>
                   <option name="1">1</option>
                   <option name="3">3</option>
                   <option name="6">6</option>s
               </select>
           </div>
           <h3 class="plugin-title">¡Conoce cuanto vas a pagar de envio</h3>
           <p>Ingresa tu CP de origen y destino</p>
           <div class="input-group mb-6">
               <input type="text" name="cp_origen" class="form-control" placeholder="Ingrese el CP de origen">
           </div>

           <div class="input-group mb-6">
               <input type="text" name="cp_destino" class="form-control" placeholder="Ingrese el CP de destino">
           </div>
           <!-- <button type="submit" class="btn btn-dark">Calcular precio de envios</button> -->
           <button type="submit" class="btn btn-dark">Calcular interes</button>

       </form>
   </div>