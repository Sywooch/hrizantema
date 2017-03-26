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
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'img', 'description','color','seo_descr','seo_title'], 'string'],
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
            'name' => 'Имя',
            'img' => 'Изображение',
            'description' => 'Описание',
            'seo_title'=>'SEO-заголовок',
            'seo_descr'=>'SEO-описание',
        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        return parent::save($runValidation);
    }
    
}
