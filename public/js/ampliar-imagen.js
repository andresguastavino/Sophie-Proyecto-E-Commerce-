var body = document.querySelector('body')

function show_image(imagen, event) {
  var div = document.createElement('div')
  div.setAttribute('class', 'imagen-ampliada')
  div.style.width = '100px'
  div.style.position = 'absolute'
  div.style.left = (event.clientX + 100) + 'px'
  div.style.top = (event.pageY - 50) + 'px'
  div.style.border = '5px solid'
  div.style.borderColor = 'rgba(0,0,0,0.4)'
  div.style.borderRadius = '5px'

  var img = document.createElement('img')
  img.setAttribute('src', '/storage/productos/' + imagen)
  img.style.width = '100%'

  div.append(img)
  body.append(div)
}

function hide_image() {
  body.removeChild(document.querySelector('.imagen-ampliada'))
}
