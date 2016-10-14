<?php
$this->title = 'Ошибка';
$this->params['breadcrumbs'][] = ['label' => 'Регистрация', 'url' => ['user/add']];
$this->params['breadcrumbs'][] = $this->title;

foreach ($errors as $error){
    echo $error;
}

