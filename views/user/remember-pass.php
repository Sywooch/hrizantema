<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Забыли пароль?';
 
$this->params['breadcrumbs'][] = ['label' => 'Вход на сайт', 'url' => ['site/login']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <h2> <?=$this->title?></h2>
<p><strong>Воспользуйтесь следующими инструментами в зависимости от проблемы:</strong></p>
<ul>
    <li>Вам не удается пройти проверку логина/пароля</li>
    <?= Html::a('Сменить пароль', ['user/changepass-form'], ['class' => 'btn btn-primary'])?><br/><br/>
    <li>После регистрации Вам на E-mail не пришло письмо об активации</li>
    <?= Html::a('Выслать повторный код активации на E-mail', ['user/confirm-form'], ['class' => 'btn btn-info'])?>
</ul>
        

<?php 
