<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Tabs;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>

    
    
    <?php 
        $this->beginBlock('callback'); 
    ?>
 <div style='margin-left:30px; margin-right:30px'>

      <br/><br/><br/><br/><br/>
      <h1>Обратная связь</h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Благодарим за Ваше сообщение!
        </div>


    <?php else: ?>

        <p>
Если Вы имеете какие-либо вопросы или предложения, заполните форму обратной связи. Спасибо!
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput()->label('Ваше имя') ?>

                    <?= $form->field($model, 'email')->label('Ваш e-mail') ?>

                    <?= $form->field($model, 'subject')->label('Тема')?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Сообщение')?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
<?php endif; ?>
<?php        
    $this->endBlock();
?>
<?php 
    $this->beginBlock('contact'); 
?>
<div style='margin-left:30px; margin-right:30px'>
 <br/><br/><br/><br/><br/>
 <h3>Адрес:</h3> г. Белгород, ул. Горького, д. 76 
 <h3>График работы:</h3> Понедельник - суббота<br/>с 10<sup> 00</sup> до 16<sup> 00</sup>
 <h3>Телефоны:</h3> <span class="glyphicon glyphicon-phone-alt"></span> +7 (4722) 72-00-75<br/>
 <span class="glyphicon glyphicon-phone"></span> +7-909-202-08-24

<a name="map"><h3>Адрес на карте</h3></a>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=CflMpjcqyUx-J5tQPKAYasc0w_Ufkf9_&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
</div>
    <?php        
$this->endBlock();
?>

<div class="site-contact">
    <?php
        $mail = Yii::$app->request->get('mail');
    ?>
<?= Tabs::widget([
    'encodeLabels'=>false,
    'options'=>['class'=>'nav nav-tabs nav-justified col-xs-12'],
    'items' => [
        [
            'label' => '<div class=\'text-center\'><span style=\'font-size:26pt\' class=\' glyphicon glyphicon glyphicon-globe \'></span></div><span style=\'font-size:16pt\'>Наши&nbsp;контакты</span>',
            'content' => $this->blocks['contact'],
            'active' => isset($mail)?false:true,
            'options'=>['class'=>isset($mail)?'fade':'fade in'],
            'headerOptions' => ['class'=>'col-xs-1']
        ],
        [
            'label' => '<div class=\'text-center\'><span style=\'font-size:26pt\' class=\' glyphicon glyphicon glyphicon glyphicon-envelope \'></span></div><span style=\'font-size:16pt\'>Связаться&nbsp;с&nbsp;нами</span>',
            'content' => $this->blocks['callback'],
            'headerOptions' => ['class'=>'col-xs-1'],
            'active' => isset($mail)?true:false,
            'options'=>['class'=>isset($mail)?'fade in':'fade']
        ]

    ],
]);
?>
</div>
