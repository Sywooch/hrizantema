<?php

use yii\bootstrap\Carousel;
use amass\panel\Panel;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Образовательный центр Хризантема';
?>
<div class="site-index">
<?php
echo Carousel::widget([
    'options'=>[
        'class'=>'slide carousel-fade text-center',
        'style'=>'max-width:1000px; margin:0 auto;',
        
    ],
    'controls'=>['<span class="glyphicon glyphicon-chevron-left"></span>','<span class="glyphicon glyphicon-chevron-right"></span>'],
    'items' => [
        [
            'content' => '<img  src="'.Yii::getAlias('@web').'/images/slider/vizazhist11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Обучайся новому</h2><h4>Базовые курсы и дополнительное образование к основному <a href="">"Визажист"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Обучайся новому</h4><h5>Базовые курсы и дополнительное образование к основному <a href="">"Визажист"</a></h5></div>',
            
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/parikmaker11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Приобретай полезные навыки</h2><h4>Курсы <a href="">"Сам себе парихмахер"</a> и <a href="">"Сам себе визажист"</a> <br/>для самообразования</h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Приобретай полезные навыки</h4><h5>Курсы <a href="">"Сам себе парихмахер"</a> и <a href="">"Сам себе визажист"</a> <br/>для самообразования</h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/manikur11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Получай современное образование</h2><h4>Программы обучения <a href="">"Мастер маникюра"</a>, <a href="">"Мастер педикюра"</a> и <a href="">"Основы художественной росписи"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Получай современное образование</h4><h5>Программы обучения <a href="">"Мастер маникюра"</a>, <a href="">"Мастер педикюра"</a> и <a href="">"Основы художественной росписи"</a></h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/parikmaker22.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Изучай дополнительные профессии</h2><h4>Профессиональные курсы <a href="">"Парикмахер-модельер"</a>,<a href="">"Колорист"</a>,<a href="">"Свадебный стилист"</a> и другие</h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Изучай дополнительные профессии</h4><h5>Профессиональные курсы <a href="">"Парикмахер-модельер"</a>,<a href="">"Колорист"</a>,<a href="">"Свадебный стилист"</a> и другие</h5></div>',
            'options' => [],
        ],
    ]
]);
?>
</div>
<hr/>

<div class="caption_my text-left">
    <a class="not-hover" id="about">О НАС</a>
</div>

    
 <?php
 include(__DIR__.'/menu1_lg.php');
 
 include(__DIR__.'/menu1_xs.php');
 ?>
 
  
  
    


<div class="caption_my text-left" style="padding-top:40px;padding-bottom:40px;">
    <a class="not-hover" id="collective">КОЛЛЕКТИВ</a>
</div> 

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret1.jpg'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Иванова Лариса Ивановна</b> - c другой стороны сложившаяся структура организации позволяет оценить значение форм развития. Значимость этих проблем настолько очевидна, что консультация с широким активом влечет за собой процесс внедрения и модернизации направлений прогрессивного развития.

    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Комарова Анастасия Ивановна</b> - реализация намеченных плановых заданий позволяет выполнять важные задания по разработке новых предложений. Равным образом рамки и место обучения кадров играет важную роль в формировании существенных финансовых и административных условий. 

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret2.jpg'/>
    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret3.jpg'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Сидоров Игорь Алексеевич</b> - задача организации, в особенности же новая модель организационной деятельности представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации модели развития.

    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Петрова Надежда Петровна</b> - идейные соображения высшего порядка, а также сложившаяся структура организации требуют от нас анализа существенных финансовых и административных условий.

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret4.jpg'/>
    </div>
</div>