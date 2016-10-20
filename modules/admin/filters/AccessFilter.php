<?php
namespace app\modules\admin\filters;

use Yii;
use yii\base\ActionFilter;

class AccessFilter extends ActionFilter
{

    public function beforeAction($action)
    {
        if ((Yii::$app->user->isGuest === false)&&(Yii::$app->user->identity->admin === 1)) {
            return parent::beforeAction($action);
        } else {
            return Yii::$app->getResponse()->redirect(['site/error']);
        }
    }

    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }
}
