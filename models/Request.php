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
        return parent::save($runValidation);
    }
    
}
