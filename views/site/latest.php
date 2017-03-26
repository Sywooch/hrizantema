<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Collapse;

$this->title = $model->seo_title;
$this->registerMetaTag(["name"=>"description","content"=>$model->seo_descr]);

$this->params['breadcrumbs'][] = ['label'=>'Новинки','url'=>['latest']];
$this->params['breadcrumbs'][] = $model->title;



    Modal::begin([
            'header' => "<h2 align='center'>Просмотр изображения</h2>",
            'options'=>['id'=>'modal-img'],
            'size'=>'modal-lg',
            'clientOptions'=>[
                'show'=>false,
                'keyboard'=>true
            ],
        ]);
        echo "<div class='' align='center'><img class='img-responsive' id='img_view'></div>";
    Modal::end();

?>
<div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2" style="padding-top:0px;padding-bottom:20px;">
    <div><a class="not-hover"><?=$this->title?></a></div>
</div> 

<div class="col-lg-8 col-md-8" style="border-right:1px solid #eee">
<div class='img-left col-lg-5 col-md-5 col-sm-5 col-xs-12'>
    <a href='' onclick='return false;'><img class='img-responsive' style='max-height:300px;' src='<?= $model->img ?>' onclick='$("#img_view").attr("src","<?= $model->img ?>"); $("#modal-img").modal("show")'/></a>
</div>
<div class="text-news"><?= $model->text ?></div>
<div class='news-date' style='float:left; padding-left:0px'>Дата: <?= $model->date_news ?></div>
<div class='news-date' style='float:right'>Автор: <?= $model->user->username ?></div>
<div style='height:50px;'></div>
</div>

<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 col-sm-offset-2 col-lg-offset-0 col-md-offset-0">
    <?php
    $cont = "";
    if ($modelOther !== null){
        
        foreach ($modelOther as $newOther) {
            $cont = $cont."<div style='min-height:120px;display:flex;font-size:9pt;' class='news-right'>";;
            $cont = $cont."<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5 news-img'>".Html::a("<img style='max-height:100px;' class='img-responsive'  src='".$newOther->img."'></div>",['site/news','id'=>$newOther->id],['class'=>'']);
            $cont = $cont."<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7' style='margin:auto 0; text-align:left'>".Html::a($newOther->title,['site/news','id'=>$newOther->id])."</div>";
            $cont = $cont."</div>";
            $cont = $cont."<div style='font-size:8pt; margin-top:-17px; text-align:right;padding-right:5px; color:#777;'> Дата: ".$newOther->date_news."</div>";
            $cont = $cont."<hr style='margin-top:0px; margin-bottom:0px'/>";
            
        }
        $cont = $cont."<div align=right style='padding-top:10px;padding-bottom:10px; font-size:10pt; font-style:italic'>".Html::a('Все новости...',['site/news'])."</div>";
    }
    
    $cont2 = "";
    if ($modelOther2 !== null){
        foreach ($modelOther2 as $newOther) {
            $cont2 = $cont2."<div style='min-height:120px;display:flex;font-size:9pt' class='news-right'>";
            $cont2 = $cont2."<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5 news-img'>".Html::a("<img style='max-height:100px;' class='img-responsive'  src='".$newOther->img."'></div>",['site/stocks','id'=>$newOther->id],['class'=>'']);
            $cont2 = $cont2."<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7' style='margin:auto 0; text-align:left'>".Html::a($newOther->title,['site/stocks','id'=>$newOther->id])."</div>";
            $cont2 = $cont2."</div>";
            $cont2 = $cont2."<div style='font-size:8pt; margin-top:-17px; text-align:right;padding-right:5px; color:#777;'> Дата: ".$newOther->date_news."</div>";
            $cont2 = $cont2."<hr style='margin-top:0px; margin-bottom:0px'/>";
            
        }
        $cont2 = $cont2."<div align=right style='padding-top:10px;padding-bottom:10px; font-size:10pt; font-style:italic'>".Html::a('Все акции...',['site/stocks'])."</div>";
    }

    $cont5 = "";
    if ($modelOther5 !== null){
        foreach ($modelOther5 as $newOther) {
            $cont5 = $cont5."<div style='min-height:120px;display:flex;font-size:9pt' class='news-right'>";
            $cont5 = $cont5."<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5 news-img'>".Html::a("<img style='max-height:100px;' class='img-responsive'  src='".$newOther->img."'></div>",['site/latest','id'=>$newOther->id],['class'=>'']);
            $cont5 = $cont5."<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7' style='margin:auto 0; text-align:left'>".Html::a($newOther->title,['site/latest','id'=>$newOther->id])."</div>";
            $cont5 = $cont5."</div>";
            $cont5 = $cont5."<div style='font-size:8pt; margin-top:-17px; text-align:right;padding-right:5px; color:#777;'> Дата: ".$newOther->date_news."</div>";
            $cont5 = $cont5."<hr style='margin-top:0px; margin-bottom:0px'/>";
            
        }
        $cont5 = $cont5."<div align=right style='padding-top:10px;padding-bottom:10px; font-size:10pt; font-style:italic'>".Html::a('Все новинки...',['site/latest'])."</div>";
    }

    $cont6 = "";
    if ($modelOther6 !== null){
        //$cont6 = $cont6."<hr style='margin-top:-15px; border:none; margin-bottom:0px'/>";
        foreach ($modelOther6 as $newOther) {
            $cont6 = $cont6."<div style='min-height:120px;display:flex;font-size:9pt' class='news-right'>";
            $cont6 = $cont6."<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5 news-img'>".Html::a("<img style='max-height:100px;' class='img-responsive'  src='".$newOther->img."'></div>",['site/discounts','id'=>$newOther->id],['class'=>'']);
            $cont6 = $cont6."<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7' style='margin:auto 0; text-align:left'>".Html::a($newOther->title,['site/discounts','id'=>$newOther->id])."</div>";
            $cont6 = $cont6."</div>";
            $cont6 = $cont6."<div style='font-size:8pt; margin-top:-17px; text-align:right;padding-right:5px; color:#777;'> Дата: ".$newOther->date_news."</div>";
            $cont6 = $cont6."<hr style='margin-top:0px; margin-bottom:0px'/>";
        }
        $cont6 = $cont6."<div align=right style='padding-top:10px;padding-bottom:10px; font-size:10pt; font-style:italic'>".Html::a('Все скидки...',['site/discounts'])."</div>";
    }    
    echo Collapse::widget([
    'options'=>[
        'class'=>'hidden-xs hidden-sm'
    ],
    'items' => [
        // equivalent to the above
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Еще новинки</div>",
            'content' => $cont5,
            // open its content by default
            'contentOptions' => ['class' => 'in without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Новости</div>",
            'content' => $cont,    
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Акции</div>",
            'content' => $cont2,   
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Скидки</div>",
            'content' => $cont6, 
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
    ]
]);
    ?>
</div>

   
<?php

 
 echo Collapse::widget([
    'options'=>[
        'class'=>'hidden-lg hidden-md',
        'style'=>'margin-top:20px;'
    ],
    'items' => [
        // equivalent to the above
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Еще новинки</div>",
            'content' => $cont5,
            // open its content by default
            'contentOptions' => ['class' => 'in without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Новости</div>",
            'content' => $cont,    
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Акции</div>",
            'content' => $cont2,   
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
        [
            'label' => "<div style='text-align:center; font-size:12pt' class='news-upper'>Скидки</div>",
            'content' => $cont6, 
            'contentOptions' => ['class' => 'without-padding'],
            'encode'=>false
        ],
    ]
]);
?>
