var input = document.querySelector('input#search')

input.onfocus = () => {
  input.setAttribute('placeholder', '')

  $('div.banner').fadeOut('slow')
}

input.onblur = () => {
  if(input.value.trim() == '') {
    input.value = ''
    input.setAttribute('placeholder', 'Buscar por nombre')

    $('div.banner').fadeIn('fast')
  }
}
