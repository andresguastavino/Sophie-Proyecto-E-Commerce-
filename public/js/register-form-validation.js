var form = document.querySelector('form');

form.onsubmit = (event) => {
	var elementos = form.elements

	for(var elemento of elementos) {
		if(elemento.name != 'button' && elemento.name != '_token' && elemento.name != 'accept') {
			var inputValue = elemento.value.trim()

			if(inputValue == '') {
				addErrorSpan(elemento, 'Este campo es obligatorio.')
				event.preventDefault()
			}

			else if(inputValue != '') {

				if(elemento.name == 'name' || elemento.name == 'surname') {
					if(!validateName(inputValue)) {
						addErrorSpan(elemento, 'La informacion proporcionada no es valida. Este campo solo puede contener letras.')
						event.preventDefault()
					} else {
						removeErrorSpan(elemento)
					}
				}

				if(elemento.name == 'email') {
					if(!validateEmail(inputValue)) {
						addErrorSpan(elemento, 'El email ingresado no es valido')
						event.preventDefault()
					} else {
						removeErrorSpan(elemento)
					}
				}

				if(elemento.name == 'password') {
					var confirmationInput = document.querySelector('input[name="password_confirmation"]')
					var confirmationValue = confirmationInput.value

					if(confirmationValue != '') {
						removeErrorSpan(confirmationInput)
					}

					if(!validatePasswordLength(inputValue)) {
						addErrorSpan(elemento, 'La contrasenia debe tener 8 caracteres de largo como minimo')
						event.preventDefault()
					} else {
						removeErrorSpan(elemento)

						if(!validatePassword(confirmationValue, inputValue)) {
							addErrorSpan(elemento, 'Las contrasenias no coinciden')
							addErrorSpan(confirmationInput, 'Las contrasenias no coinciden')
							event.preventDefault()
						} else {
							removeErrorSpan(elemento)
							removeErrorSpan(confirmationInput)
						}
					}
				}
			}
		}

		if(elemento.name == 'accept') {
			if(!elemento.checked) {
				addErrorSpan(elemento, 'Para registrarse debe estar de acuerdo con nuestros Terminos y Condiciones')
				event.preventDefault()
			} else {
				removeErrorSpan(elemento)
			}
		}
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

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validatePasswordLength(password) {
	return password.length >= 8
}

function validatePassword(password, confirmation) {
	return password == confirmation
}
