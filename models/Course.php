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
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','id_cat'], 'required'],
            [['name', 'img', 'description','duration','price','id_cat','seo_title','seo_descr','duration_text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'img' => 'Изображение',
            'description' => 'Описание',
            'id_cat'=>'Категория',
            'duration'=>'Длительность, ч',
            'duration_descr' => 'Длительность текст',
            'price'=>'Цена, р',
            'seo_title'=>'SEO-заголовок',
            'seo_descr'=>'SEO-описание',
        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        return parent::save($runValidation);
    }
    
}
