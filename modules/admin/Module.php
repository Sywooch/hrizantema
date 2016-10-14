<?php
namespace app\modules\admin;


class Module extends \yii\base\Module {
    public function init()
    {
        parent::init();
        //$this->params['foo'] = 'bar';
        \Yii::configure($this, require(__DIR__ . '/config.php'));
        // ...  other initialization code ...
    }
}
