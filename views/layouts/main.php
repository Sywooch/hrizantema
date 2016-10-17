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
<body data-spy="scroll" data-target=".navbar" data-offset="50">
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
        <div class='row'>
            <div class='col-lg-1 col-md-1'>
            </div>
            
            <div class='col-lg-2 col-md-2 col-sm-2 col-xs-3 text-center' style='max-width:130px;  padding-top:10px; padding-bottom:10px'>
                <img alt="Brand" src="<?=Yii::$app->request->baseUrl?>/images/hriz2.png" class='img-responsive'/>
            </div>
            <div class='col-lg-5  col-md-6 col-sm-6 col-xs-9 vcenter' ><!--
            --><h3 style='font-family:verdana;'>ХРИЗАНТЕМА<br/><small>Первый Центр повышения квалификации и профессиональной подготовки
Белгородской области</small></h3><!--
        --></div><!--
        --><div class='col-lg-3  col-md-3 col-sm-4 col-xs-12 text-center vcenter' style='font-family:vardana;font-size:14pt;'><!--
            --><div class='vcenter'><span style='font-size:18pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> +7 (4722) 72-00-75<br/><!--
        --></div>
       </div>
           </div>

    <?php    

    NavBar::begin([
        'brandOptions' => [],
        'brandLabel' => "",

        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default ','data-spy'=>'affix','data-offset-top'=>140
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav col-lg-12','style'=>'float:none'],
        'items' => [
            ['label' => '','options'=>['class'=>'col-lg-1 col-md-1 col-sm-1']],
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
       
    ?>



    <div class='col-lg-offset-1 col-md-offset-1 col-lg-10  col-md-10 col-sm-12 col-xs-12' style="padding-bottom:20px">
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
