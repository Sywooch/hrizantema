<?php

/* @var $this yii\web\View */

?>
<div class="gallery-update">

    <?php
    
    if (!Yii::$app->user->isGuest&&Yii::$app->user->identity->admin == '1'){
        echo $this->render('_form', [
            'model' => $model,
        ]);
    }    
                
                ?>

</div>
