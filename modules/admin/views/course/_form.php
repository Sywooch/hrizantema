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
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'id_cat')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>
    
    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'img')->widget(InputFile::className(),[
            'buttonName'      => 'Выбрать файл',
            'language'      => 'ru',
            'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'template'      => '<div class="input-group col-lg-8 col-md-8 col-sm-10 col-xs-12">{input}<span class="input-group-btn">{button}</span></div>'.'<br/><div class="col-lg-3 col-md-4 col-sm-5 col-xs-10 text-center"><img id="img_prev_news" class="img-responsive" src="'.$model->img.'"/></div><br/>',
            'options'       => ['class' => 'form-control','onchange'=>'$("#img_prev_news").attr("src",this.value)'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false])?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => ArrayHelper::merge(ElFinder::ckeditorOptions(['elfinder', 'baseUrl'=>'@web/images','basePath'=>'@webroot/images']),['preset' => 'full','height' => '200']),
        ])?>
    
    <?= $form->field($model, 'duration')->textInput()?>  
    
    <?= $form->field($model, 'duration_descr')->textInput()?>     
    
    <?= $form->field($model, 'price')->textInput()?> 
    
    <?= $form->field($model, 'seo_title')->textInput()?> 
    
    <?= $form->field($model, 'seo_descr')->textarea()?>     
    
    <div class="form-group text-center">
        <?= Html::submitButton('Создать курс',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
