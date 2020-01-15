var productos = $('.producto')

productos.each(function (index) {
  $(this).mouseover(() => {
    $(this).css('width', '40%')
           .css('z-index', '100')
           .css('box-shadow', '5px 5px 5px 5px #000')

    $(this).siblings().css('width', '30%')
                      .css('opacity', '80%')

  })

  $(this).mouseout(() => {
    $(this).css('width', '33%')
           .css('z-index', '0')
           .css('box-shadow', '0 0 0 0')

    $(this).siblings().css('width', '33%')
                  .css('opacity', '100%')
  })
})
