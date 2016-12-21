<?php
$this->title = 'Подтверждение учетной записи';

$this->params['breadcrumbs'][] = ['label' => 'Регистрация', 'url' => ['user/add']];
$this->params['breadcrumbs'][] = $this->title;
echo 'Учетная запись пользователя '.$model->username.' успешно активирована!' ;

