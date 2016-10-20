<?php

$config = [
    'components' => [
        'errorHandler' => [
                'errorAction' => 'admin/site/error',
                'class' => 'yii\web\ErrorAction',
            ],
    ],
    'id' => 'admin',
    //'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site/quest',
    ];

return $config;
 

