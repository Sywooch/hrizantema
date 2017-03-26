<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeoPages */

$this->title = 'Изменение SEO-описания: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'SEO-описание основных страниц', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="seo-pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
