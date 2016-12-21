<?php
use amass\panel\Panel;
use yii\helpers\Url;
?>
<div class='col-lg-12 hidden-lg hidden-md' style='padding-top:40px; '>
    <div class="col-lg-6 col-md-6" style=" padding:0px; padding-bottom:15px; display:flex;">
        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3" style="padding:0px;padding-left:15px;min-width:100px;" >
        <?php
             echo Panel::widget([
             'options'=>[
                 'class'=>'panel panel-info vertical-panel-body',
                 'style'=>'height:100%;'
             ],
              'header'=>false,
              'content' => '<div style="display:table-cell;vertical-align:middle;"><img class="img-responsive" src="'.Yii::getAlias('@web').'/images/clock.png"></div>',  
              'footer' => false, // show footer or false not showing
              'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
         ]); 
        ?>
        </div>
        
    <?php
    echo "<div class='col-lg-9 col-md-9 col-sm-10 col-xs-9' style=\"padding:0px;\">";
    echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px; height:100%;'
        ],
         'headerTitle' => '<b>Богатая история</b>', // Title text can use tag
         'content' => 'Образовательный центр "Хризантема" был учрежден 9 июня 2004 года в Белгороде. Начиналось все с ... На сегодняшний момент мы ... Подробные сведения об организации можно найти <a href="http://hrizantema31.ru/about">здесь</a>', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
    echo "</div>";
    ?>
    </div>
    <div class="col-lg-6 col-md-6" style="padding:0px; padding-bottom:15px; display:flex;">
    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3" style="padding:0px;padding-left:15px;min-width:100px; " >
   <?php
        echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-body',
            'style'=>'height:100%;'
        ],
         'header'=>false,
         'content' => '<div style="display:table-cell;vertical-align:middle;"><img class="img-responsive" src="'.Yii::getAlias('@web').'/images/teacher.png"></div>',  
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
   ?>
    </div>
    <?php
        echo "<div class='col-lg-9 col-md-9 col-sm-10 col-xs-9' style=\"padding:0px;\">";
        echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px;height:100%;'
        ],
         'headerTitle' => '<b>Опытные преподаватели</b>', // Title text can use tag
         'content' => 'Каждый из преподавателей прошел профессиональную подготовку в соответствующих учебных заведениях и имеет большой опыт в своей проф. области. Подробнее читайте <a class="go_to" href="#collective">далее</a>', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
        echo "</div>";

    ?>
</div>
</div>

   

<div class='col-lg-12 hidden-lg hidden-md' style=''>
    <div class="col-lg-6 col-md-6  col-sm-12" style=" padding:0px; padding-bottom:15px; display:flex;">
        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3" style="padding:0px;padding-left:15px; min-width:100px;" >
        <?php
             echo Panel::widget([
             'options'=>[
                 'class'=>'panel panel-info vertical-panel-body',
                 'style'=>'height:100%;'
             ],
              'header'=>false,
              'content' => '<div style="display:table-cell;vertical-align:middle;"><img class="img-responsive" src="'.Yii::getAlias('@web').'/images/list.png"></div>',  
              'footer' => false, // show footer or false not showing
              'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
         ]); 
        ?>
        </div>
        
    <?php
    echo "<div class='col-lg-9 col-md-9 col-sm-10 col-xs-9' style=\"padding:0px;\">";
    echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px; height:100%;'
        ],
         'headerTitle' => '<b>Широкий выбор профессий</b>', // Title text can use tag
         'content' => 'За период существования центра разработано много программ обучения, в числе которых программы повышения квалификации, дополнительного проф. образования и свободные курсы. Наше <a href="'.Url::to(['courses']).'">расписание</a>', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
    echo "</div>";
    ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12" style="padding:0px; padding-bottom:15px; display:flex;">
    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3" style="padding:0px;padding-left:15px; min-width:100px;" >
   <?php
        echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-body',
            'style'=>'height:100%;'
        ],
         'header'=>false,
         'content' => '<div style="display:table-cell;vertical-align:middle;"><img class="img-responsive" src="'.Yii::getAlias('@web').'/images/career.png"></div>',  
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
   ?>
    </div>
    <?php
        echo "<div class='col-lg-9 col-md-9 col-sm-10 col-xs-9' style=\"padding:0px;\">";
        echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px;height:100%;'
        ],
         'headerTitle' => '<b>Гарантия трудоустройства</b>', // Title text can use tag
         'content' => 'Мы гарантируем трудоустройство КАЖДОМУ, кто пройдет обучение. Профессии, которым Вы можете обучиться в нашем образовательном центре, востребованы на рынке вакансий, а некоторые даже в дефиците. Наш документ об образовании дает возможность устроиться на работу, приносящую хороший доход. Качество получаемых знаний и навыков гарантирует карьерный рост в выбранной сфере', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
        echo "</div>";

    ?>
</div>
</div> 