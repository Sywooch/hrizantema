<?php
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
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
                'label' => 'Имя',
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
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '',
                'contentOptions'=>function($data){
                    
                        return ['style'=>''];
                    
                },
                'value' => function($data){
        
                    $content=Html::a("+",['site/accessrequest','id'=>$data->id],['class'=>'btn btn-success btn-outline']);
                    $content = $content." ".Html::a("-",['site/declinerequest','id'=>$data->id],['class'=>'btn btn-danger btn-outline']);
                    return $content;
                }
            ],
            // 'date',

                  
        ],
    ]);
