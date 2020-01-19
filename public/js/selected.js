if($(window).width() >= 992) {

  var productos = $('.producto')

  productos.each(function (index) {
    $(this).mouseover(() => {
      var actual = $(this)

      actual.siblings().css('opacity', '60%')

      if(actual.next().length) {
        var siguiente = actual.next()

        if(actual.position().top == siguiente.position().top) {
          siguiente.css('width', '30%')
                   .css('opacity', '60%')

          if(siguiente.next().length) {
            var siguiente2 = siguiente.next()

            if(siguiente.position().top == siguiente2.position().top) {
              siguiente2.css('width', '30%')
                        .css('opacity', '60%')
            }
          }
        }
      }

      if(actual.prev().length) {
        var anterior = actual.prev()

        if(actual.position().top == anterior.position().top) {
          anterior.css('width', '30%')
                  .css('opacity', '80%')

          if(anterior.prev().length) {
            var anterior2 = anterior.prev()

            if(anterior.position().top == anterior2.position().top) {
              anterior2.css('width', '30%')
                       .css('opacity', '80%')
            }
          }
        }
      }

      actual.css('width', '40%')
            .css('z-index', '100')
            .css('box-shadow', '5px 5px 5px 5px #000')
            .css('height', 'max-content')
    })

    $(this).mouseout(() => {
      $(this).css('width', '33%')
             .css('z-index', '0')
             .css('box-shadow', '0 0 0 0')
             .css('height', 'auto')

      $(this).siblings().css('width', '33%')
                        .css('opacity', '100%')
    })
  })
}

$(window).resize(() => {
  if($(window).width() >= 992) {
    
    var productos = $('.producto')

    productos.each(function (index) {
      $(this).mouseover(() => {
        var actual = $(this)

        actual.siblings().css('opacity', '60%')

        if(actual.next().length) {
          var siguiente = actual.next()

          if(actual.position().top == siguiente.position().top) {
            siguiente.css('width', '30%')
                     .css('opacity', '60%')

            if(siguiente.next().length) {
              var siguiente2 = siguiente.next()

              if(siguiente.position().top == siguiente2.position().top) {
                siguiente2.css('width', '30%')
                          .css('opacity', '60%')
              }
            }
          }
        }

        if(actual.prev().length) {
          var anterior = actual.prev()

          if(actual.position().top == anterior.position().top) {
            anterior.css('width', '30%')
                    .css('opacity', '80%')

            if(anterior.prev().length) {
              var anterior2 = anterior.prev()

              if(anterior.position().top == anterior2.position().top) {
                anterior2.css('width', '30%')
                         .css('opacity', '80%')
              }
            }
          }
        }

        actual.css('width', '40%')
              .css('z-index', '100')
              .css('box-shadow', '5px 5px 5px 5px #000')
              .css('height', 'max-content')
      })

      $(this).mouseout(() => {
        $(this).css('width', '33%')
               .css('z-index', '0')
               .css('box-shadow', '0 0 0 0')
               .css('height', 'auto')

        $(this).siblings().css('width', '33%')
                          .css('opacity', '100%')
      })
    })
  }
})
