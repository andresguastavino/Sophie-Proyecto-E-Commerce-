$(document).ready(() => {
  if($(window).width() >= 768) {
    $('#sm-nav').css('display', 'none')
    $('#lg-nav').css('display', 'block')
  } else {
    $('#sm-nav').css('display', 'block')
    $('#lg-nav').css('display', 'none')
  }

  $(window).resize(() => {
    if($(window).width() >= 768) {
      $('#sm-nav').css('display', 'none')
      $('#lg-nav').css('display', 'block')
    } else {
      $('#sm-nav').css('display', 'block')
      $('#lg-nav').css('display', 'none')
    }
  })
})
