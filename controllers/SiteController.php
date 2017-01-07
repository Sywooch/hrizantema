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
use app\models\News;
use yii\data\ActiveDataProvider;
use app\models\File;
use yii\helpers\Json;

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
    
    public function actionGallery2()
    {
        return $this->render('gallery');
    }
    
    public function actionNews()
    {
        if (isset(Yii::$app->request->get()['id'])==true){
            $model = News::findOne(Yii::$app->request->get()['id']);
        } else {
            $model = null;
        }
        if (($model!==null)&&($model->type==1)) {
            $modelOther = News::find()->where(['<>','id',$model->id])->andWhere(['type'=>$model->type])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther2 = News::find()->where(['type'=>2])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther5 = News::find()->where(['type'=>5])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther6 = News::find()->where(['type'=>6])->orderBy('date_news DESC')->limit(3)->all();
            return $this->render('news',['model'=>$model,'modelOther'=>$modelOther,'modelOther2'=>$modelOther2,'modelOther5'=>$modelOther5,'modelOther6'=>$modelOther6]);
        } else {
            $model = News::find()->where(['type'=>1])->orderBy('date_news DESC')->all();
            return $this->render('news_all',['model'=>$model]);
        }
    }
    
    public function actionStocks()
    {
        if (isset(Yii::$app->request->get()['id'])==true){
            $model = News::findOne(Yii::$app->request->get()['id']);
        } else {
            $model = null;
        }
        if (($model!==null)&&($model->type==2)) {
            $modelOther2 = News::find()->where(['<>','id',$model->id])->andWhere(['type'=>$model->type])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther = News::find()->where(['type'=>1])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther5 = News::find()->where(['type'=>5])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther6 = News::find()->where(['type'=>6])->orderBy('date_news DESC')->limit(3)->all();
            return $this->render('stocks',['model'=>$model,'modelOther'=>$modelOther,'modelOther2'=>$modelOther2,'modelOther5'=>$modelOther5,'modelOther6'=>$modelOther6]);
        } else {
            $model = News::find()->where(['type'=>2])->orderBy('date_news DESC')->all();
            return $this->render('stocks_all',['model'=>$model]);
        }
    }
    
    public function actionLatest()
    {
        if (isset(Yii::$app->request->get()['id'])==true){
            $model = News::findOne(Yii::$app->request->get()['id']);
        } else {
            $model = null;
        }
        if (($model!==null)&&($model->type==5)) {
            $modelOther5 = News::find()->where(['<>','id',$model->id])->andWhere(['type'=>$model->type])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther = News::find()->where(['type'=>1])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther2 = News::find()->where(['type'=>2])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther6 = News::find()->where(['type'=>6])->orderBy('date_news DESC')->limit(3)->all();
            return $this->render('latest',['model'=>$model,'modelOther'=>$modelOther,'modelOther2'=>$modelOther2,'modelOther5'=>$modelOther5,'modelOther6'=>$modelOther6]);
        } else {
            $model = News::find()->where(['type'=>5])->orderBy('date_news DESC')->all();
            return $this->render('latest_all',['model'=>$model]);
        }
    }

    public function actionDiscounts()
    {
        if (isset(Yii::$app->request->get()['id'])==true){
            $model = News::findOne(Yii::$app->request->get()['id']);
        } else {
            $model = null;
        }
        if (($model!==null)&&($model->type==6)) {
            $modelOther6 = News::find()->where(['<>','id',$model->id])->andWhere(['type'=>$model->type])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther = News::find()->where(['type'=>1])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther2 = News::find()->where(['type'=>2])->orderBy('date_news DESC')->limit(3)->all();
            $modelOther5 = News::find()->where(['type'=>5])->orderBy('date_news DESC')->limit(3)->all();
            return $this->render('discounts',['model'=>$model,'modelOther'=>$modelOther,'modelOther2'=>$modelOther2,'modelOther5'=>$modelOther5,'modelOther6'=>$modelOther6]);
        } else {
            $model = News::find()->where(['type'=>6])->orderBy('date_news DESC')->all();
            return $this->render('discounts_all',['model'=>$model]);
        }
    }      
    
    public function actionProfile()
    {
        if (Yii::$app->user->isGuest === false) {
            $change = false;
            if (isset(Yii::$app->request->post()['File']['namefull'])){
                $user = File::findOne(Yii::$app->user->identity->id);
                if ($user == null) {
                    $user = File::findByAuthKey(Yii::$app->user->identity->id);
                }
                $user->namefull = Yii::$app->request->post()['File']['namefull'];
                $user->save(false,null,true);
                $change = true;
            }
            return $this->render('profile',['change'=>$change]);
        } else {
            return $this->render('index');
        }
    }
    
    public function actionFileupload()
    {
        if (Yii::$app->user->isGuest === false) {
            $user = File::findOne(Yii::$app->user->identity->id);
            if ($user == null) {
                $user = File::findByAuthKey(Yii::$app->user->identity->id);
            }
            
            $user->file = $user->uploadProfilePicture();
            $dir = $user->getProfilePictureFile();
            if ($user->validate()) { 
                $uploaded = $user->file->saveAs($dir);      
                $isError = $user->save();
                if ($isError != false){
                    echo Json::encode(['error'=>"Файл загружен и сохранен, но при его записи возникли ошибки"]);
                } else {
                    echo Json::encode([]);
                }
            } else {
                echo Json::encode(['error'=>$user->getFirstError('file')]);
            }
        }
    }
}
