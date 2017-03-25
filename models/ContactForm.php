<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required','message'=>'Поле должно быть заполнено'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Неправильно введен e-mail'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha','message'=>'Код с картинки введен неправильно'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Введите символы с картинки',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->name])
//                ->setSubject($this->subject)
//                ->setTextBody($this->body)
//                ->send();

        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>$this->email." ".$this->name])//отправитель
                        ->setTo('hrizantema31@yandex.ru')
                        ->setSubject($this->subject)
			->setTextBody($this->body);
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>$this->email." ".$this->name])//отправитель
                        ->setTo('4399393@gmail.com')
                        ->setSubject($this->subject)
			->setTextBody($this->body);                        
        $messages[] = Yii::$app->mailer->compose()
                        ->setFrom(["hrizantema31@yandex.ru"=>$this->email." ".$this->name])//отправитель
                        ->setTo('ludmila.31rus@yandex.ru')
                        ->setSubject($this->subject)
			->setTextBody($this->body); 
        
      
        Yii::$app->mailer->sendMultiple($messages);
            
            
            return true;
        }
        return false;
    }
}
