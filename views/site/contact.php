<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Tabs;
use kartik\tabs\TabsX;


$this->title = "Контакты";
?>

    
    
    <?php 
        $this->beginBlock('callback'); 
    ?>
 




        <h4  style="">Обратная связь</h4>
            <div class=" col-lg-10 col-md-10" >
                

              <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                  <div class="alert alert-success">
                      Благодарим за Ваше сообщение!
                  </div>


              <?php else: ?>

                  <p>
          Если Вы имеете какие-либо вопросы или предложения, заполните эту форму, и мы ответим в ближайшее время.
                  </p>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput()->label('Ваше имя') ?>

                    <?= $form->field($model, 'email')->label('Ваш e-mail') ?>

                    <?= $form->field($model, 'subject')->label('Тема')?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Сообщение')?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        
<?php endif; ?>
<?php        
    $this->endBlock();
?>
<?php 
    $this->beginBlock('contact'); 
?>
<div style='margin-right:30px'>

 
 <div class="bs-callout bs-callout-primary"><h4 >Режим работы:</h4><p> Понедельник - суббота<br/>с 10<sup> 00</sup> до 16<sup> 00</sup></p></div>
 <div class="bs-callout bs-callout-primary"><h4><a class="not-hover" id="address">Телефоны, e&#8209;mail:</a></h4> <span class="glyphicon glyphicon-phone-alt"></span> +7 (4722) 72-00-75<br/>
 <span class="glyphicon glyphicon-phone"></span> +7-909-202-08-24<br/>
 <span class="glyphicon glyphicon-envelope"></span> trav.oks@yandex.ru</div>

<div class="bs-callout bs-callout-primary"><h4>Адрес:</h4> <div class="vcenter"><span class="glyphicon glyphicon-map-marker"></span></div> г. Белгород, ул. Горького, д.&nbsp;76<br/><br/>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=CflMpjcqyUx-J5tQPKAYasc0w_Ufkf9_&amp;width=100%&amp;height=422&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
<br/>
</div></div>
    <?php        
$this->endBlock();
?>


    <?php
        $mail = Yii::$app->request->get('mail');
    ?>
<?php
//        Tabsx::widget([
//    'position' => TabsX::POS_LEFT,
//    'align' => TabsX::ALIGN_LEFT,
//    'encodeLabels'=>false,
//    'options'=>['class'=>'nav nav-tabs tabs-left col-xs-12'],
//    'items' => [
//        [
//            'label' => '<div class=\'text-center\'><span style=\'font-size:26pt\' class=\' glyphicon glyphicon glyphicon-globe \'></span></div><span style=\'font-size:16pt\'>Наши&nbsp;контакты</span>',
//            'content' => $this->blocks['contact'],
//            'active' => isset($mail)?false:true,
//            'options'=>['class'=>isset($mail)?'fade':'fade in'],
//            'headerOptions' => ['class'=>'col-xs-1']
//        ],
//        [
//            'label' => '<div class=\'text-center\'><span style=\'font-size:26pt\' class=\' glyphicon glyphicon glyphicon glyphicon-envelope \'></span></div><span style=\'font-size:16pt\'>Связаться&nbsp;с&nbsp;нами</span>',
//            'content' => $this->blocks['callback'],
//            'headerOptions' => ['class'=>'col-xs-1'],
//            'active' => isset($mail)?true:false,
//            'options'=>['class'=>isset($mail)?'fade in':'fade']
//        ]
//
//    ],
//]);
        
//    Tabsx::widget([
//    'position' => TabsX::POS_LEFT,
//    'align' => TabsX::ALIGN_LEFT,
//    'items' => [
//        [
//            'label' => 'Контакты',
//            'content' => $this->blocks['contact'],
//            'active' => isset($mail)?false:true,
//            'options'=>['class'=>isset($mail)?'fade':'fade in'],
//            'headerOptions' => []
//        ],
//        [
//            'label' => 'Связаться с нами',
//            'content' => $this->blocks['callback'],
//            'headerOptions' => [],
//            'active' => isset($mail)?true:false,
//            'options'=>['class'=>isset($mail)?'fade in':'fade']
//        ]
//
//    ],
//]);
        
?>
        <div class="col-lg-7 col-md-7" ><?=$this->blocks['contact']?></div>
        <div class="col-lg-5 col-md-7 bs-callout bs-callout-primary" ><?=$this->blocks['callback']?></div>
