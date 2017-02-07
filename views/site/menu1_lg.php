<?php
use amass\panel\Panel;
use yii\helpers\Url;
?>
<div class='col-lg-12 hidden-sm hidden-xs' style='padding-top:40px; display:flex;'>
    <div class="col-lg-6 col-md-6" style=" padding:0px; padding-bottom:15px; display:flex;">
        <div class="col-lg-3 col-md-3" style="padding:0px;padding-left:15px; " >
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
    echo "<div class='col-lg-9 col-md-9' style=\"padding:0px;\">";
    echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px; height:100%;'
        ],
         'headerTitle' => '<b>Богатая история</b>', // Title text can use tag
         'content' => 'Формула успеха уже давно не являет ся ни для кого секретом. Профессиональный успех складывается из трех неотъемлемых составляющих. Это репутация, квалификация и связи. На словах все просто. На практике же мы каждый день на протяжении многих лет много работаем для того, чтобы все три ключа к успеху оказались в руках наших студентов, будущих профессионалов. 
      Частное образовательное учреждение дополнительного профессионального образования «Хризантема»  было и остается учебным заведением, занимающееся подготовкой специалистов в области стиля и красоты. ', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
    echo "</div>";
    ?>
    </div>
    <div class="col-lg-6 col-md-6 " style="padding:0px; padding-bottom:15px; display:flex;">
    <div class="col-lg-3 col-md-3" style="padding:0px;padding-left:15px; " >
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
        echo "<div class='col-lg-9 col-md-9' style=\"padding:0px;\">";
        echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px;height:100%;'
        ],
         'headerTitle' => '<b>Опытные преподаватели</b>', // Title text can use tag
         'content' => '<a class="go_to" href="#collective">Наши педагоги</a> - профессионалы, чья квалификация подтверждается многолетним опытом работы в своей области и восторженными отзывами студентов, уже прошедших обучение.  Ведь мы убеждены, что  для педагога недостаточно самому быть мастером самой высокой квалификации, но важно уметь передать свои знания и навыки студентам.', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
        echo "</div>";

    ?>
</div>
</div>

   

<div class='col-lg-12 hidden-sm hidden-xs' style='display:flex;'>
    <div class="col-lg-6 col-md-6  col-sm-12" style=" padding:0px; padding-bottom:15px; display:flex;">
        <div class="col-lg-3 col-md-3" style="padding:0px;padding-left:15px; " >
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
    echo "<div class='col-lg-9 col-md-9' style=\"padding:0px;\">";
    echo Panel::widget([
        'options'=>[
            'class'=>'panel panel-info vertical-panel-right',
            'style'=>'margin-bottom:0px; height:100%;'
        ],
         'headerTitle' => '<b>Широкий выбор профессий</b>', // Title text can use tag
         'content' => 'В программу обучения входят курсы и семинары  для начинающих, углубленные курсы по коммерческим технологиям,  курсы повышения квалификации  для профессионалов, давно работающим на рынке. 
Обучение в нашей школе - это возможность с самых первых шагов окунуться в профессию и стать частью огромного сообщества, объединяющего парикмахеров, стилистов, визажистов работающих в области прикладной эстетики, красоты и стиля. 
Вместе мы создаем Красоту творчества. Наше <a href="'.Url::to(['courses']).'">расписание</a>', // some content in body
         'footer' => false, // show footer or false not showing
         'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
]); 
    echo "</div>";
    ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12" style="padding:0px; padding-bottom:15px; display:flex;">
    <div class="col-lg-3 col-md-3" style="padding:0px;padding-left:15px; " >
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
        echo "<div class='col-lg-9 col-md-9' style=\"padding:0px;\">";
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