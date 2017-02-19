<?php

$params = require(__DIR__ . '/params.php');
$pass = require(__DIR__ . '/pass.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','forum'],
    'modules' => [
        'gallery' => [
            'class' => 'onmotion\gallery\Module',
        ],
        'forum' => [
            'class' => 'bizley\podium\Podium',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            // ... other configurations for the module ...
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
            // also you can use the `afterCreate` event as follows
            'controllerMap' => [
                'default' => [
                    'class' => 'yii2mod\comments\controllers\DefaultController',
                    'on afterCreate' => function ($event) {
                        // get saved comment model
                        $event->getCommentModel();
                        // your custom code
                    },
                     
                ]
            ]
        ],
        'utility' => [
                'class' => 'c006\utility\migration\Module',
            ],
    ],
    'language' => 'ru',                        
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'roots' => [
                [
                    'baseUrl'=>'@web/images',
                    'basePath'=>'@webroot/images',
                    'path' => '',
                    'name' => 'Файлы'
                ]
            ]
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xdrwPO16UnRp79IOxwYXVk_4VA2AI92M',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'ssl://smtp.yandex.ru',
                'username' => 'hrizantema31@yandex.ru',
                'port' => '465',
                //'encryption' => 'SSL'
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'eauth' => require('eauth.php'),
        'i18n' => [
            'translations' => [
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
            ],
        ],
        'assetManager' => [
            //'appendTimestamp' => true,
            'converter' => [
              'class' => 'yii\web\AssetConverter',
              'commands' => [
                 'less' => ['css', 'lessc {from} > {to} --no-color'],

              ],
             ],     
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@app/mybootstrap/dist/css',
 
                    'css' => ['bootstrap.css'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                //'<action>' => 'site/<action>',
                'login/<service:google_oauth|facebook|yandex_oauth|vkontakte|odnoklassniki|mailru>' => 'site/login',
                 '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@app/runtime/logs/eauth.log',
                    'categories' => ['nodge\eauth\*'],
                    'logVars' => [],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@vendor/onmotion/yii2-gallery/views' => '@app/views/gallery', // example: @app/views/gallery/default/index.php
                ],
            ],
        ]
    ],
    'params' => $params,
];

//if (YII_ENV_DEV) {
//    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];
//
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
//}


$config['components']['mailer']['transport'] = $config['components']['mailer']['transport']+$pass;

return $config;
