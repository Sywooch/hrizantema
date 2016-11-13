<?php
use app\models\Course;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
?>
        <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <?php

  $events = array();
  foreach ($data as $item){
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = $item->id;
    $course = Course::findOne($item->id_course);
    $Event->title = $course['name'];
    if ($item->allDay=='0') {
        if ($item->dow=='0'){
            $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($item->dateStart." ".$item->timeStart));
            $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($item->dateEnd." ".$item->timeEnd));  
        } else {
            $Event->start = $item->timeStart;
            $Event->end = $item->timeEnd;
        }
    } else {
        $Event->allDay = true;
        $Event->start = $item->dateStart;
        $Event->end = date('Y-m-d',strtotime($item->dateEnd)+86400);         
    }
    if ($item->dow!=='0'){
        $Event->dow = explode(",", $item->dow);
    }
    $Event->color = Category::findOne($course['id_cat'])['color'];
    $Event->url = Url::to(['update','id'=>$item->id]);
    $events[] = $Event;
  }


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