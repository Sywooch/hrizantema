<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "News".
 *
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $short_text
 * @property string $text
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'News';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'date_news','visible','user_id'], 'required'],
            [['title', 'img', 'short_text', 'text', 'seo_descr','seo_title'], 'string'],
            [['date','date_news','type'], 'safe'],
            [['seo_title'],'string','max'=>75],
            [['seo_descr'],'string','max'=>200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'img' => 'Изображение',
            'short_text' => 'Сокращенный текст',
            'text' => 'Текст',
            'date' => 'Дата',
            'date_news' => 'Дата новости',
            'seo_title'=>'SEO-заголовок',
            'seo_descr'=>'SEO-описание'
        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        date_default_timezone_set('Europe/Moscow' );//установка часового пояса для корректности текущей даты
        $this->date=date("Y-m-d H:i:s");
        if (empty($this->short_text)) {
            $this->short_text = $this->text;
        }
        $this->user_id = \Yii::$app->user->identity->id;
        return parent::save($runValidation);
    }
    
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getCategoryNews() {
        return $this->hasOne(CategoryNews::className(), ['id' => 'type']);
    }
}
