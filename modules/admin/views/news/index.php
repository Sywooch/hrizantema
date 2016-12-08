<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать мероприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'layout'=>'{pager}{errors}{items}',
        'emptyText'=>"Мероприятия не найдены...",
//        'panel'=>[
//            'type'=>GridView::TYPE_PRIMARY,
//            'heading'=>'Список',
//        ],
        'export'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title:ntext',
            [      
                'contentOptions'=>['class'=>'col-lg-2'],
                'attribute' => 'img',
                'format' => 'raw',
                'label' => 'Изображение',
                'value' => function($data){
        
                    $content="<a href='' onclick='return false;'><img class='img-responsive' src='".$data->img."' onclick='$(\"#img_view\").attr(\"src\",\"".$data->img."\"); $(\"#modal-img\").modal(\"show\")'/></a>";
                    return $content;
                }
            ],
            'short_text:html',
            
            // 'date',

                    [
            'class' => 'yii\grid\ActionColumn',
            'template' => '<div style="text-align:center">{new_action3} {new_action2} {new_action1}</div>',
            'buttons' => [
               'new_action2' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-pencil"></span>',Url::toRoute(['news/view','id'=>$model->id,'edit'=>1]),[
                              'title' => Yii::t('app', 'Изменить')
                          ]);

              },
              'new_action1' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::toRoute(['news/delete','id'=>$model->id]), [
                              'title' => Yii::t('app', 'Удалить'),
                              'data-confirm'=>"Вы действительно хотите удалить это мероприятие ?",
                              'data-method' => 'post',
                              'data-pjax' => '1'
                  ]);
              },
              'new_action3' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['news/view','id'=>$model->id]), [
                              'title' => Yii::t('app', 'Просмотреть')
                  ]);
              },


  ],
          
          
  'urlCreator' => function ($action, $model, $key, $index) {
    if ($action === 'new_action1') {
        $url = $model->id;
        return $url;
    }
  }
],
        ],
    ]); ?>
    
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
