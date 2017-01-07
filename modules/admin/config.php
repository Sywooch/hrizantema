<?php

$config = [  
    'components' => [
        'errorHandler' => [
                'errorAction' => 'admin/site/error',
                'class' => 'yii\web\ErrorAction',
            ]
    ],
    'controllerMap' => [
        'comments' => 'yii2mod\comments\controllers\ManageController'
    ],
    'id' => 'admin',
    //'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site/index',
    //'layoutPath'=>'@app/modules/admin/views/layouts'
    ];

return $config;
 

