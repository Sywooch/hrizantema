<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\base\ErrorException;
use yii\base\ExitException;
use app\models\User;

class File Extends ActiveRecord {

    public $profile_pic;
    public $file;

    public function rules() {
       return [
            ['file','file', 'maxSize' => 1024*1024*10, 'tooBig' => 'Ошибка загрузки файла на сервере:<br/>Размер файла не должен превышать 10 МБ! '.Html::a('Подробнее', Url::to(["helpers/view",'id'=>'upload','#'=>'size'],true),['target'=>'_blank'])],
            ];        
    }
    
    public static function tableName() {
        return "User";
    }

    public function save($runValidation = false, $attributeNames = NULL, $state = false) {
        if ($state == false){
            $this->img = $this->getProfilePictureUrl();
        }
        parent::save($runValidation);
        
    }

    public function getProfilePictureFile() {
        if (strpos($this->profile_pic,".")!=false) {
            $ext = explode(".",$this->profile_pic)[1];
        } else
        {
            $ext = "";
        }
        return isset($this->profile_pic) ? Yii::$app->params['uploadPath'] . "/" . $this->id . "_profilepic".".".$ext : null;

    }

    public function getProfilePictureUrl() {
        // return a default image placeholder if your source profile_pic is not found
        if (strpos($this->profile_pic,".")!=false) {
            $ext = explode(".",$this->profile_pic)[1];
        } else
        {
            $ext = "";
        }
        
        $profile_pic = isset($this->profile_pic) ? $this->id . "_profilepic".".".$ext : 'default_user.jpg';
        $profile_pic = "/".Yii::$app->params['uploadUrl'] . '/' . $profile_pic;
        return (string)$profile_pic;
    }

    /**
     * Process upload of profile picture
     *
     * @return mixed the uploaded profile picture instance
     */
    public function uploadProfilePicture() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'profile_pic');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->filename = $image->name;
        $arr = explode(".", $image->name);
        $ext = end($arr);

        // generate a unique file name
        //$this->profile_pic = $this->generateStr($image->name.(string)$image->size."elfxf",1).".{$ext}";//удача
        $this->profile_pic = $image->name;
        // the uploaded profile picture instance
        return $image;
    }
    
    public static function findByAuthKey($authKey)
    {
        return static::findOne(['authKey' => $authKey]);
    }  

}
