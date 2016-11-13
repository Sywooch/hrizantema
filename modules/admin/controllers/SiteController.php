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
        return $this->render('quest');
    }
    
    public function actionCourse()
    {
        return $this->render('course');
    }

    public function actionCategories()
    {
        return $this->render('categories');
    }
    
    public function actionTiming()
    {
        return $this->render('timing');
    }  
}
