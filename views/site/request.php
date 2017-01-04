<?php

use yii\bootstrap\Collapse;
use yii\bootstrap\Modal;
use app\models\Category;
use app\models\Course;
use app\models\Timing;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\popover\PopoverX;
use yii\web\JsExpression;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\color\ColorInput;
use yii\widgets\Pjax;

$this->title = 'Заявка';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-lg-10">
    <div class="caption_my text-left" style="padding-top:10px;padding-bottom:40px; padding-left:50px;">
    <a class="not-hover" id="request">Заявка на обучение</a>
</div> 
    
    
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); 
       
        $cat = Category::find()->all();
        $arr = [];
        $arr[0]='Ничего не выбрано...';
        foreach ($cat as $category) {
            $arrCourse = Course::find()->where(['id_cat'=>$category->id])->all();
            $arrCourse = ArrayHelper::map($arrCourse, 'id', 'name');
            $arr[$category->name]=$arrCourse;
        }
    
    ?>
    
    <?= $form->field($modelRequest, 'name')->textInput()->label('ФИО (полностью) <span style="color:red">*</span>') ?>
    <?= $form->field($modelRequest, 'phone')->textInput()->label('Номер телефона <span style="color:red">*</span>') ?>

    <?= $form->field($modelRequest, 'course')->dropDownList($arr)->label('Курс') ?>
            <?= $form->field($modelRequest, 'request_date')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'dd.mm.yyyy '],
                'language'=>'ru',
        ])->label('Желаемая дата начала обучения');  ?>
    <?= $form->field($modelRequest, 'about')->textarea()->label('О себе '.Html::tag('span', '', [
    'title'=>'Укажите (если уже имеете) свое образование, профессию, занимаемую должность, стаж работы, уровень навыков (любитель, профессионал, новичок)',
    'data-toggle'=>'tooltip',
    'style'=>'cursor:pointer; color:#337ab7; font-size:14pt;',
    'class'=>'glyphicon glyphicon-question-sign'    
])) ?>
    
    <div class="form-group text-center">
        <?= Html::submitButton('Отправить',['class' => 'btn btn-primary btn-outline','style'=>'margin-bottom:140px']) ?>
    </div>

    <?php ActiveForm::end(); ?>    
    <?php 
    
    if ($modelCourse!==false){
        $this->registerJs("$('select#request-course').val(".$modelCourse->id.");");
    }
    if ($modelCalendar!==false){
        if ($modelCalendar->dateStart!==""){
            $this->registerJs("$('#request-request_date').val('".date("d.m.Y",strtotime($modelCalendar->dateStart))."');");   
        }
        $course = Course::findOne($modelCalendar->id_course);
        $this->registerJs("$('select#request-course').val(".$course->id.");");
    } 
    if (!Yii::$app->user->isGuest) {
        $this->registerJs("$('#request-name').val('".Yii::$app->user->identity->namefull."');"); 
    }
    
    $js =''
   .'$(function () {' 
   .'    $("[data-toggle=\'tooltip\']").tooltip(); '
   .'});';


   $this->registerJs($js);   
    
 
    ?>
    
    







