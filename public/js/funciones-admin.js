var formularios = document.querySelectorAll('form.disabled')

for(var formulario of formularios) {
  formulario.onsubmit = () => {
    event.preventDefault()
    alert('Necesitas permisos de administrador para poder acceder a esta funcion')
  }
}
