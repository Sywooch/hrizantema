<?php


use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

?>
<h2><?= $this->title ?></h2>
   <?php $form = ActiveForm::begin([
        'id' => 'registration-form']); 

   ?>

        <?= $form->field($model, 'name')->label('Логин') ?>
        <?= $form->field($model, 'email')->label('E-mail') ?>
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
        <?= $form->field($model, 'password_repeat')->passwordInput()->label('Повторите пароль') ?>
        <?= $form->field($model, 'captcha')->widget(Captcha::className(), [])->label('Введите код с картинки (англ.)') ?>


<?= Html::submitButton('Зарегистироваться',['class'=>'btn btn-success'])?> 
  <?php ActiveForm::end(); ?>
        

        
    
