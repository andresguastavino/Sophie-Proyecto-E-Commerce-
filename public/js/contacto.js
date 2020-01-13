var textarea = document.querySelector('textarea[name="consulta"]')

textarea.onkeydown = (event) => {
  if(textarea.value == '') {
    textarea.style.height = '80px'
  }

  textarea.style.height = textarea.scrollHeight + 'px'
}

$('#acordeon-1').accordion()
$('#acordeon-2').accordion()
