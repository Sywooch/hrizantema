<?php

use yii\bootstrap\Collapse;
use yii\bootstrap\Modal;
use app\models\Category;
use app\models\Course;
use app\models\Timing;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\popover\PopoverX;
use yii\web\JsExpression;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\color\ColorInput;

$this->title = 'Заявка на обучение';
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('timing');

Modal::begin([
    'header' => "<span id='myModalHeader' class='h4 text-center' style='display:block'></span>",
    'options'=>[
        'id'=>'myModal'
    ],
    'size'=>''

]);

echo "<span id='myModalBody'></span>";
echo "<div class='text-center'><button type='button' style='margin:auto' id='btn-request' class='btn btn-primary btn-outline' onClick='moveRequest()'>Записаться на этот курс</button></div>";

echo "<div style='display:none;'>";
echo "<span id='hId'></span>";
echo "<span id='hDs'></span>";
echo "</div>";
Modal::end();

$model = new Timing();
$data = $model->find()->all();
echo "<div style='display:none;' id='myHidden'>";
foreach ($data as $item){
    echo "<div class='hiddId".$item->id."'>";
    echo "<span class='hiddName'>".Course::findOne($item->id_course)['name']."</span>";
    if (!empty($item->dateStart)){
        $date = date("d.m.Y",strtotime($item->dateStart));
    } else {
        $date = '';
    }
    echo "<span class='hiddDs'>".$date."</span>";
    echo "<span class='hiddIdCourse'>".$item->id_course."</span>";
    echo "<span class='hiddIdCategory'>".Category::findOne(Course::findOne($item->id_course)['id_cat'])['id']."</span>";
    echo "<span class='hiddCategory'>".Category::findOne(Course::findOne($item->id_course)['id_cat'])['name']."</span>";
    echo "<span class='hiddDescriprion'>".Course::findOne($item->id_course)['description']."</span>";
        $dows = '';
        $weeks = ['1'=>'Понедельник','2'=>'Вторник','3'=>'Среда','4'=>'Четверг','5'=>'Пятница','6'=>'Суббота','0'=>'Воскресенье'];
        if (!$item->dow=='0') {
            $dow = explode(",", $item->dow);
            foreach ($dow as $dowrow){
                $dows = $dows.$weeks[$dowrow].", ";
            }
            $dows = substr($dows, 0, -2);
        }
        
        $dateStart = (!empty($item->dateStart))?" C ".date("d.m.Y",strtotime($item->dateStart)):"";
        $dateEnd = (!empty($item->dateEnd))?" по ".date("d.m.Y",strtotime($item->dateEnd)):"";
        if (!empty($item->timeStart)){
            $timeStart = explode(':',$item->timeStart);
            if (count($timeStart) == 2){
                $timeStart = " <span style=\"color:#777;\">".$timeStart[0]."<sup>".$timeStart[1].'</sup></span>';
            } else {
                $timeStart = "";
            }
        } else {
            $timeStart = "";
        }
        
        if (!empty($item->timeEnd)){
            $timeEnd = explode(':',$item->timeEnd);
            if (count($timeEnd) == 2){
                $timeEnd = " <span style=\"color:#777;\">".$timeEnd[0]."<sup>".$timeEnd[1].'</sup></span>';
            } else {
                $timeEnd = "";
            }
        } else {
            $timeEnd = "";
        }
        
        if ($item->allDay=='0'){
            $hiddper = ($item->dow=='0')?$dateStart.$timeStart."<br/>".$dateEnd.$timeEnd:"По дням:".$dows." ".$dateStart.$timeStart.$dateEnd.$timeEnd;
            echo "<span class='hiddPeriod'>".$hiddper."</span>";
        } else {
            $hiddper = ($item->dow=='0')?$dateStart."</br>".$dateEnd.". Весь день</span>":"По дням недели: ".$dows.". Весь день</span>";
            echo "<span class='hiddPeriod'>".$hiddper;
        }
    echo "</div>";
}
echo "</div>";

  $events = array();
  foreach ($data as $item){
    $course = Course::findOne($item->id_course);  


      //$('#popa".$course->id."').click();
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = $item->id;
    $Event->title = "<span id='idTitle".$item->id."'>".$course['name']."</span>";
    if ($item->allDay=='0') {
        if (empty($item->dow)){
            $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($item->dateStart." ".$item->timeStart));
            $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($item->dateEnd." ".$item->timeEnd));  
        } else {
            $Event->start = $item->timeStart;
            $Event->end = $item->timeEnd;
        }
    } else {
        if (empty($item->dow)){
            $Event->allDay = true;
            $Event->start = $item->dateStart;
            $Event->end = date('Y-m-d',strtotime($item->dateEnd)+86400);
        }      
    }
    if (!empty($item->dow)){
        $Event->dow = explode(",", $item->dow);
    }
    $Event->color = Category::findOne($course['id_cat'])['color'];
    $Event->className = 'myEvent';
    //$Event->url = Url::to(['update','id'=>$item->id]);
    $Event->ranges = [[strtotime('2016-11-15'),strtotime('2016-11-19')]];
    $events[] = $Event;
  }
  ?>

<div class="col-lg-10 col-lg-offset-1" style="padding-top:20px;">
  <?= \yii2fullcalendar\yii2fullcalendar::widget([
        'options' => [
        'lang' => 'ru',
         'id'=>'calendar-my'

        //... more options to be defined here!
      ],

    'header'=> [
            'left' => 'prev,next today myCustomButton',
            'center' => 'title',
            'right'=>'month,agendaWeek,agendaDay,list'
    ],
      'theme'=>true,
      'events'=> $events,
      'clientOptions'=>[
          'eventClick'=> new JsExpression('function(event, element) {fillModal(event.id)}'),
          'timeFormat'=> 'H:mm',
          //'dayRender'=> new JsExpression('disableCell'),
          ],
      
      
  ]);
  ?>
</div>

<?php

$this->endBlock();

$this->beginBlock('timing_course');



$this->endBlock();




echo Collapse::widget([
    'clientOptions'=>[    
        'toggle'=>true,
    ],
        'items' => [
        // equivalent to the above
        [
            'label' => '<span style="font-size:10pt" class="servicedrop glyphicon glyphicon-chevron-down"></span> <h4 style="display:inline">Выбрать курс для записи</h4> <span style="font-size:10pt" class="servicedrop glyphicon glyphicon-chevron-down"></span>',
            'content' => $this->blocks['timing'],
            // open its content by default
            'contentOptions' => ['class' => 'out'],
            'options'=>['class' => 'panel panel-info'],
            'encode'=>false
        ],      
    ],
    'options'=>['id'=>'serviceList','class'=>'']
]);
?>
<div class="col-lg-10">
    <div class="caption_my text-left" style="padding-top:10px;padding-bottom:40px; padding-left:50px;">
    <a class="not-hover" id="request">Заявка на обучение</a>
</div> 
    
    
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); 
       
        $cat = Category::find()->all();
        $arr = [];
        $arr[0]='Ничего не выбрано...';
        foreach ($cat as $category) {
            $arrCourse = Course::find()->where(['id_cat'=>$category->id])->all();
            $arrCourse = ArrayHelper::map($arrCourse, 'id', 'name');
            $arr[$category->name]=$arrCourse;
        }
    
    ?>
    
    <?= $form->field($modelRequest, 'name')->textInput()->label('Ваше имя') ?>
    <?= $form->field($modelRequest, 'phone')->textInput()->label('Номер телефона') ?>

    <?= $form->field($modelRequest, 'course')->dropDownList($arr)->label('Курс') ?>
            <?= $form->field($modelRequest, 'request_date')->widget(DatePicker::className(),[
                'pluginOptions'=>['format'=>'dd.mm.yyyy '],
                'language'=>'ru',
        ])->label('Желаемая дата начала обучения');  ?>
    

    
    
    <div class="form-group text-center">
        <?= Html::submitButton('Отправить',['class' => 'btn btn-primary btn-outline']) ?>
    </div>

    <?php ActiveForm::end(); ?>    
    
    
    
</div>
