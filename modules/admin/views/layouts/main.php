<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Request;

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
<div class="container">


</div>
<div class="wrap">
    <div class="text-center h2" style="margin:0px">Режим администратора</div>
    <?php
    $requestCol = Request::find()->where(['status'=>'1'])->count();
    if ($requestCol == 0) {
        $requestCol = '0';
    }
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse nav-height-admin',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left '],
        'items' => [
            ['label' => 'Мероприятия', 'url' => ['/admin/news']],
            ['label' => 'Курсы', 'items'=>[
                    ['label' => 'Категории','url' => ['/admin/category']],
                    ['label' => 'Курсы','url' => ['/admin/course']],
                    ['label' => 'Расписание','url' => ['/admin/timing']]
                ]
            ],  
            ['label' => 'Заявки ('.(string)$requestCol.")", 'url' => ['/admin/site/request']],
            ['label' => 'Комментарии', 'url' => ['/admin/comments/index']],
        ],
    ]);
    
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'На сайт', 'url' => ['/site/index']],
            '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
