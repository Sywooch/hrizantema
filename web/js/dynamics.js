$('#myAffix').affix({
  // установка смещений с помощью параметра offset
  offset: {
    top: function () {
      // возвращает значение высоты 
      // элемента веб-страницы с классом .footer
      return ($('#header').height());
    }
  }
})


