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
use kartik\color\ColorInput;
use app\models\Course;
use app\models\Category;
use softark\duallistbox\DualListbox;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); 
       
        $cat = Category::find()->all();
        $arr = [];
        foreach ($cat as $category) {
            $arrCourse = Course::find()->where(['id_cat'=>$category->id])->all();
            $arrCourse = ArrayHelper::map($arrCourse, 'id', 'name');
            $arr[$category->name]=$arrCourse;
        }
    
    ?>
    
    <?= $form->field($model, 'id_course')->dropDownList($arr) ?>
    <hr/>
    <?php
        if (is_null($model->is_dow)){
            $model->is_dow = 0;
        }
    ?>
    <?= $form->field($model, 'is_dow')->radioList(['0'=>'По дате','1'=>'По дням недели'],['onchange'=>'changeVisibleDate(this);','class'=>'myRadio'])->label(false)?>
    
    <div class="col-sm-6 col-sm-offset-3 " style="display:<?php echo ($model->is_dow=='0')?'none':'block'?>;float:none" id="repeat_block"><?= DualListbox::widget([
        'model' => $model,
        
        'attribute' => 'dow',
        'items' => ['0'=>'Понедельник','1'=>'Вторник','2'=>'Среда','3'=>'Четверг','4'=>'Пятница','5'=>'Суббота','6'=>'Воскресенье'],

        'options' => [
            'multiple' => true,
            'size' => 10,
        ],
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Выбранные дни',
            'nonSelectedListLabel' => 'Дни недели',
            'showFilterInputs'=>false,
            'infoText'=>false
        ],
    ]);?></div>
    
    <div style="display:<?php echo ($model->is_dow=='0')?'block':'none'?>;" id="date_block"><?php
          echo $form->field($model, 'dateStart')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'yyyy-mm-dd '],
                'language'=>'ru',
        ]);
           echo $form->field($model, 'dateEnd')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'yyyy-mm-dd '],
                'language'=>'ru'
        ]);
    ?></div>
    <hr/>
    <?= $form->field($model, 'allDay')->checkbox(['onchange'=>'changeVisibleTime(this);'])->label('Идет весь день') ?> 
    <div id="time_block" style="display:<?= ($model->allDay=="1")?'none':'block'?>;">
    <?php echo $form->field($model, 'timeStart')->widget(TimePicker::className(),[
                'pluginOptions'=>[
                    'showMeridian' => false,
                    'minuteStep' => 5,    
                    ],
                'language'=>'ru',
        ]);
    ?>
    <?php echo $form->field($model, 'timeEnd')->widget(TimePicker::className(),[
                'pluginOptions'=>[
                    'showMeridian' => false,
                    'minuteStep' => 5,    
                    ],
                'language'=>'ru',
        ]);
    ?> 
        </div>
    <div class="form-group text-center">
        <?= Html::submitButton((isset(Yii::$app->request->get()['id'])==false)?'Создать событие':'Изменить событие',['class' => 'btn btn-success']) ?>
        <?php
        if (isset(Yii::$app->request->get()['id'])==true) {
            echo Html::a('Удалить событие',['delete','id'=>Yii::$app->request->get()['id']],[
                'class' => 'btn btn-danger',
                'title' => Yii::t('app', 'Удалить'),
                //'data-confirm'=>"Вы действительно хотите удалить это событие ?",
                'data-method' => 'post'
                ]);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
