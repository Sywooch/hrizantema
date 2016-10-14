<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\validators\UserValidator;
use yii\helpers\Url;

class ConfirmUser extends ActiveRecord
{   
    public static function tableName()
    {
        return "User";
    }

    protected function sendMailToUser($message,$email)
    {
       if (Yii::$app->mailer->compose('MessageToConfirmEmail',['message'=>$message])
        ->setFrom('vorobyev.it@gmail.com')//отправитель
        ->setTo($email)
        ->setSubject('Bel-video успешная активация пользователя')//тема
        ->send()){
        return true;
     } else{
        return false;
     }
    }
    
    public function confirm()
    {
        $keyHash = md5(\Yii::$app->params['key'], true);
        $decrypted=explode("|",mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $keyHash, base64_decode($this->verificationHash),MCRYPT_MODE_ECB));
        if ($decrypted[0]=="prorab-gid") {
            $user=self::find()->where(['name' => rtrim($decrypted[1])])->one();
            if ($user->active==0){
                $diffTime=(time()-strtotime($user->createTime));
                if ($diffTime<=1296000){ 
                    $user->active=1;
                    $user->save();
                    date_default_timezone_set( 'Europe/Moscow' );
                } else {
                    $this->addError('confirm','Код активации проcрочен! Срок действия кода активации 15 дней. Пожалуйста, зарегистрируйтесь еще раз');
                    return false;
                }
                Yii::info($diffTime);
                return $user;
            } else {
                $this->addError('confirm','Пользователь '.$user->name.' уже был активирован ранее!');
                return false; 
            }
        } else {
            $this->addError('confirm','Код активации не прошел проверку');
            return false;
        }
    }
 }


