// Scroll para ir arriba
$('#go-top').click(() => {
  $('html, body').animate({
    scrollTop: 0
  }, 500)
})

window.onscroll = () => {
  if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
    $('#go-top').fadeIn('slow')
  } else {
    $('#go-top').fadeOut('slow')
  }
}
