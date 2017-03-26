<?php

use yii\helpers\Html;

use kartik\detail\DetailView;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use skeeks\yii2\ckeditor\CKEditorWidget;
use skeeks\yii2\ckeditor\CKEditorPresets;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\CategoryNews;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h2>Просмотр и редактирование мероприятия</h2>
<?php
$attributes = [
    [
        'group'=>true,
        'label'=>'Информация',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns'=>[
            [
                'attribute'=>'user_id',
                'label'=>'Автор',
                'displayOnly'=>true,
                'value'=>$model->user->username
            ],
            [
                'attribute'=>'date', 
                'format'=>'date',
                'label'=>'Дата создания',
                'displayOnly'=>true,
                'inputWidth'=>'40%' 
            ]
        ],
    ],
    [
        'group'=>true,
        'label'=>'Наполнение текстом',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'attribute'=>'type', 
        'label'=>'Группа',
        'format'=>'text',
        'type'=>DetailView::INPUT_DROPDOWN_LIST,
        'value'=>$model->categoryNews->name,
        'items'=>ArrayHelper::map(CategoryNews::find()->all(), 'id', 'name')
    ],    
    [
        'attribute'=>'title', 
        'label'=>'Заголовок',
        'format'=>'raw',
    ],
    [
       'attribute'=>'img',
        'label'=>'Изображение',
        'value'=>"<a class='col-xs-3' style='max-width:300px' onclick='return false;'><img class='img-responsive' src='".$model->img."' onclick='$(\"#img_view\").attr(\"src\",\"".$model->img."\"); $(\"#modal-img\").modal(\"show\")'/></a>",
        //'value'=>'<img src='.$model->img.' class="img-responsive col-lg-3 col-md-4 col-sm-5 col-xs-10">',
        //'inputContainer' => ['class'=>'col-lg-1 col-md-1 col-sm-1 col-xs-1'],
        'format'=>'raw',
        'type'=>DetailView::INPUT_WIDGET,
        'widgetOptions'=> [
            'class'=>InputFile::ClassName(),
            'buttonName'      => 'Выбрать файл',
            'language'      => 'ru',
            'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'template'      => '<div class="input-group col-lg-8 col-md-8 col-sm-5 col-xs-5">{input}<span class="input-group-btn">{button}</span></div><br/><div class="col-lg-3 col-md-4 col-sm-5 col-xs-10 text-center"><img style="max-width:300px" id="img_prev_news" class="img-responsive"  src="'.$model->img.'" onclick="$(\'#img_view\').attr(\'src\',\''.$model->img.'\'); $(\'#modal-img\').modal(\'show\');"/></div><br/>',
            'options'       => ['class' => 'form-control','onchange'=>'$("#img_prev_news").attr("src",this.value)'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false
        ],
    ],
    [
        'attribute'=>'short_text', 
        'label'=>'Текст сокращенный',
        'format'=>'raw',
        'type'=>DetailView::INPUT_WIDGET,
        'widgetOptions'=> [
            'class'=>CKEditor::className(),
            'editorOptions' => ArrayHelper::merge(ElFinder::ckeditorOptions(['elfinder', 'baseUrl'=>'@web/images','basePath'=>'@webroot/images']),['preset' => 'full','height' => '200']),
        ],
        
    ],
    [
        'attribute'=>'text', 
        'label'=>'Текст',
        'format'=>'raw',
        'type'=>DetailView::INPUT_WIDGET,
        'widgetOptions'=> [
            'class'=>CKEditor::className(),
            'editorOptions' => ArrayHelper::merge(ElFinder::ckeditorOptions(['elfinder', 'baseUrl'=>'@web/images','basePath'=>'@webroot/images']),['preset' => 'full','height' => '300']),
        ]
    ],

    [
        'attribute'=>'date_news', 
        'format'=>'date',
        'label'=>'Дата',
        'type'=>DetailView::INPUT_DATE,
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd '],
            'language'=>'ru'
        ],
    ],    
    [
        'attribute'=>'visible', 
        'label'=>'Включить в ленту',
        'format'=>'raw',
        'value'=>$model->visible ? 
            '<span class="label label-success">Да</span>' : 
            '<span class="label label-danger">Нет</span>',
        'type'=>DetailView::INPUT_SWITCH,
        'widgetOptions'=>[
            'pluginOptions'=>[
                'onText'=>'Да',
                'offText'=>'Нет',
            ]
        ]
    ],
    [
        'attribute'=>'seo_title', 
        'label'=>'SEO-заголовок',
        'format'=>'raw',
    ],
    [
        'attribute'=>'seo_descr', 
        'label'=>'SEO-описание',
        'type'=>'textarea',
        'format'=>'raw'
    ],
    ];
    $edit = \Yii::$app->request->get('edit');
    echo DetailView::widget([
    'model'=>$model,
    'options'=>['style'=>'min-width:200px;'],
    'formatter' => [
            'class'=>'yii\i18n\Formatter', 
            'dateFormat'=>'dd MMMM yyyy г.', 
            'locale'=>'ru-Ru'
    ],   
    'attributes'=>$attributes,

    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
        
    'mode'=>(!empty($edit))?DetailView::MODE_EDIT:DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Новость: ' . $model->title,
    ],
    'deleteOptions'=>[
        'url'=>['delete', 'id' => $model->id],
        'title'=>'Удалить',
        'confirm'=>Yii::t('app', 'Вы действительно хотите удалить это мероприятие?'),
    ],
    'updateOptions'=>[    
        'title'=>'Изменить'
    ],
    'viewOptions'=>[    
        'title'=>'Просмотреть'
    ],
    'saveOptions'=>[    
        'title'=>'Сохранить'
    ],
    'resetOptions'=>[    
        'title'=>'Отменить изменения'
    ],
]);
?>
<?php
    Modal::begin([
            'header' => "<h2 align='center'>Просмотр изображения</h2>",
            'options'=>['id'=>'modal-img'],
            'size'=>'modal-lg',
            'clientOptions'=>[
                'show'=>false,
                'keyboard'=>true
            ],
        ]);
        echo "<div class='' align='center'><img class='img-responsive' id='img_view'></div>";
    Modal::end();

?>
</div>
