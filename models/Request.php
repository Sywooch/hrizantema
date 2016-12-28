<?php

namespace app\models;

use Yii;


class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','date','name','phone'], 'required','message'=>'Поле обязательно для заполнения'],
            [['request_date', 'course'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        date_default_timezone_set( 'Europe/Moscow' );//установка часового пояса для кооректности текущей даты
        $this->date=date("Y-m-d H:i:s");
        $this->status = 1;
        $this->sendMailToUser();
        return parent::save($runValidation);
    }
    
    protected function sendMailToUser() {
        $message = "Была сформирована заявка на обучение посетителем сайта. Были указаны следующие данные:<br>Пользователь: ";
        if (Yii::$app->user->isGuest === false) {
            $message = $message.Yii::$app->user->identity->username;
        } else {
            $message = $message."Гость";
        }
        $message = $message."<br>Имя: ";
        if (empty($this->name)) {
            $message=$message."Не указано";    
        } else {
            $message=$message.$this->name;       
        }
        $message = $message."<br>Телефон: ";
         if (empty($this->phone)) {
            $message=$message."Не указан";    
        } else {
            $message=$message.$this->phone;       
        }       
        
        
        $message = $message."<br>Курс: ";
        if (empty($this->course)) {
            $message=$message."Не указан";    
        } else {
            $course = Course::findOne($this->course);
            $message=$message.$course->name;       
        }          
       
        $message = $message." <br>Желаемая дата начала обучения: ";
        if (empty($this->request_date)) {
            $message=$message."Не указана";    
        } else {
            $message=$message.$this->request_date;       
        }        

        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
                        ->setTo('hrizantema31@yandex.ru')
                        ->setSubject('Автоматическое письмо')
			->setHtmlBody($message);
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
                        ->setTo('4399393@gmail.com')
                        ->setSubject('Автоматическое письмо')
			->setHtmlBody($message);                        
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
                        ->setTo('ludmila.31rus@yandex.ru')
                        ->setSubject('Автоматическое письмо')
			->setHtmlBody($message); 
        
      
        Yii::$app->mailer->sendMultiple($messages);
        
        
    }
    
}
