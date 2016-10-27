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
            'content' => '<img  src="/hrizantema/web/images/slider/vizazhist11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Обучайся новому</h2><h4>Базовые курсы и дополнительное образование к основному <a href="">"Визажист"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Обучайся новому</h4><h5>Базовые курсы и дополнительное образование к основному <a href="">"Визажист"</a></h5></div>',
            
        ],
        [
            'content' => '<img src="/hrizantema/web/images/slider/parikmaker11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Приобретай полезные навыки</h2><h4>Курсы <a href="">"Сам себе парихмахер"</a> и <a href="">"Сам себе визажист"</a> <br/>для самообразования</h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Приобретай полезные навыки</h4><h5>Курсы <a href="">"Сам себе парихмахер"</a> и <a href="">"Сам себе визажист"</a> <br/>для самообразования</h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="/hrizantema/web/images/slider/manikur11.jpg"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Получай современное образование</h2><h4>Программы обучения <a href="">"Мастер маникюра"</a>, <a href="">"Мастер педикюра"</a> и <a href="">"Основы художественной росписи"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Получай современное образование</h4><h5>Программы обучения <a href="">"Мастер маникюра"</a>, <a href="">"Мастер педикюра"</a> и <a href="">"Основы художественной росписи"</a></h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="/hrizantema/web/images/slider/parikmaker22.jpg"/>',
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
    О НАС
</div>

    
 <?php
 include(__DIR__.'/menu1_lg.php');
 
  include(__DIR__.'/menu1_xs.php');
 ?>
 
  
  
    


<div class="caption_my text-left" style="padding-top:40px">
    
    <a  id="teachers">КОЛЛЕКТИВ</a>
</div>  