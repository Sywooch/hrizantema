<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\admin\filters\AccessFilter;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Request;

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
    public function actionRequest()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            $model = Request::find()->where(['status'=>'1'])->orderBy('date Desc');
            $provider = new ActiveDataProvider([
            'query' => $model,

            ]);
            
            $model2 = Request::find()->where(['status'=>'2'])->orderBy('date Desc');
            $provider2 = new ActiveDataProvider([
            'query' => $model2,
            'pagination' => [
                'pageSize' => 20,
            ],
            ]);
            
            $model3 = Request::find()->where(['status'=>'3'])->orderBy('date Desc');
            $provider3 = new ActiveDataProvider([
            'query' => $model3,
            'pagination' => [
                'pageSize' => 20,
            ],
            ]);
            return $this->render('request',['model'=>$provider,'model2'=>$provider2,'model3'=>$provider3]);
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
    
    public function actionAccessrequest()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            if (isset(Yii::$app->request->get()['id'])) {
                $request = Request::findOne(Yii::$app->request->get()['id']);
                $request->status = 2;
                $request->save(false,null,true);
            }  
            return $this->redirect('request');
        }
    }  
    
    public function actionDeclinerequest()
    {
        if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
            if (isset(Yii::$app->request->get()['id'])) {
                $request = Request::findOne(Yii::$app->request->get()['id']);
                $request->status = 3;
                $request->save(false,null,true);
            }  
            return $this->redirect('request');
        }
    }  
}
