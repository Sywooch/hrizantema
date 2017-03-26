<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_pages".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_title
 * @property string $seo_descr
 * @property string $comment
 */
class SeoPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'seo_title', 'seo_descr', 'comment'], 'string'],
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
            'name' => 'Страница',
            'seo_title' => 'SEO-заголовок',
            'seo_descr' => 'SEO-описание',
            'comment' => 'Комментарий',
        ];
    }
}
