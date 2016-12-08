<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use skeeks\yii2\ckeditor\CKEditorWidget;
use skeeks\yii2\ckeditor\CKEditorPresets;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'img')->widget(InputFile::className(),[
            'buttonName'      => 'Выбрать файл',
            'language'      => 'ru',
            'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'template'      => '<div class="input-group col-lg-8 col-md-8 col-sm-10 col-xs-12">{input}<span class="input-group-btn">{button}</span></div>'.'<br/><div class="col-lg-3 col-md-4 col-sm-5 col-xs-10 text-center"><img id="img_prev_news" class="img-responsive" src="'.$model->img.'"/></div><br/>',
            'options'       => ['class' => 'form-control','onchange'=>'$("#img_prev_news").attr("src",this.value)'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false])?>

    <?= $form->field($model, 'short_text')->widget(CKEditor::className(),[
        'editorOptions' => ArrayHelper::merge(ElFinder::ckeditorOptions(['elfinder', 'baseUrl'=>'@web/images','basePath'=>'@webroot/images']),['preset' => 'full','height' => '200']),
        ])?>
    
    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => ArrayHelper::merge(ElFinder::ckeditorOptions(['elfinder', 'baseUrl'=>'@web/images','basePath'=>'@webroot/images']),['preset' => 'full','height' => '300']),
        ])?>

    <?= $form->field($model, 'date_news')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'yyyy-mm-dd '],
                'language'=>'ru'
        ])?>
    
    <?= $form->field($model, 'visible')->hiddenInput(['value'=>1])->label(false) ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Создать мероприятие',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
