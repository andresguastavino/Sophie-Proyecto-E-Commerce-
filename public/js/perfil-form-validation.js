var form = document.querySelector('#modificar form');

form.onsubmit = (event) => {
  var elementos = form.elements
  var indice = 0
  var cambios = false

  while(indice < elementos.length && !cambios) {
    if(elementos[indice].name != '_token' && elementos[indice].name != 'button') {
      if(elementos[indice].value != '') {
        cambios = true
      }
    }
    indice++;
  }

  if(cambios) {
  	for(var elemento of elementos) {
  		if(elemento.name != 'button' && elemento.name != '_token') {
  			var inputValue = elemento.value.trim()

        if(inputValue == '') {
          removeErrorSpan(elemento)
        }

				if((elemento.name == 'name' || elemento.name == 'surname') && inputValue != '') {
					if(!validateName(inputValue)) {
						addErrorSpan(elemento, 'La informacion proporcionada no es valida. Este campo solo puede contener letras.')
						event.preventDefault()
					} else {
						removeErrorSpan(elemento)
					}
				}
  		}

      if(elemento.name == 'avatar' && inputValue != '') {
        if(!validateFile(inputValue)) {
          addErrorSpan(elemento, 'La extension de la imagen no es valida. Solo se admite jpg, jpeg y png.')
          event.preventDefault()
        } else {
          removeErrorSpan(elemento)
        }
      }

    }
  } else {
    for(var elemento of elementos) {
  		if(elemento.name != 'button' && elemento.name != '_token') {
  			var inputValue = elemento.value.trim()

        if(inputValue == '') {
          removeErrorSpan(elemento)
        }
      }
    }

    event.preventDefault()
  }
}

function addErrorSpan(input, spanText) {
	var span = input.parentNode.querySelector('span.invalid-feedback')

	if(!input.classList.contains('is-invalid')) {
		input.classList.add('is-invalid')
	}

	if(!span) {
		input.parentNode.append(errorSpan(spanText))
	} else {
		if(span.innerHTML != spanText) {
			span.innerHTML = `<strong> ${spanText} </strong>`
		}
	}
}

function errorSpan(spanText) {
	var span = document.createElement('span')
	span.setAttribute('class', 'invalid-feedback')
	span.classList.add('text-center')
	span.setAttribute('role', 'alert')
	span.innerHTML = `<strong> ${spanText} </strong>`
	return span
}

function removeErrorSpan(input) {
	if(input.classList.contains('is-invalid')) {
		input.classList.remove('is-invalid')
	}

	if(input.parentNode.querySelector('span.invalid-feedback')) {
		input.parentNode.removeChild(input.parentNode.querySelector('span.invalid-feedback'))
	}
}

function validateName(name) {
  var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
  return expRegNombre.test(name);
}

function validateFile(sFileName) {
  var _validFileExtensions = [".jpg", ".jpeg", ".png"];

  if (sFileName.length > 0) {
    var blnValid = false;
    for (var j = 0; j < _validFileExtensions.length; j++) {
      var sCurExtension = _validFileExtensions[j];
      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
        blnValid = true;
        break;
      }
    }
  }

  return blnValid;
}
