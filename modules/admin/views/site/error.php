<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Указанная ошибка возникла при обработке сервером Вашего запроса.
    </p>
    <p>
        Пожалуйста, свяжитесь с администратором системы, если Вы думаете, что ошибка по его вине)))
    </p>

</div>
