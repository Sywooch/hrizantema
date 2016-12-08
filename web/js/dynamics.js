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
        $("#myLabel2").css("display","block");
    });
$("#myAffix").on('affix-top.bs.affix', function(){
        $("#myLabel").css("display","none");
        $("#myLabel2").css("display","none");
    });

if ($("#myAffix").hasClass("affix")) {
    $("#myLabel").css("display","block");
    $("#myLabel2").css("display","block");
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

$('#serviceList').on('show.bs.collapse', function() {
    if ($("#serviceList div div h4 a").hasClass("collapsed")){
        $(".servicedrop").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
    } else {
        $('.fc-today-button').click();
    }
  });

$('#serviceList').on('hide.bs.collapse', function() {
    $(".servicedrop").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
  });
  
 
  
$('#serviceList').on('shown.bs.collapse', function() {
        if ($("#serviceList div div h4 a").hasClass("collapsed")){
    } else {
        $('.fc-today-button').click();
        $('.myEvent .fc-content').on('click', function (e) {
            fillModal($(".fc-title span", this).attr('id'));
        });
        
 

    }
  });
  
  function fillModal(id){
      $('#btnRequest').html("<a class='btn btn-primary btn-outline' href='/site/request?calendar="+id+"'>Подать заявку на обучение</a>");
      $("#myModalHeader").html($('.hiddId'+id+' .hiddName').html());
      $("#hId").html($('.hiddId'+id+' .hiddIdCourse').html());
      if ($('.hiddId'+id+' .hiddDs').html()!==undefined){
        $("#hDs").html($('.hiddId'+id+' .hiddDs').html());
      }
      $strBody = "<table style='border-spacing:20px 30px; border-collapse: separate;'>";
      if ($('.hiddId'+id+' .hiddCategory').html()!==undefined){
        $strBody = $strBody+"<tr><td align=right valign=middle><b>Категория: </b></td><td>"+$('.hiddId'+id+' .hiddCategory').html()+"<br/></td></tr>";
      }
      //if ($('.hiddId'+id+' .hiddDescription').html()!==undefined){
      //  $strBody = $strBody+"<tr><td align=right valign=middle><b>Описание: </b></td><td>"+$('.hiddId'+id+' .hiddDescription').html()+"<br/></td></tr>";
      //}
      $strBody = $strBody+"<tr><td align=right valign=middle ><b>Время проведения занятий: </b></td><td >"+$('.hiddId'+id+' .hiddPeriod').html()+"</td></tr>";
      $("#myModalBody").html($strBody);
      $("#myModal").modal("show");
  }

function dump(obj) {
    var out = "";
    if(obj && typeof(obj) == "object"){
        for (var i in obj) {
            out += i + ": " + obj[i] + "n";
        }
    } else {
        out = obj;
    }
    alert(out);
}

function moveRequest(){
    $("#myModal").modal("hide");
    if ($("#request").length != 0) { // проверим существование элемента чтобы избежать ошибки
	    $('html, body').animate({ scrollTop: $('#request').offset().top }, 500); // анимируем скроолинг к элементу scroll_el
    }
    $('#request-request_date').val($("#hDs").html());
    $('select#request-course').val($("#hId").html());
    $('#request-name').focus();
    return false;
}

function disableCell(date, cell){
        if (date > moment('2016-11-15')){
            $(cell).addClass('disabled');
        }
    
}