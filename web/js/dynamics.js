$('#myAffix').affix({
  // установка смещений с помощью параметра offset
  offset: {
    top: function () {
      // возвращает значение высоты 
      // элемента веб-страницы с классом .footer
      return ($('#header').height());
    }
  }
});

$("#myAffix").on('affixed.bs.affix', function(){
        $("#myLabel").css("display","block");
    });
$("#myAffix").on('affix-top.bs.affix', function(){
        $("#myLabel").css("display","none");
    });

if ($("#myAffix").hasClass("affix")) {
    $("#myLabel").css("display","block");
}


    $('.go_to').click( function(){ // ловим клик по ссылке с классом go_to
	var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
	    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
        }
	    return false; // выключаем стандартное действие
    });

function changeVisibleDate(el){
    if ($('input[name="Timing[is_dow]"]:checked').val()=='1') {
       $("#repeat_block").css("display",'block');
       $("#date_block").css("display",'none');
    } else {
       $("#repeat_block").css("display",'none');
       $("#date_block").css("display",'block');
    }
    
}

function changeVisibleTime(el){
    if ($(el).prop("checked")) {
       $("#time_block").css("display",'none');
    } else {
        $("#time_block").css("display",'block');
    }
    
}