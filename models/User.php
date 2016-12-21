<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\validators\UserValidator;
use yii\helpers\Url;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{


    public $profile;
    
    public $captcha;
    public $password_repeat;
    
    public static function tableName()
    {
        return "User";
    }
    
    public function rules() 
    {
        return [
            [['username', 'password', 'email', 'password_repeat','captcha'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['email', 'email', 'message' => 'Неправильно введен e-mail'],
            ['username', 'string', 'min' => '6', 'max' => '32', 'tooShort' => 'Логин должен содержать не менее 6 символов', 'tooLong' => 'Логин должен содержать не более 32 символов'],
            ['username', UserValidator::className()], //внешний валидатор имени пользователя через RegExp на допустимые символы и т.д. (как серверная так и клиентская)
            [['password','password_repeat'], 'string', 'min' => '5', 'max' => '32', 'tooShort' => 'Пароль должен содержать не менее 5 символов', 'tooLong' => 'Пароль должен содержать не более 32 символов'],
            ['username','unique','message' => 'Пользователь с таким именем уже существует'],
            ['email','unique','message' => 'Пользователь с таким email уже существует'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли должны быть равны'],
            ['captcha','captcha','message'=>'Код с картинки введен неправильно'],
            ['namefull','safe']
            ];
    }

    protected function sendMailToUser($message, $email) {
        if (Yii::$app->mailer->compose('MessageToConfirmEmail', ['message' => $message])
                        ->setFrom('vorobyev.it@gmail.com')//отправитель
                        ->setTo($email)
                        ->setSubject('Bel-video')//тема
                        ->send()) {
            return true;
        } else {
            return false;
        }
    }

    protected function createMessage($verificationHash)
    {
        date_default_timezone_set( 'Europe/Moscow' );//это для того, чтобы время вычислилось по нашему часовому поясу, а не по гринвичу
        $message='Для активации Вашей учетной записи перейдите по ссылке <br/>'.Url::base(true).'/user/confirm?verificationHash='.$verificationHash.'<br/>Дата и время отправки сообщения: '.date("Y-m-d H:i:s").'. Код активации действителен в течение 15 дней с получения сообщения';
        return $message; 
    }
    
    //метод модели отправляет повторное сообщение об активации аккаунта. Используется в контроллере UserController в методе actionConfirmForm после проверки существования e-mail
    //и статуса пользователя (он должен быть неактивен). Иначе выдается сообщение об ошибке (соответствующее). Возвращает false если сообщение не отправлено.
    public function resendMailConfirm()
    {
        $message = $this->createMessage($this->verificationHash);
        return $this->sendMailToUser($message,$this->email);
    }
    

    
    /*
    метод сохранения пользователя в базе. Используется в контроллере UserController методом actionAdd только после 
     валидации полей и загрузки этих полей в модель.
     */
    
    public function save($runValidation = false, $attributeNames = NULL, $social = false)
    {
        if (!$social) {
            $keyHash = md5(Yii::$app->params['key'], true);//ключ можно найти в параметрах пользователя params.php
            $part_str = "prorab-gid|";
            $this->verificationHash = urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $keyHash, $part_str.$this->username, MCRYPT_MODE_ECB)));
            $message = $this->createMessage($this->verificationHash);
            if ($this->sendMailToUser($message,$this->email)){
                date_default_timezone_set( 'Europe/Moscow' );//установка часового пояса для кооректности текущей даты
                $this->namefull = $this->username;
                $this->createTime=date("Y-m-d H:i:s");
                $this->active=0;//пока что неактивированный
                $this->accessToken=NULL;//ну примерно уникальный
                $this->authKey=NULL;//тоже примерно уникальный
                $this->password=md5($this->password, false);
                $this->admin=0;
                return parent::save($runValidation);//родительский метод save
            } else {
                $this->addError('mail','Произошла ошибка отправки кода подтверждения на Ваш e-mail. Пожалуйста, попробуйте зарегистрироваться позднее.');
                return false;
            }
        } else {
            date_default_timezone_set( 'Europe/Moscow' );//установка часового пояса для кооректности текущей даты
            $this->namefull = $this->username;
            $this->createTime=date("Y-m-d H:i:s");
            $this->active=1;//пока что неактивированный
            $this->authKey=$this->id;//тоже примерно уникальный
            return parent::save($runValidation);//родительский метод save
        }
    }
    
    public static function findIdentity($id)
    {
        if (Yii::$app->getSession()->has('user-'.$id)) {
            return new self(Yii::$app->getSession()->get('user-'.$id));
        }
        else {
            return static::findOne($id);
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);  
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    
    public static function findByAuthKey($authKey)
    {
        return static::findOne(['authKey' => $authKey]);
    }    
    
    public static function findByEAuth($service) {
        if (!$service->getIsAuthenticated()) {
            throw new ErrorException('EAuth user should be authenticated before creating identity.');
        }
 
        $id = $service->getServiceName().'-'.$service->getId();
        $attributes = array(
            'id' => $id,
            'username' => $service->getAttribute('name'),
            'authKey' => md5($id),
            'profile' => $service->getAttributes(),
        );
        $attributes['profile']['service'] = $service->getServiceName();
        Yii::$app->getSession()->set('user-'.$id, $attributes);
        return new self($attributes);
    }
    
    public static function findByEmail($email)
    {
        return $user = static::findOne(['email' => $email]);
    }
    
    
    
     protected function createMessageChangePass($hash)
    {
        date_default_timezone_set( 'Europe/Moscow' );//см. выше
        $message='Для смены пароля Вашей учетной записи перейдите по ссылке: <br/>'.Url::base(true).'user/change-pass?hash='.$hash.'&userId='.$this->id.' <br/>Дата и время отправки сообщения: '.date("Y-m-d H:i:s").'.<br/> Если Вы знаете свой пароль и не запрашивали о его смене, ничего не предпринимайте.';
        return $message; 
    }
    
/*
Отправляет сообщение со ссылкой на смену пароля. Ссылка содержит 2 параметра: hash - зашифрованный пароль, и userId - идентификатор пользователя. Вызвается 
 в контроллере UserController в методе actionChangepassForm после проверки на существование e-mail и отсутствие ошибок.
*/
    public function resendMailChangePass()
    {
        $keyHash = md5(Yii::$app->params['key'], true);
        $part_str = "prorab-gid|";
        $message = $this->createMessageChangePass(urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $keyHash, $part_str.$this->password, MCRYPT_MODE_ECB))));
        return $this->sendMailToUser($message,$this->email);
    }
    
    public function getUsername() {
        return $this->namefull;
    }
    
    public function getAvatar() {
        if (file_exists(Yii::getAlias('@app')."/web/".$this->img)&&($this->img!=="")) {
            return $this->img;
        } else {
            return Yii::getAlias('@web')."/images/users/no_avatar.gif";
        }
    }
}
