<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\admin\filters\AccessFilter;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    public $layout = 'main';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessFilter::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionQuest()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            return $this->render('quest');
        }
    }
    
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            return $this->render('index');
        }
    }
    
    public function actionCourse()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            return $this->render('course');
        }
    }

    public function actionCategories()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            return $this->render('categories');
        }
    }
    
    public function actionTiming()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            return $this->render('timing');
        }
    }  
}
