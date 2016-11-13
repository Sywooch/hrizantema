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
class Timing extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Timing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_course','allDay','is_dow'], 'required'],
            [['dateStart', 'dateEnd', 'timeStart','timeEnd','dow'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_course' => 'Курс',
            'allDay' => 'Весь день',
            'dateStart' => 'Дата начала',
            'dateEnd' => 'Дата окончания',
            'timeStart' => 'Время начала',
            'timeEnd' => 'Время окончания',
            'dow'=>'Повторять каждый'
        ];
    }
        
    public function save($runValidation = false, $attributeNames = NULL)
    {
        if ($this->is_dow==1){
            $dow = "";
            if (isset($this->dow)){
                foreach ($this->dow as $key=>$value) {
                    $dow = $dow.$value.",";
                }
                $dow = substr($dow, 0, -1);
            }
            $this->dow = $dow;
        } else {
            $this->dow = 0;
        }
        
        
        return parent::save($runValidation);
    }
    
}
