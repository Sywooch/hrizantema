<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    
//    NavBar::begin([
//        'brandOptions' => ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-2'],
//        'brandLabel' => '<img alt="Brand" src="'.Yii::$app->request->baseUrl."/images/hriz2.png\" class='img-responsive'/>",
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar',
//        ],
//    ]);
//echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-left'],
//        'items' => [
//            [
//                'label' => 'ХРИЗАНТЕМА',
//                'encode' => false,
//                'url' => false,
//                'options' => []
//                
//            ],
//            
//        ],
//    ]);
//    NavBar::end();
?> 
       <div class="container">   
        <div class='row' id='header'>
            <div class='col-lg-1 col-md-1'>
            </div>
            
            <div class='col-lg-2 col-md-2 col-sm-2 col-xs-3 text-center' style='max-width:120px; min-width:60px; padding-top:10px; padding-bottom:10px'>
                <?= Html::a('<img alt="Brand" src="'.Yii::$app->request->baseUrl.'/images/hriz3.png" class="img-responsive"/>',Url::toRoute(['/site/index']))?>
            </div>
            <div class='col-lg-5  col-md-6 col-sm-6 col-xs-9 vcenter' ><!--
            --><h3 class="hidden-xs" style='font-family:Verdana sans-serif;'>ХРИЗАНТЕМА<br/><small>Первый Центр повышения квалификации и профессиональной подготовки
Белгородской области</small></h3><!--
            --><h4 class="visible-xs" style='font-family:Verdana sans-serif; '>ХРИЗАНТЕМА<br/><small>Первый Центр повышения квалификации и профессиональной подготовки
Белгородской области</small></h4><!--
        --></div><!--
        --><div class='hidden-xs col-lg-3  col-md-3 col-sm-4 col-xs-12 vcenter' style='font-family:verdana;font-size:14pt;'><!--
            --><div class='vcenter'><span style='font-size:18pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> +7 (4722) 72-00-75<br/><!--
            --><div class='vcenter'><span style='font-size:16pt' class="glyphicon glyphicon-time text-info"></span></div><span style="font-size:12pt"> Понедельник - суббота &nbsp;10<sup>00</sup>&nbsp;-&nbsp;16<sup>00</sup></span><!--
        --></div><!--
        --><div class='visible-xs col-lg-3  col-md-3 col-sm-4 col-xs-12 vcenter text-center' style='font-family:verdana;font-size:12pt;'><!--
            --><div class='vcenter'><span style='font-size:14pt' class="glyphicon glyphicon-phone-alt text-info"></span></div> +7 (4722) 72-00-75<br/><!--
            --><div class='vcenter'><span style='font-size:14pt' class="glyphicon glyphicon-time text-info"></span></div> Понедельник - суббота &nbsp;10<sup>00</sup>&nbsp;-&nbsp;16<sup>00</sup><!--
        --></div>
       </div>
           </div>
    
    
<div class='nav-wrapper'>
    <?php    

    NavBar::begin([
        'brandOptions' => ['style'=>'','class'=>'visible-xs'],
        'brandLabel' => '<form class="" style="margin-top:-7px;">
    <img id="myLabel2" style="float:left;margin-top:-5px;margin-left:-5px;padding-right:5px;" src=\''.Yii::$app->request->baseUrl.'/images/hriz4.png\' class=\'img-responsive\' /><button onclick=\'window.location.href=window.location.protocol+"//"+window.location.hostname+"/site/courses"; return false;\' class="btn btn-primary btn-outline" type="submit">Курсы и расписание</button>
  </form>',

        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default ','id'=>'myAffix'
        ],

    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav col-lg-1 col-md-1 hidden-sm hidden-xs'],
                'items' => [
            ['label' => '']]
        
    ]);
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav hidden-xs'],
                'items' => [
                    ['label'=>'<img  src=\''.Yii::$app->request->baseUrl.'/images/hriz4.png\' class=\'img-responsive\' />',
                'url' => ['/site/index'],
                'encode'=>false,
                'options'=>[
                    'class'=>'menu-not-padding',
                    'style'=>'display:none;float:right',
                    'id'=>'myLabel'
                ]
            ],
                    
                ]
        
    ]);
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav','style'=>''],
        'items' => [
            ['label'=>"<span style='font-size:20pt; color:#428bca;' class='glyphicon glyphicon-education'></span>",
                //'url'=>['courses'],
                'encode'=>false,
                'options'=>[
                    'class'=>' my-form-edu'
                ],
                'items'=>[['label' => 'Сведения об образовательной организации', 'items'=>[
                    ['label' => 'Основные сведения', 'url' => 'http://hrizantema31.ru/about'],
                    ['label' => 'Структура и органы управления учреждения', 'url' => 'http://hrizantema31.ru/about/struktura-i-organi-upravleniya-uchrezhdeniya'],
                    ['label' => 'Документы', 'url' => 'http://hrizantema31.ru/about/dokumenti'],
                    ['label' => 'Образование', 'url' => 'http://hrizantema31.ru/about/obrazovanie'],
                    ['label' => 'Руководство. Сведения о педагогическом составе', 'url' => 'http://hrizantema31.ru/about/rukovodstvo-svedeniya-o-pedagogicheskom-sostave'],
                    ['label' => 'Материально-техническое обеспечение и оснащенность', 'url' => 'http://hrizantema31.ru/about/materialno-tekhnicheskoe-obespechenie-i-osnashchennost'],
                    ['label' => 'Платные образовательные услуги', 'url' => 'http://hrizantema31.ru/about/platnie-obrazovatelnie-uslugi'],
                    ['label' => 'Информация для поступающих', 'url' => 'http://hrizantema31.ru/about/informatsiya-dlya-postupayushchikh'],
                    ['label' => 'Официальные реквизиты', 'url' => 'http://hrizantema31.ru/about/ofitsialnie-rekviziti'],
                    ['label' => 'Профессиональные стандарты', 'url' => 'http://hrizantema31.ru/about/professionalnie-standarti'],
                    ['label' => 'Анонсы', 'url' => 'http://hrizantema31.ru/about/news'],
                    ]
                    ],
            ]],
            ['label' => 'Контакты', 'url' => ['/site/contact']], 
            ['label' => 'О нас', 'items'=>[
                    ['label' => 'Об организации', 'url' => ['/site/about']],
                    ['label' => 'Новости', 'url' => ['/site/news']], 
                    ['label' => 'Акции', 'url' => ['/site/stocks']],
                    ['label' => 'Новинки', 'url' => ['/site/latest']],
                    ['label' => 'Скидки', 'url' => ['/site/discounts']],
                ]
            ],
            ['label' => 'Фотогалерея', 'url' => ['/gallery']],
            ['label' => 'Форум', 'url' => ['/forum/']],
            ['label'=>''
                .Html::button(
                    'Курсы и расписание',
                    ['class' => 'btn btn-primary btn-outline','name'=>'request']
                ),
                'url'=>['/site/courses'],
                'encode'=>false,
                'options'=>[
                    'class'=>'hidden-xs my-form'
                ]
            ],


            
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right col-lg-1 col-md-1 hidden-sm hidden-xs'],
                'items' => [
            ['label' => '']]
        
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                Yii::$app->user->isGuest ? (
                    ['label' => 'Вход на сайт', 'url' => ['/site/login']]          
                    ) : ([
                        'label'=>Yii::$app->user->identity->username, 'items'=>[
                            (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1')?['label' => 'Админка', 'url' => ['/admin/site/index']]:"",
                            ['label' => 'Мой профиль', 'url' => ['/site/profile']],
                            ['label' => ''
                                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form1'])
                                . Html::submitButton(
                                    'Выйти (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link','style'=>'padding-left:6px; color:#333']
                                )
                                . Html::endForm()
                                . '','encode'=>false],
                        ]
                    ]),
                    
                ]
        
    ]);

    
    NavBar::end();
       
    ?>
</div>


    <div class='col-lg-offset-1 col-md-offset-1 col-lg-10  col-md-10 col-sm-12 col-xs-12' style="padding-bottom:20px; ">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink'=>['label'=>'Главная','url'=>Url::to(['/site/index'])]
        ]) ?>
      
        <?= $content ?>
        </div>
</div>
<footer class="footer col-sm-12 col-xs-12">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10  col-md-10">
        <div class="col-lg-4 col-md-4 col-sm-6">
        <p>&copy; ЦПК "Хризантема" <?= date('Y') ?></p>
        <p><?= Html::a("<span class=\"glyphicon glyphicon-map-marker\"></span> <i>г. Белгород, ул. Горького, д.&nbsp;76</i>",['site/contact','#'=>'address']) ?></p>
        <p><b>График работы:</b><br/><i>Понедельник - суббота <br/>с 10<sup> 00</sup> до 16<sup> 00</sup> 123</i></p>
        <p><b>Телефоны:</b> <br/><i><span class="glyphicon glyphicon-phone-alt"></span> +7 (4722) 72-00-75<br/>
        <span class="glyphicon glyphicon-phone"></span> +7-909-202-08-24</i></p>
        <p><b>E-mail:</b> <br/><i><span class="glyphicon glyphicon-envelope"></span> trav.oks@yandex.ru</i></p>
        </div>
     
        <div class="col-lg-4 col-md-4 col-sm-6 text-left">
            <p><?= Html::a('Новости',['site/news']) ?>&nbsp; | &nbsp;<?= Html::a('Акции',['/site/stocks']) ?>&nbsp; | &nbsp;<?= Html::a('Новинки',['site/latest']) ?>&nbsp; | &nbsp;<?= Html::a('Скидки',['site/discounts']) ?></p>
            <hr style="margin-top:0px; margin-bottom:10px;"/>
            <p><?= Html::a('Сведения об образовательной организации','http://hrizantema31.ru/about') ?></p>
            <p><?= Html::a('Курсы и расписание',['/site/courses']) ?></p>
            <p><?= Html::a('Подать заявку на обучение',['site/request']) ?></p>
            <hr style="margin-top:0px; margin-bottom:10px;"/>
            <p><?= Html::a('Фотогалерея',['/gallery']) ?></p>
            <p><?= Html::a('Форум',['/forum/home']) ?></p>
            <p><?= Html::a('Обратная связь',['/site/contact']) ?></p>

        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-12 text-left col-lg-offset-1">
            <?php
                if (Yii::$app->user->isGuest) {
                    echo Html::a('Вход на сайт',['/site/login'])."&nbsp; | &nbsp;".Html::a('Регистрация',['user/add']);
                } else {
                    echo "<img src='".Yii::$app->user->identity->avatar."' style='min-width:40px; min-height:40px;max-width:60px; max-height:60px; float:left; margin-right:10px; border: 1px solid #e2e2e2'>";
                    echo Html::a('Профиль',['/site/profile'])."<br/>";
                    echo Html::beginForm(['site/logout'], 'post', ['class' => 'navbar-form1'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link','style'=>'padding-left:6px; ']
                    )
                    . Html::endForm();
                }
            
            
            ?>
        </div> 
        
    </div>
</footer>
    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
