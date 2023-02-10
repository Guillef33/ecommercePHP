function addProduct(element) {
  console.log(element);
  let product = element.value.split("-"); // 3-Zapatilla
  let idProduct = product[0];
  let productTitle = product[1];

  fetch(
    "http://localhost/PHPTraining/calculadora/ajax/fetch_addProduct.php?id=" +
      idProduct +
      "&productTitle=" +
      $productTitle
  )
    .then(function (response) {
      return response.json();
    })
    .then((data) => {
      console.log(data);
      //Cambiar el boton de Agregar a Quitar
    });
}
