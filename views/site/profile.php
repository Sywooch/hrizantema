<?php

    use kartik\file\FileInput;
    use app\models\User;
    use app\models\File;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Modal;
    use yii\helpers\Url;
    use yii\bootstrap\Alert;

    $this->title = 'Профиль пользователя '.Yii::$app->user->identity->username;
    $this->params['breadcrumbs'][] = $this->title;
    $user = File::findOne(Yii::$app->user->identity->id);
    if ($user == null) {
        $user = File::findByAuthKey(Yii::$app->user->identity->id);
    }

    Modal::begin([
            'header' => "<h2 align='center'>Просмотр изображения</h2>",
            'options'=>['id'=>'modal-img-view'],
            'size'=>'modal-lg',
            'clientOptions'=>[
                'show'=>false,
                'keyboard'=>true
            ],
        ]);
        echo "<div class='' align='center'><img class='img-responsive' id='img_view' ></div>";
    Modal::end(); 
    
    Modal::begin([
            'header' => "<h2 align='center'>Изменение аватара</h2>",
            'options'=>['id'=>'modal-img'],
            'size'=>'modal-lg',
            'clientOptions'=>[
                'show'=>false,
                'keyboard'=>true
            ],
        ]);

//        echo $form->field($user, 'img')->widget(FileInput::classname(), [
//                'options' => ['accept' => 'images/*','multiple'=>false,'id'=>'upload-widget'],
//                'pluginOptions' => [
//                    'showCaption' => false,
//                    'showRemove' => false,
//                    'showUpload' => false,
//                    'browseClass' => 'btn btn-success btn-outline btn-block',
//                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
//                    'browseLabel' =>  'Выбрать изображение на компьютере',
//                    'uploadUrl' => Url::to(['/site/fileupload']),
//                    'allowedFileTypes'=>['image'],
//                ],
//                'pluginEvents' => [
//                    "fileimageloaded" => "function() { $('#button-avatar').css('display','block') }",
//                    "fileclear" => "function() { $('#button-avatar').css('display','none') }",
//                ]
//            ])->label(false);
        echo FileInput::widget([
                'model' => $user,
                'attribute' => 'profile_pic',
                'options' => ['accept' => 'images/*','multiple'=>false,'id'=>'upload-widget'],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-success btn-outline btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Выбрать изображение на компьютере',
                    'uploadUrl' => Url::to(['/site/fileupload']),
                    'allowedFileTypes'=>['image'],
                ],
                'pluginEvents' => [
                    "fileimageloaded" => "function() { $('#button-avatar').css('display','block') }",
                    "fileclear" => "function() { $('#button-avatar').css('display','none') }",
                    "fileuploaded" => "function(event, data, previewId, index) { $(\"#modal-img\").modal(\"hide\"); location.reload()}"
                ]
            ]);
        echo  "<div style='display:none; padding-top:20px;' id='button-avatar' class=\"form-group text-center\">".Html::button('Загрузить новый аватар',['class' => 'btn btn-success','onclick'=>'$(\'#upload-widget\').fileinput(\'upload\');'])."</div>";

        
        
    Modal::end();
    
?>


 <div class="caption_my text-left" style="padding-top:10px;padding-bottom:10px; padding-left:50px;">
    <a class="not-hover" id="request">Профиль</a>
</div> 
    

<label class="control-label col-sm-3 col-lg-3 col-md-3 text-right" style='margin-left:-5px; margin-top:40px; float:left  '>Аватар:</label>

<?php
        if (file_exists(Yii::getAlias('@app')."/web/".$user->img)) {
            $img = $user->img;
        } else {
            $img = Yii::getAlias('@web')."/images/users/no_avatar.gif";
        }

?>

<div style=" max-width:100px; padding:10px; " class='col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-sm-offset-3'><img onclick='$("#img_view").attr("src","<?=Yii::$app->user->identity->avatar?>"); $("#modal-img-view").modal("show")' style='border:1px solid #e2e2e2' class="img-responsive" id="img-avatar" src="<?= Yii::$app->user->identity->avatar ?>"/></div>

<?= Html::button('Сменить аватар',['class' => 'col-lg-offset-3 col-md-offset-3 col-sm-offset-3 btn btn-success btn-outline','style'=>'margin-bottom:0px','onclick'=>'$("#modal-img").modal("show");']);?>
<hr/>
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($user, 'namefull')->textInput()->label('Ваше имя:') ?>


        <?= Html::submitButton('Изменить имя',['class' => 'col-lg-offset-3 col-md-offset-3 col-sm-offset-3 btn btn-primary btn-outline','style'=>'margin-bottom:20px;']) ?>


    <?php ActiveForm::end(); ?>    


<?php
if ($change){
echo Alert::widget(['options' => [
        'class' => 'alert-info',
        'style'=>'margin-top:10px; display:block'
        ],
        'body' => 'Имя успешно изменено!'
        ]);
}
?>
