<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\tabs\TabsX;
use app\models\Course;

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?php
    $cont1 = GridView::widget([
        'dataProvider' => $model,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'layout'=>'{pager}{errors}{items}',
        'emptyText'=>"Новые заявки не найдены...",

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format'=>'date',
                'attribute' => 'date',
                'label' => 'Дата заявки'
            ],
            [      
                'contentOptions'=>['class'=>'col-lg-2'],
                'attribute' => 'name',
                'format' => 'raw',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'label' => 'Телефон'
            ],
            [
                'format'=>'date',
                'attribute' => 'request_date',
                'label' => 'Дата желаемого начала обучения'
            ],
            [
                'attribute' => 'course',
                'format' => 'raw',
                'label' => 'Курс',
                'value' => function($data){
                    if (($data->course!==NULL)&&($data->course!==0)){
                        $content = Course::findOne($data->course)->name;
                    } else {
                        $content = "Не указан";
                    }
                    return $content;
                }
            ],                
            [
                'attribute' => 'about',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
                    $capt = (empty($data->about))?"Не заполнено":$data->about;
                    $content = Html::tag('button', 'Инфо', [
                        'title'=>$capt,
                        'data-toggle'=>'tooltip',
                        'style'=>'',
                        'class'=>'btn btn-info'    
                    ]);       
                    return $content;
                }
            ],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
        
                    $content=Html::a("+",['site/accessrequest','id'=>$data->id],['class'=>'btn btn-success btn-outline','title'=>'Принять']);
                    $content = $content." ".Html::a("-",['site/declinerequest','id'=>$data->id],['class'=>'btn btn-danger btn-outline','title'=>'Отклонить']);
                    return $content;
                }
            ],
            // 'date',

                  
        ],
    ]);
   

    $cont2 = GridView::widget([
        'dataProvider' => $model2,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'layout'=>'{pager}{errors}{items}',
        'emptyText'=>"Принятые заявки не найдены...",

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format'=>'date',
                'attribute' => 'date',
                'label' => 'Дата заявки'
            ],
            [      
                'contentOptions'=>['class'=>'col-lg-2'],
                'attribute' => 'name',
                'format' => 'raw',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'label' => 'Телефон'
            ],
            [
                'format'=>'date',
                'attribute' => 'request_date',
                'label' => 'Дата желаемого начала обучения'
            ],
            [
                'attribute' => 'course',
                'format' => 'raw',
                'label' => 'Курс',
                'value' => function($data){
                    if (($data->course!==NULL)&&($data->course!==0)){
                        $content = Course::findOne($data->course)->name;
                    } else {
                        $content = "Не указан";
                    }
                    return $content;
                }
            ], 
            [
                'attribute' => 'about',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
                    $capt = (empty($data->about))?"Не заполнено":$data->about;
                    $content = Html::tag('button', 'Инфо', [
                        'title'=>$capt,
                        'data-toggle'=>'tooltip',
                        'style'=>'',
                        'class'=>'btn btn-info'    
                    ]);       
                    return $content;
                }
            ],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
                    $content = Html::a("-",['site/declinerequest','id'=>$data->id],['class'=>'btn btn-danger btn-outline','title'=>'Отклонить']);
                    return $content;
                }
            ],
            // 'date',

                  
        ],
    ]);            
            
    $cont3 = GridView::widget([
        'dataProvider' => $model3,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'layout'=>'{pager}{errors}{items}',
        'emptyText'=>"Отклоненные заявки не найдены...",

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format'=>'date',
                'attribute' => 'date',
                'label' => 'Дата заявки'
            ],
            [      
                'contentOptions'=>['class'=>'col-lg-2'],
                'attribute' => 'name',
                'format' => 'raw',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'label' => 'Телефон'
            ],
            [
                'format'=>'date',
                'attribute' => 'request_date',
                'label' => 'Дата желаемого начала обучения'
            ],
            [
                'attribute' => 'course',
                'format' => 'raw',
                'label' => 'Курс',
                'value' => function($data){
                    if (($data->course!==NULL)&&($data->course!==0)){
                        $content = Course::findOne($data->course)->name;
                    } else {
                        $content = "Не указан";
                    }
                    return $content;
                }
            ], 
            [
                'attribute' => 'about',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
                    $capt = (empty($data->about))?"Не заполнено":$data->about;
                    $content = Html::tag('button', 'Инфо', [
                        'title'=>$capt,
                        'data-toggle'=>'tooltip',
                        'style'=>'',
                        'class'=>'btn btn-info'    
                    ]);       
                    return $content;
                }
            ],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>'text-align:center'];
                    
                },
                'value' => function($data){
        
                    $content=Html::a("+",['site/accessrequest','id'=>$data->id],['class'=>'btn btn-success btn-outline','title'=>'Принять']);
                    return $content;
                }
            ],
            // 'date',

                  
        ],
    ]);          

$items = [
    [
        'label'=>'Новые заявки',
        'content'=>$cont1,
        'active'=>true
    ],
    [
        'label'=>'Принятые',
        'content'=>$cont2
    ],
    [
        'label'=>'Отклоненные',
        'content'=>$cont3
    ]
];

            
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);            
            
            
    $js =''
   .'$(function () {' 
   .'    $("[data-toggle=\'tooltip\']").tooltip(); '
   .'});';


   $this->registerJs($js); 
