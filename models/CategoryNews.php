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
class CategoryNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CategoryNews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование'
        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        return parent::save($runValidation);
    }
    
}
