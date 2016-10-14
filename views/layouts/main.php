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
<body>
<?php $this->beginBody() ?>
<div class="container" >

    <div class='row'>  
        <div class='col-lg-2  col-md-2 col-sm-2 col-xs-2 '> 
        </div>
        <div class='col-lg-5  col-md-5 col-sm-5 col-xs-10 '>
            <?= Html::a("<img src='".Yii::$app->request->baseUrl." /images/head_hrizantema3.png' class='img-responsive'/>",Url::to(['site/index']))?>
        </div><!--
     --><div class='col-lg-5  col-md-5 col-sm-5 col-xs-12 text-center vcenter'><!--
        --><?=Html::a("<div class=\"vcenter\"><span style=\"font-size:18pt\" class=\"glyphicon glyphicon-map-marker text-info\"></span></div><strong> г. Белгород, ул. Горького, д. 76</strong><br/>",Url::to(['site/contact','#'=>'map']))?><!-- 
        --><div class='vcenter'><span style='font-size:18pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> <strong>+7 (4722) 72-00-75</strong><br/><!--
        --><?=Html::a("<div class=\"vcenter\"><span style=\"font-size:18pt\" class=\"glyphicon glyphicon-envelope text-info\"></span></div> <strong>trav.oks@yandex.ru</strong>",Url::to(['site/contact','mail'=>'send']))?><!--
     --></div>
    </div>
</div>
<div class="wrap">
    <?php
    
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse ',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Об организации', 'url' => ['/site/about']],
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

  <div class="container">  
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink'=>['label'=>'Главная','url'=>Url::to(['site/index'])]
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ЦПК "Хризантема" <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
