<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$pass = require(__DIR__ . '/pass.php');

$config = [
    'id' => 'basic-console',
    'bootstrap' => ['log', 'podium'],
    'modules' => [
        'podium' => 'bizley\podium\Podium',
    ],
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\commands',
    'components' => [
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
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
$config['components']['mailer']['transport'] = $config['components']['mailer']['transport']+$pass;
return $config;
