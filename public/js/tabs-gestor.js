// Tabs
$(document).ready(() => {
  var ntab = Cookies.get('ntab')

  if(ntab) {
    $('#tabs').tabs({
      active: ntab,
      activate: function(event,ui) {
        var tab = ui.newTab
        var tab_attr = tab.attr('aria-controls')
        var ntab = tab_attr.substr(tab_attr.length-1)
        ntab -= 1 // Esto es porque me devuelve el numero de tabs de 1 a 4 pero el active va de 0 a 3
        Cookies.set('ntab', ntab)
      }
     })
  } else {
    $('#tabs').tabs({
      activate: function(event,ui) {
        var tab = ui.newTab
        var tab_attr = tab.attr('aria-controls')
        var ntab = tab_attr.substr(tab_attr.length-1)
        ntab -= 1 // Esto es porque me devuelve el numero de tabs de 1 a 4 pero el active va de 0 a 3
        Cookies.set('ntab', ntab)
      }
    })
  }
})
