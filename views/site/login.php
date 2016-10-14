<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login ">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4 col-md-4\">{input}</div>\n<div class=\"col-lg-8 col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-md-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Логин')?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> | <?= Html::a("Зарегистрироваться", Url::toRoute(['user/add']))?> | <?=Html::a('Забыли пароль?', Url::to(["user/remember-pass"],true),['target'=>'_blank'])?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

<?php
    if (Yii::$app->getSession()->hasFlash('error')) {
        echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
    }
?>
<div class="row"> 
    <div class="text-center col-lg-2 col-md-2 col-sm-5 col-xs-5"><hr></div><div class="text-center alert-info img-circle col-lg-1 col-md-1 col-sm-2 col-xs-2 h4">или</div><div class="text-center col-lg-2 col-md-2 col-sm-5 col-xs-5"><hr></div>
</div>
<p class="lead">Войти с помощью</p>
<?php echo \nodge\eauth\Widget::widget(array('action' => 'site/login')); ?>
</div>
