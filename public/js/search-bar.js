var searchButton = document.querySelector('button#search-button')
var searchInput = searchButton.previousElementSibling
var productos = document.querySelectorAll('.producto')
var busqueda = ''

searchInput.onchange = (event) => {
  busqueda = searchInput.value.toLowerCase()

  for(var producto of productos) {
    if(busqueda != '') {
      var nombreProducto = producto.querySelector('#nombre').textContent

      if(!nombreProducto.includes(busqueda)) {
        producto.style.display = 'none'
      }
    } else {
      producto.style.display = 'block'
    }
  }
}
