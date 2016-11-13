<?php
$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;


  $events = array();
  //Testing
  $Event = new \yii2fullcalendar\models\Event();
  $Event->id = 1;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:i:s\Z');
  $events[] = $Event;

  $Event = new \yii2fullcalendar\models\Event();
  $Event->id = 2;
  $Event->title = 'Курс повышения классификации "Мастер"';
  $Event->description = 'Для молодых и сильных';
  $Event->allDay = true;
  //$Event->url = "http:/localhost";
  $Event->dow = [1];
//  $Event->start = "07:00";
//  $Event->end = "08:00";
  $events[] = $Event;

  ?>


<div class="col-lg-8 col-lg-offset-2" style="padding-top:20px;">
  <?= \yii2fullcalendar\yii2fullcalendar::widget([
        'options' => [
        'lang' => 'ru',

        //... more options to be defined here!
      ],

    'header'=> [
            'left' => 'prev,next today myCustomButton',
            'center' => 'title',
            'right'=>'month,agendaWeek,agendaDay,list'
    ],
      'theme'=>true,
      'events'=> $events,
  ]);
  ?>
</div>
