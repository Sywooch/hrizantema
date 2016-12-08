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
use yii\widgets\Pjax;
use kartik\grid\GridView;


$this->title = 'Курсы и расписание';
$this->params['breadcrumbs'][] = $this->title;
?>




<div style='display:flex; justify-content: center' class='hidden-sm hidden-xs'>
<?php

$categories = Category::find()->all();
$items = [];

foreach ($categories as $category) {
if ($modelCat!==false){
    $classMy = ($modelCat->id==$category->id)?"block-cat-select":"block-cat";
    echo "<div onClick=\"window.location.href='".Url::to(['site/courses','id'=>$category->id])."'\" align=center class='".$classMy." col-lg-2 col-md-2'><img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name."</div>"; 
} else {   
    echo "<div align=center class='block-cat col-lg-2 col-md-2'>".Html::a("<img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name,['courses','id'=>$category->id],['class'=>'not-hover','style'=>'color:inherit'])."</div>";
}
//echo "<div align=center  class='block-cat'><img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name."</div>";
}

?>
</div>

<div class='hidden-lg hidden-md'>
<?php

$categories = Category::find()->all();
$items = [];
$counter=0;
foreach ($categories as $category) {
    $counter = $counter+1;
    if ($counter%2 == 1) {
        echo "<div style='display:flex; justify-content: center'>";
    }
    if ($modelCat!==false){
        $classMy = ($modelCat->id==$category->id)?"block-cat-select":"block-cat";
        echo "<div align=center class='".$classMy." col-sm-4 col-xs-5'>".Html::a("<img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name,['courses','id'=>$category->id],['class'=>'not-hover','style'=>'color:inherit'])."</div>"; 
    } else {
        echo "<div align=center  class='col-sm-4 col-xs-5 block-cat'>".Html::a("<img class='img-responsive img-cat' src='".$category->img."'></img><br/>".$category->name,['courses','id'=>$category->id],['class'=>'not-hover','style'=>'color:inherit'])."</div>";
    }

    if ($counter%2 == 0 ) {
        echo "</div>";
    }
    if ($counter%2 == 0) {
        echo "<div class='col-sm-12 col-xs-12'> </div><br/>";
    }
    if ($counter == count($categories)){
       echo "</div>"; 
    }
}

?>
</div>

<?php Pjax::begin(); ?>
<?php
if ($modelCat!==false) {
    if ($modelCourse==false) {
        $modelCourseId = false;
        $this->registerJs("$('html, body').animate({ scrollTop: $('#category').offset().top-55 }, 1300); ");    
    } else {
        $modelCourseId = $modelCourse->id;
        $this->registerJs("$('html, body').animate({ scrollTop: $('#course').offset().top-55 }, 1300); ");        
    }
    echo '<hr/><div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-1" style="padding-top:10px;padding-bottom:10px;">'
            .'<a class="not-hover" id="category">'.$modelCat->name.'</a>'
        .'</div>'; 
    echo "<div style='color:#777;font-size:9pt; padding-bottom:30px;' class='col-lg-offset-1 col-md-offset-1 col-sm-offset-1'><i>Нажмите на курс для вывода описания...</i></div>";
    if ($provider !== false){
    echo GridView::widget([
        'dataProvider' => $provider,
        'bordered'=>false,
        'striped'=>false,
        'condensed'=>false,
        'responsive'=>false,
        'hover'=>true,
        'layout'=>'{pager}{errors}{items}',
        'emptyText'=>"Категории не найдены...",
//        'panel'=>[
//            'type'=>GridView::TYPE_PRIMARY,
//            'heading'=>'Список',
//        ],
        'export'=>false,
        'options'=>[
            'class'=>'col-lg-11 col-md-11',
            'style'=>'float:none; margin:auto; '
        ],
        'tableOptions'=>[
            'class'=>'table table-borderless',
            'style'=>'border:none'
        ],
        'rowOptions'=>function ($model, $key, $index, $grid) {
            if (isset(Yii::$app->request->get()['course'])){
                if (Yii::$app->request->get()['course']==$model->id){
                    $class2 = 'paddinged';
                    $str = "cursor:pointer; color:blue; background-color:#DDEBF9; text-shadow:0 2px 2px rgba(0, 0, 0, .2 ); border-left:solid red 1px;";
                } else {
                    $class2 = '';
                    $str = "cursor:pointer;border-left:solid white 1px;";
                }
            } else {
                $class2 = '';
                $str = "cursor:pointer;border-left:solid white 1px;";
            }

            return [
                'style'=>$str."",
                'class'=>'hover-cell '.$class2,
                'onClick'=>'window.location.href="'.Url::to(['site/courses','id'=>$model->id_cat,'course'=>$model->id]).'"'
                ];
        },
            
        'columns' => [
            [   
                'attribute' => 'name',
                'format' => 'raw',
                'contentOptions'=>['class'=>'','style'=>'cursor:pointer;max-width:20px'],
                'label' => '',
                'value' => function($data){
        
                    $content = "<div class='circle_check' style=''></div>";
                    return $content;
                }
            ],
            [   
                'attribute' => 'name',
                'format' => 'ntext',
                'contentOptions'=>['class'=>'change','style'=>'cursor:pointer'],
                'label' => 'Наименование курса',
            ],


            [   
                'attribute' => 'duration',
                'format' => 'raw',
                'contentOptions'=>['class'=>'text-center'],
                'label' => 'Длительность',
                'value' => function($data){
        
                    $content = $data->duration."&nbsp;ч";
                    return $content;
                }
            ],
            [   
                'attribute' => 'price',
                'format' => 'raw',
                'contentOptions'=>['class'=>'text-center'],
                'label' => 'Цена',
                'value' => function($data){
        
                    $content = $data->price."&nbsp;р";
                    return $content;
                }
            ],           
            // 'date',

            
        ],
    ]);
    } else {
        echo "Нет курсов в выбранной категории, или категория не существует";
    }

}

if ($modelCourse!==false) {
        echo '<hr/><div class="caption_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-1" style="padding-top:10px;padding-bottom:40px;">'
            .'<a class="not-hover" id="course">'.$modelCourse->name.'</a>'
        .'</div>';
        echo "<div class='col-lg-10 col-lg-offset-1 col-md-offset-1'>".$modelCourse->description."</div>";
        echo "<div class='col-lg-11 col-lg-offset-1 col-md-offset-1'><b>Длительность курса: <span class='duration'>".$modelCourse->duration."&nbsp;ч</span></b></div>";
        echo "<div class='col-lg-11 col-lg-offset-1 col-md-offset-1'><b>Цена: <span class='price'>".$modelCourse->price."&nbsp;р</span></b></div>";
        echo "<div style='padding-top:10px;' class='col-lg-11 col-lg-offset-1 text-center'>".Html::button('Расписание курса',['class'=>'btn btn-success btn-outline','onclick'=>'$("#calendar").css("display","block");$(\'.fc-today-button\').click(); $(\'html, body\').animate({ scrollTop: $(\'#calendar2\').offset().top-55 }, 500);'])." ".Html::a('Подать заявку на обучение',['site/request','course'=>$modelCourse->id],['class'=>'btn btn-primary btn-outline'])."</div>";
}



?>



<?php
if ($modelCourse!==false) {
    echo "<div id='calendar' style='display:none'>";
    echo '<div class="caption_sub_my text-left col-lg-offset-1 col-md-offset-1 col-sm-offset-1" style="padding-top:20px;padding-bottom:10px;">'
        .'<a class="not-hover" id="calendar2">Расписание курса</a>'
    .'</div>'; 
    
    Modal::begin([
        'header' => "<span id='myModalHeader' class='h4 text-center' style='display:block'></span>",
        'options'=>[
            'id'=>'myModal'
        ],
        'size'=>''

    ]);

    echo "<span id='myModalBody'></span>";
    echo "<div class='text-center' id='btnRequest'></div>";
    
    echo "<div style='display:none;'>";
    echo "<span id='hId'></span>";
    echo "<span id='hDs'></span>";
    echo "</div>";
    Modal::end();

    $model = new Timing();
    $data = $model->find()->where(['id_course'=>$modelCourse->id])->all();
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


    echo '<div class="col-lg-10 col-lg-offset-1 col-md-offset-1" style="padding-top:20px; ">';
    echo \yii2fullcalendar\yii2fullcalendar::widget([
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
}
echo "</div>";
echo "</div>";
  ?>
<?php Pjax::end(); ?>
