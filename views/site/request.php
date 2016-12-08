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
    
    <?= $form->field($modelRequest, 'name')->textInput()->label('Ваше имя') ?>
    <?= $form->field($modelRequest, 'phone')->textInput()->label('Номер телефона') ?>

    <?= $form->field($modelRequest, 'course')->dropDownList($arr)->label('Курс') ?>
            <?= $form->field($modelRequest, 'request_date')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'dd.mm.yyyy '],
                'language'=>'ru',
        ])->label('Желаемая дата начала обучения');  ?>
    

    
    
    <div class="form-group text-center">
        <?= Html::submitButton('Отправить',['class' => 'btn btn-primary btn-outline']) ?>
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
    
    
    
 
    ?>
    
    







