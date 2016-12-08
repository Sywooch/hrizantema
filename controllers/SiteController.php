<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Request;
use app\models\Category;
use app\models\Course;
use app\models\Timing;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'eauth' => array(
                    // required to disable csrf validation on OpenID requests
                    'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                    'only' => array('login'),
                ),
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
    public function actionIndex()
    {
        if (!isset(Yii::$app->request->post()['request'])){
            return $this->render('index');
        } else {
            return $this->redirect(['request']);
        }
    }
    
    public function actionRequest()
    {
        $model = new Request();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('redirect');
        }
        if (isset(Yii::$app->request->get()['course'])) {
            $id_course = Yii::$app->request->get()['course'];
            $modelCourse = Course::findOne($id_course);
        } else {
            $modelCourse = false;
        }
        if (isset(Yii::$app->request->get()['calendar'])) {
            $id_calendar = Yii::$app->request->get()['calendar'];
            $modelCalendar = Timing::findOne($id_calendar);
        } else {
            $modelCalendar = false;
        }
        return $this->render('request',['modelRequest'=>$model,'modelCourse'=>$modelCourse,'modelCalendar'=>$modelCalendar]);
        
    }
    
    public function actionCourses()
    {
        if (isset(Yii::$app->request->get()['id'])) {
            $id_cat = Yii::$app->request->get()['id'];
            $modelCat = Category::findOne($id_cat);
        } else {
            $id_cat = false;
            $modelCat = false;
        }
        
        if (isset(Yii::$app->request->get()['course'])) {
            $id_course = Yii::$app->request->get()['course'];
            $modelCourse = Course::findOne($id_course);
        } else {
            $id_course = false;
            $modelCourse = false;
        }  
        
        if ($id_cat!==false) {
            $modelCourses = Course::find()->where(['id_cat'=>$id_cat]);
            
            
            $provider = new ActiveDataProvider([
            'query' => $modelCourses,
            'pagination' => [
                'pageSize' => 20,
            ],
            ]);
        } else {
            $modelCourses = false;
            $provider = false;
        }


        return $this->render('courses',['modelCat'=>$modelCat,'modelCourses'=>$modelCourses,'provider'=>$provider,'modelCourse'=>$modelCourse]);
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::info('Пользователь '.$model->name.' вошел',__METHOD__);
            return $this->goBack();
        }

        
        
        $serviceName = Yii::$app->getRequest()->getQueryParam('service');
        if (isset($serviceName)) {
            /** @var $eauth \nodge\eauth\ServiceBase */
            $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);
            $eauth->setRedirectUrl(Yii::$app->getUser()->getReturnUrl());
            $eauth->setCancelUrl(Yii::$app->getUrlManager()->createAbsoluteUrl('site/login'));
 
            try {
                if ($eauth->authenticate()) {
//                  var_dump($eauth->getIsAuthenticated(), $eauth->getAttributes()); exit;
 
                    $identity = User::findByEAuth($eauth);
                    if (!User::findByAuthKey($identity->id)) {
                        $identity->save(false,null,true);
                    }
                    Yii::$app->getUser()->login($identity);
 
                    // special redirect with closing popup window
                    $eauth->redirect();
                }
                else {
                    // close popup window and redirect to cancelUrl
                    $eauth->cancel();
                }
            }
            catch (\nodge\eauth\ErrorException $e) {
                // save error to show it later
                Yii::$app->getSession()->setFlash('error', 'EAuthException: '.$e->getMessage());
 
                // close popup window and redirect to cancelUrl
//              $eauth->cancel();
                $eauth->redirect($eauth->getCancelUrl());
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
