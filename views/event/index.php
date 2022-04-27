<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพิ่มตารางปฏิบัติงาน/กิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">
    <h1><?= Html::encode($this->title) ?></h1>
      <?php   //for popup create window
         modal::begin([
             'header'=>'<h4><i class="fa fa-calendar" aria-hidden="true"></i> เพิ่มตารางปฏิบัติงาน/กิจกรรม<h4>',
             'id'=>'modal',
             'size'=>'modal-lg',
         ]);
         echo "<div id='modalContent'></div>";
         modal::end();
        ?>
    <!-- Calender view -->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i> เพิ่มตารางปฏิบัติงาน / กิจกรรม</h3>
      </div>
      <div class="panel-body">
        <!-- Calender view -->
       <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
          'events'=> $events,
          'options' => [
                      'lang' => 'th',
                      ],
                'clientOptions' => [
                'eventMouseover'=>new \yii\web\JsExpression("function (cellInfo, jsEvent) { eventDetail(cellInfo, jsEvent); }"),
                'eventMouseout'=>new \yii\web\JsExpression("function (cellInfo, jsEvent) { eMouseremove(cellInfo, jsEvent); }")
            ]           
          ));
        ?>
      </div>
    </div>
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 ?>
