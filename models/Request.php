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
        $message = $message."<br>Имя: ".(empty($this->name))?"Не указано":$this->name;
        $message = $message."<br>Телефон: ".(empty($this->phone))?"Не указан":$this->phone;
        $course = Course::findOne($this->course);
        $message = $message."<br>Курс: ".(empty($this->phone))?"Не указан":$course->name;
        $message = $message."<br>Желаемая дата начала обучения: ".(empty($this->request_date))?"Не указана":$this->request_date;
//        $messages[] = Yii::$app->mailer->compose()
//                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
//                        ->setTo('hrizantema31@yandex.ru')
//                        ->setSubject('Автоматическое письмо')
//			->setHtmlBody($message);
//        $messages[] = Yii::$app->mailer->compose()
//                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
//                        ->setTo('4399393@gmail.com')
//                        ->setSubject('Автоматическое письмо')
//			->setHtmlBody($message);                        
//        $messages[] = Yii::$app->mailer->compose()
//                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
//                        ->setTo('ludmila.31rus@yandex.ru')
//                        ->setSubject('Автоматическое письмо')
//			->setHtmlBody($message); 
        
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
                        ->setTo('vorobyev.it@gmail.com')
                        ->setSubject('Автоматическое письмо')
			->setHtmlBody($message);                        
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>"ЦПХ \"Хризантема\""])//отправитель
                        ->setTo('hrizantema31@yandex@yandex.ru')
                        ->setSubject('Автоматическое письмо')
			->setHtmlBody($message);        
        Yii::$app->mailer->sendMultiple($messages);
        
        
    }
    
}
