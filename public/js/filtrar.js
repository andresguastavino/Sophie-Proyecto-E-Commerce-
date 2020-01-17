var inputs = document.querySelectorAll('input[type="text"]')

for(var input of inputs) {
  input.onkeyup = () => {
    var tab = document.querySelector('div[aria-hidden=false]')
    var input = tab.querySelector('input[type="text"]')
    var busqueda = input.value.trim().toLowerCase()
    var filtro = getFiltro(input.parentElement.nextElementSibling)
    var elementos = ''

    if(input.getAttribute('id') == 'filtrar_marca') {
      elementos = document.querySelectorAll('.marca')
    } else if(input.getAttribute('id') == 'filtrar_categoria') {
      elementos = document.querySelectorAll('.categoria')
    } else if(input.getAttribute('id') == 'filtrar_user') {
      elementos = document.querySelectorAll('.user')
    } else {
      elementos = document.querySelectorAll('.producto')
    }

    for(var elemento of elementos) {
      if(busqueda != '') {
        var valor = elemento.querySelector(`.${filtro}`).innerHTML.toLowerCase()
        
        if(!valor.includes(busqueda)) {
          elemento.style.display = 'none'
        } else {
          elemento.style.display = 'flex'
        }
      } else {
        elemento.style.display = 'flex'
      }
    }
  }
}

function getFiltro(elemento) {
  var filtro = elemento.querySelector('input[type="radio"]:checked')

  if(filtro) {
    return filtro.value
  }

  if(elemento.nextElementSibling) {
    return getFiltro(elemento.nextElementSibling)
  } else {
    return ''
  }
}
