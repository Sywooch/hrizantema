<?php

use yii\bootstrap\Carousel;
use amass\panel\Panel;
use yii\helpers\Url;
use kartik\popover\PopoverX;
use app\models\News;
use yii\bootstrap\Html;
use yii\helpers\StringHelper;
use app\models\Category;
use app\models\SeoPages;
$seo = SeoPages::find()->where(['name'=>'index'])->one();
$this->title = $seo->seo_title;
$this->registerMetaTag(["name"=>"description","content"=>$seo->seo_descr]);
/* @var $this yii\web\View */

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
            'content' => '<img  src="'.Yii::getAlias('@web').'/images/slider/1.png"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Обучайся новому</h2><h4>Базовые курсы и дополнительное образование к основному <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>15]).'">"Визажист"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Обучайся новому</h4><h5>Базовые курсы и дополнительное образование к основному <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>15]).'">"Визажист"</a></h5></div>',
            'options' => ['style'=>''],
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/2.png"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Приобретай полезные навыки</h2><h4>Курсы <a href="'.Url::toRoute(['site/courses','id'=>5,'course'=>23]).'">"Сам себе парихмахер"</a> и <a href="'.Url::toRoute(['site/courses','id'=>5,'course'=>26]).'">"Сам себе визажист"</a> <br/>для самообразования</h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Приобретай полезные навыки</h4><h5>Курсы <a href="'.Url::toRoute(['site/courses','id'=>5,'course'=>23]).'">"Сам себе парихмахер"</a> и <a href="'.Url::toRoute(['site/courses','id'=>5,'course'=>26]).'">"Сам себе визажист"</a> <br/>для самообразования</h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/3.png"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Получай современное образование</h2><h4>Программы обучения <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>16]).'">"Мастер маникюра"</a>, <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>16]).'">"Мастер педикюра"</a> и <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>18]).'">"Основы художественной росписи"</a></h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Получай современное образование</h4><h5>Программы обучения <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>16]).'">"Мастер маникюра"</a>, <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>16]).'">"Мастер педикюра"</a> и <a href="'.Url::toRoute(['site/courses','id'=>3,'course'=>18]).'">"Основы художественной росписи"</a></h5></div>',
            'options' => [],
        ],
        [
            'content' => '<img src="'.Yii::getAlias('@web').'/images/slider/4.png"/>',
            'caption' => '<div class="hidden-xs hidden-sm"><h2>Изучай дополнительные профессии</h2><h4>Профессиональные курсы <a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>10]).'">"Парикмахер-модельер"</a>,<a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>8]).'">"Колорист"</a>,<a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>14]).'">"Свадебный стилист"</a> и другие</h4></div>'
            .'<div class="hidden-lg hidden-md"><h4>Изучай дополнительные профессии</h4><h5>Профессиональные курсы <a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>10]).'">"Парикмахер-модельер"</a>,<a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>8]).'">"Колорист"</a>,<a href="'.Url::toRoute(['site/courses','id'=>2,'course'=>14]).'">"Свадебный стилист"</a> и другие</h5></div>',
            'options' => [],
        ],
    ]
]);
$blockNews = News::find()->where(['type'=>'1'])->orderBy('date_news DESC')->limit(3)->all();
$news = "";
foreach ($blockNews as $new) {
   $news = $news."<div class='news-block'>";
   $news = $news.Html::a("<div class='news-img col-lg-4 col-md-4 col-sm-4 col-xs-4'><img style='max-height:120px' class='img-responsive' src='".$new->img."'/></div>",['site/news','id'=>$new->id]);
   $news = $news."<div style='border-left:1px solid #eee;margin-left:170px; text-align:left'>";
   $news = $news.Html::a($new->title,['site/news','id'=>$new->id],['class'=>'news-title']);
   $news = $news."<div class='news-shorttext'>".StringHelper::truncateWords($new->short_text, 29, '...', false)."</div>";
   $news = $news."<div class='news-date'>Дата: ".date("d.m.Y",strtotime($new->date_news))."</div>";
   $news = $news."</div>";
   $news = $news."</div><hr/>";
}
$news = $news."<div onClick=\"window.location.href='".Url::to(['site/news'])."'\" class='news-under'>Все новости <span style='font-size:11pt;' class='glyphicon glyphicon-arrow-right'></span></div>";

$blockNews2 = News::find()->where(['type'=>'2'])->orderBy('date_news DESC')->limit(3)->all();
$news2 = "";
foreach ($blockNews2 as $new) {
   $news2 = $news2."<div class='news-block'>";
   $news2 = $news2.Html::a("<div class='news-img col-lg-4 col-md-4 col-sm-4 col-xs-4'><img style='max-height:120px' class='img-responsive' src='".$new->img."'/></div>",['site/stocks','id'=>$new->id]);
   $news2 = $news2."<div style='border-left:1px solid #eee;margin-left:170px; text-align:left'>";
   $news2 = $news2.Html::a($new->title,['site/stocks','id'=>$new->id],['class'=>'news-title']);
   $news2 = $news2."<div class='news-shorttext'>".StringHelper::truncateWords($new->short_text, 29, '...', false)."</div>";
   $news2 = $news2."<div class='news-date'>Дата: ".date("d.m.Y",strtotime($new->date_news))."</div>";
   $news2 = $news2."</div>";
   $news2 = $news2."</div><hr/>";
}
$news2 = $news2."<div onClick=\"window.location.href='".Url::to(['site/stocks'])."'\" class='news-under'>Все акции <span style='font-size:11pt;' class='glyphicon glyphicon-arrow-right'></span></div>";
       
$blockNews3 = News::find()->where(['type'=>'5'])->orderBy('date_news DESC')->limit(3)->all();
$news3 = "";
foreach ($blockNews3 as $new) {
   $news3 = $news3."<div class='news-block'>";
   $news3 = $news3.Html::a("<div class='news-img col-lg-4 col-md-4 col-sm-4 col-xs-4'><img style='max-height:120px' class='img-responsive' src='".$new->img."'/></div>",['site/latest','id'=>$new->id]);
   $news3 = $news3."<div style='border-left:1px solid #eee;margin-left:170px; text-align:left'>";
   $news3 = $news3.Html::a($new->title,['site/latest','id'=>$new->id],['class'=>'news-title']);
   $news3 = $news3."<div class='news-shorttext'>".StringHelper::truncateWords($new->short_text, 29, '...', false)."</div>";
   $news3 = $news3."<div class='news-date'>Дата: ".date("d.m.Y",strtotime($new->date_news))."</div>";
   $news3 = $news3."</div>";
   $news3 = $news3."</div><hr/>";
}
$news3 = $news3."<div onClick=\"window.location.href='".Url::to(['site/latest'])."'\" class='news-under'>Все новинки <span style='font-size:11pt;' class='glyphicon glyphicon-arrow-right'></span></div>";
 

$blockNews4 = News::find()->where(['type'=>'6'])->orderBy('date_news DESC')->limit(3)->all();
$news4 = "";
foreach ($blockNews4 as $new) {
   $news4 = $news4."<div class='news-block'>";
   $news4 = $news4.Html::a("<div class='news-img col-lg-4 col-md-4 col-sm-4 col-xs-4'><img style='max-height:120px' class='img-responsive' src='".$new->img."'/></div>",['site/discounts','id'=>$new->id]);
   $news4 = $news4."<div style='border-left:1px solid #eee;margin-left:170px; text-align:left'>";
   $news4 = $news4.Html::a($new->title,['site/discounts','id'=>$new->id],['class'=>'news-title']);
   $news4 = $news4."<div class='news-shorttext'>".StringHelper::truncateWords($new->short_text, 29, '...', false)."</div>";
   $news4 = $news4."<div class='news-date'>Дата: ".date("d.m.Y",strtotime($new->date_news))."</div>";
   $news4 = $news4."</div>";
   $news4 = $news4."</div><hr />";
}
$news4 = $news4."<div onClick=\"window.location.href='".Url::to(['site/discounts'])."'\" class='news-under'>Все скидки <span style='font-size:11pt;' class='glyphicon glyphicon-arrow-right'></span></div>";
 
        
        
        
        
?>

</div>
<hr />


<div class="block-news hidden-xs "> 
    <div class="news-capt text-warning col-lg-3 col-md-3 col-sm-3 " style="padding:0px;" id='button1' onclick='showWindow(1);'><span style="height:26px;display:block; float:right; border-right:1px solid #d9534f; margin-top:12px;"></span>Новости&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
    <div class="news-capt text-info col-lg-3 col-md-3 col-sm-3" style="padding:0px;" id='button2' onclick='showWindow(2);'><span style="height:26px;display:block; float:right; border-right:1px solid #d9534f; margin-top:12px;"></span>Акции&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
    <div class="news-capt text-primary col-lg-3 col-md-3 col-sm-3" style="padding:0px;" id='button3' onclick='showWindow(3);'><span style="height:26px;display:block; float:right; border-right:1px solid #d9534f; margin-top:12px;"></span>Новинки&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
    <div class="news-capt text-error col-lg-3 col-md-3 col-sm-3" style="padding:0px;" id='button4' onclick='showWindow(4);'>Скидки&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
</div>

<div class="hidden-xs "> 
    <div class=" col-lg-8 col-lg-offset-0 col-md-offset-1  window1" id='window1'><?=$news?></div>
    <div class=" col-lg-8 col-lg-offset-1 col-md-offset-1  window1" id='window2'><?=$news2?></div>
    <div class=" col-lg-8 col-lg-offset-2 col-md-offset-1  window1" id='window3'><?=$news3?></div>
    <div class=" col-lg-8 col-lg-offset-3 col-md-offset-1  window1" id='window4'><?=$news4?></div>
</div>

<div class="block-news2 hidden-lg hidden-md hidden-sm"> 
    <div class="news-capt text-info col-xs-6" id='button2_1' onclick='showWindow2(1);'><span style="height:26px;display:block; float:right; border-right:1px solid #d9534f; margin-top:12px;"></span>Новости&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
    <div class="news-capt text-info col-xs-6" id='button2_2' onclick='showWindow2(2);'>Акции&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>

    <hr style="width:80%;"/>
        <div style='margin-top:-20px;'>
            <div class=" col-xs-11 window1" id='window2_1'><?=$news?></div>
            <div class=" col-xs-11 window1" id='window2_2'><?=$news2?></div>
        </div>
    <div class="news-capt text-info col-xs-6" id='button2_3' onclick='showWindow2(3);'><span style="height:26px;display:block; float:right; border-right:1px solid #d9534f; margin-top:12px;"></span>Новинки&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>
    <div class="news-capt text-info col-xs-6" id='button2_4' onclick='showWindow2(4);'>Скидки&nbsp;<span style="font-size:10pt" class="glyphicon glyphicon-triangle-bottom"></span></div>

</div>
<div class="hidden-lg hidden-md hidden-sm"> 
        <div class=" col-xs-11 window1" id='window2_3'><?=$news3?></div>
        <div class=" col-xs-11 window1" id='window2_4'><?=$news4?></div>
</div>




<div class="col-lg-12 col-xs-12 text-center">
    <img class="img-responsive" style="margin:0 auto; padding-top:10px;padding-bottom:10px" src='<?=Yii::getAlias('@web')?>/images/title-tag4.png'/>
</div>    

<div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2">
    <a class="not-hover" id="about">О НАС</a>
</div>

    
 <?php
 $this->registerJs("$(function(){
  $(document).click(function(event) {
    if ($(event.target).closest(\".window1\").length) return;
    if ($(event.target).closest(\".news-capt\").length) return;
        for (i = 1; i <= 4; i++) {

            if ($('#button'+i).hasClass('checked')==true){
                id1 = i;
                $('#window'+i).fadeTo(300,0);
                setTimeout(function(){ $('#window'+id1).css('display','none');},300);
                $('#button'+i).css('color','');
                $('#button'+i).css('text-decoration','none');
                $('#button'+i).removeClass('checked');
            }
        
    }
    event.stopPropagation();
  });
});"
."");
 include(__DIR__.'/menu1_lg.php');
 
 include(__DIR__.'/menu1_xs.php');
 ?>
 
  
  
    


<div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2" style="padding-top:40px;padding-bottom:40px;">
    <div ><a class="not-hover" id="collective">КОЛЛЕКТИВ</a></div>
</div> 

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret1.png'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Ерофтеева Оксана Борисовна</b> - руководитель, преподаватель программ профессионального обучения и дополнительного образования, высшее педагогическое образование.

    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Юрченко Елена Васильевна</b> - преподаватель программ повышения квалификации, модельер, Чемпион VII Чемпионата Белгородской области по парикмахерскому искусству декоративной косметики и маникюру, конкурсный тренер, технолог профессиональной косметики Lisap, KV-1, ZACHARY Россия, судья региональных конкурсов профессионального мастерства.
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret2.png'/>
    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret3.png'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Луценко Татьяна Александровна</b> - преподаватель высшей категории, мастер производственного обучения по специальности парикмахeр;
эксперт независимой оценки квалификации по Белгородской области,  направление Парикмахерское искусство и декоративная косметика, судья региональных конкурсов профессионального мастерства.
    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Савицкая Ольга Владимировна</b> - преподаватель программ повышения квалификации, Чемпион VIII и IX Чемпионатов Белгородской области по парикмахерскому искусству, декоративной косметике и маникюру, конкурсный тренер.
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret4.png'/>
    </div>
</div>

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret5.png'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Анискина Юлия Сергеевна</b> - преподаватель программ повышения квалификации, многократный чемпион Белгородской области по парикмахерскому искусству, декоративной косметике и маникюру, конкурсный тренер, технолог профессиональной косметики  KV-1, ZACHARY Россия.
    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Бертенева Ирина Викторовна</b> - преподаватель программ повышения квалификации, модельер, технолог с правом преподавания профессиональной косметики Lisap.
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret6.png'/>
    </div>
</div>

<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret7.png'/>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective" style="margin:auto">

            <b>Серебрянникова Юлия Александровна</b> - преподаватель курса программ «Прикладная эстетика», «Дизайн и моделирование ногтей», «Маникюр», «Педикюр».
    </div>
</div>


<div class="visible-xs col-lg-10" style="margin-top:40px;"></div>

<div style='display:flex'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-collective text-right" style="margin:auto">

            <b>Стороженко Елена Юрьевна</b> - преподаватель курса прикладной эстетики, дополнительных программ стилистика и искусство визажа.
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin:auto; min-width: 100px">
        <img class='img-responsive img-collective' src='<?=Yii::getAlias('@web')?>/images/collective/portret8.png'/>
    </div>
</div>

    <div class="text-collective" style="padding-top:20px; height:100px">

            <b>Ерофтеев Вадим Анатольевич</b> - преподаватель Бизнес дисциплин, «Экономика и финансы», «Деловая эстетика», дополнительных дисциплин по программам профессионального обучения и программам дополнительного образования.
    </div>

<div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2" style="padding-top:40px;padding-bottom:40px;">
    <div ><a class="not-hover" id="course">КУРСЫ</a></div>
</div> 


<div style='display:flex; justify-content: center' class='hidden-sm hidden-xs'>
<?php

$categories = Category::find()->all();
$items = [];

foreach ($categories as $category) {
    echo "<div onClick=\"window.location.href='".Url::to(['site/courses','id'=>$category->id])."'\" align=center class='block-cat col-lg-2 col-md-2' style='max-width:150px; mix-width:149px'><img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name."</div>";
}

?>
</div>

<div class='hidden-lg hidden-md'>
<?php

$categories = Category::find()->all();
$items = [];
$counter=0;
foreach ($categories as $category) {
    $counter = $counter+1;
    if ($counter%2 == 1) {
        echo "<div style='display:flex; justify-content: center'>";
    }

    echo "<div align=center  class='col-sm-3 col-xs-4 block-cat' style='max-width:150px;mix-width:149px'>".Html::a("<img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name,['courses','id'=>$category->id],['class'=>'not-hover','style'=>'color:inherit'])."</div>";

    if ($counter%2 == 0 ) {
        echo "</div>";
    }
    if ($counter%2 == 0) {
        echo "<div class='col-sm-12 col-xs-12'> </div><br/>";
    }
    if ($counter == count($categories)){
       echo "</div>"; 
    }
}

?>
</div>

<!--
<div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2" style="padding-top:40px;padding-bottom:40px;">
    <div ><a class="not-hover" id="course">ОТЗЫВЫ ПРОШЕДШИХ ОБУЧЕНИЕ</a></div>
</div> 
<hr/>
<div class='col-lg-offset-1 col-md-offset-1' style='display:flex'>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style='margin:auto'>
        <img class='img-responsive rekommend' src='<?php //echo Yii::getAlias('@web')?>/images/otzivi/otziv1.png'/>
        <div class='subtext'>Ольга Фролова</div>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-rekommend" >
           Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание форм развития. Не следует, однако забывать, что сложившаяся структура организации влечет за собой процесс внедрения и модернизации систем массового участия. Задача организации, в особенности же дальнейшее развитие различных форм деятельности играет важную роль в формировании соответствующий условий активизации.
    Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание форм развития. Не следует, однако забывать, что сложившаяся структура организации влечет за собой процесс внедрения и модернизации систем массового участия. Задача организации, в особенности же дальнейшее развитие различных форм деятельности играет важную роль в формировании соответствующий условий активизации.
    </div>
</div>               
<hr/>
<div class='col-lg-offset-1 col-md-offset-1' style='display:flex'>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style='margin:auto'>
        <img class='img-responsive rekommend' src='<?php //echo Yii::getAlias('@web')?>/images/otzivi/otziv2.png'/>
        <div class='subtext'>Борис Гребенщиков</div>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-rekommend" >
        Разнообразный и богатый опыт консультация с широким активом способствует подготовки и реализации модели развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности влечет за собой процесс внедрения и модернизации дальнейших направлений развития.
        Разнообразный и богатый опыт консультация с широким активом способствует подготовки и реализации модели развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности влечет за собой процесс внедрения и модернизации дальнейших направлений развития.
 </div>
</div>               
<hr/>
<div class='col-lg-offset-1 col-md-offset-1' style='display:flex'>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style='margin:auto'>
        <img class='img-responsive rekommend' src='<?php //echo Yii::getAlias('@web')?>/images/otzivi/otziv3.png'/>
        <div class='subtext'>Алена Прекрасная</div>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-rekommend" >
Таким образом сложившаяся структура организации позволяет оценить значение направлений прогрессивного развития. Равным образом рамки и место обучения кадров позволяет оценить значение форм развития. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям.
    </div>
</div>               
<hr/>
-->