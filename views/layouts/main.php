<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    
//    NavBar::begin([
//        'brandOptions' => ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-2'],
//        'brandLabel' => '<img alt="Brand" src="'.Yii::$app->request->baseUrl."/images/hriz2.png\" class='img-responsive'/>",
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar',
//        ],
//    ]);
//echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-left'],
//        'items' => [
//            [
//                'label' => 'ХРИЗАНТЕМА',
//                'encode' => false,
//                'url' => false,
//                'options' => []
//                
//            ],
//            
//        ],
//    ]);
//    NavBar::end();
?> 
       <div class="container">   
        <div class='row' id='header'>
            <div class='col-lg-1 col-md-1'>
            </div>
            
            <div class='col-lg-2 col-md-2 col-sm-2 col-xs-3 text-center' style='max-width:120px; min-width:60px; padding-top:10px; padding-bottom:10px'>
                <?= Html::a('<img alt="Brand" src="'.Yii::$app->request->baseUrl.'/images/hriz2.png" class="img-responsive"/>',['site/index'])?>
            </div>
            <div class='col-lg-5  col-md-6 col-sm-6 col-xs-9 vcenter' ><!--
            --><h3 class="hidden-xs" style='font-family:verdana; '>ХРИЗАНТЕМА<br/><small>Первый Центр повышения квалификации и профессиональной подготовки
Белгородской области</small></h3><!--
            --><h4 class="visible-xs" style='font-family:verdana; '>ХРИЗАНТЕМА<br/><small>Первый Центр повышения квалификации и профессиональной подготовки
Белгородской области</small></h4><!--
        --></div><!--
        --><div class='hidden-xs col-lg-3  col-md-3 col-sm-4 col-xs-12 vcenter' style='font-family:verdana;font-size:14pt;'><!--
            --><div class='vcenter'><span style='font-size:18pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> +7 (4722) 72-00-75<br/><!--
            --><div class='vcenter'><span style='font-size:16pt' class="glyphicon glyphicon-time text-info"></span></div><span style="font-size:12pt"> Понедельник - суббота &nbsp;10<sup>00</sup>&nbsp;-&nbsp;16<sup>00</sup></span><!--
        --></div><!--
        --><div class='visible-xs col-lg-3  col-md-3 col-sm-4 col-xs-12 vcenter text-center' style='font-family:verdana;font-size:12pt;'><!--
            --><div class='vcenter'><span style='font-size:14pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> +7 (4722) 72-00-75<br/><!--
            --><div class='vcenter'><span style='font-size:14pt' class="glyphicon glyphicon-time text-info"></span></div> Понедельник - суббота &nbsp;10<sup>00</sup>&nbsp;-&nbsp;16<sup>00</sup><!--
        --></div>
       </div>
           </div>
    
    
<div class='nav-wrapper'>
    <?php    

    NavBar::begin([
        'brandOptions' => ['style'=>'','class'=>'visible-xs'],
        'brandLabel' => '<form class="" style="margin-top:-7px;">
    <button class="btn btn-primary btn-outline" type="submit">Записаться</button>
  </form>',

        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default ','id'=>'myAffix'
        ],

    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav col-lg-1 col-md-1 hidden-sm hidden-xs'],
                'items' => [
            ['label' => '']]
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav','style'=>''],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                ['label'=>''
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form1'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link','style'=>'padding-left:6px']
                )
                . Html::endForm()
                . '','encode'=>false]
            ),
            ['label'=>''
                . Html::beginForm("", 'post', ['class' => 'navbar-form2 ', 'style'=>'float:left'])
                . Html::submitButton(
                    'Записаться',
                    ['class' => 'btn btn-primary btn-outline']
                )
                . Html::endForm(),
                'encode'=>false,
                'options'=>[
                    'class'=>'hidden-xs'
                ]
            ],


            
        ],
    ]);
    
    NavBar::end();
       
    ?>
</div>


    <div class='col-lg-offset-1 col-md-offset-1 col-lg-10  col-md-10 col-sm-12 col-xs-12' style="padding-bottom:20px; ">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink'=>['label'=>'Главная','url'=>Url::to(['site/index'])]
        ]) ?>
      
        <?= $content ?>
        </div>
</div>
<footer class="footer col-sm-12 col-xs-12">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10  col-md-10">
        <p class="pull-left">&copy; ЦПК "Хризантема" <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>
    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
