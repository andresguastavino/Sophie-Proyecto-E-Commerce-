var searchInput = document.querySelector('input#search')
var productos = document.querySelectorAll('.producto')
var busqueda = ''

searchInput.onfocus = () => {
  searchInput.setAttribute('placeholder', '')
}

searchInput.onblur = () => {
  if(searchInput.value.trim() == '') {
    searchInput.value = ''
    searchInput.setAttribute('placeholder', 'Buscar producto por nombre')
  }
}

searchInput.onkeyup = (event) => {
  busqueda = searchInput.value.trim().toLowerCase()

  for(var producto of productos) {
    if(busqueda != '') {
      var nombreProducto = producto.querySelector('#nombre').textContent

      if(!nombreProducto.includes(busqueda)) {
        producto.style.display = 'none'
      } else {
        producto.style.display = 'block'
      }
    } else {
      producto.style.display = 'block'
    }
  }
}
