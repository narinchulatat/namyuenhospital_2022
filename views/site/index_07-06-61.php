<?php

use yii\widgets\ListView;
use yii\grid\GridView;
//use app\components\RctReplyWidget;
use kartik\tabs\TabsX;
use yii\helpers\Url;
use evgeniyrru\yii2slick\Slick;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use app\models\Slide;

/* @var $this yii\web\View */
$this->title = 'โรงพยาบาลน้ำยืน อำเภอน้ำยืน จังหวัดอุบลราชธานี';
// register css files
$this->registerCssFile("@web/owl.carousel/owl-carousel/owl.carousel.css");
// $this->registerCssFile("@web/owl.carousel/owl-carousel/owl.theme.css");

//register js files
$this->registerJsFile("@web/owl.carousel/owl-carousel/owl.carousel.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile("@web/js/index.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
// popup css
$this->registerCssFile("http://www.jacklmoore.com/colorbox/example1/colorbox.css");
// popup js
// $this->registerJsFile("http://code.jquery.com/jquery-3.2.1.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile("http://www.jacklmoore.com/colorbox/jquery.colorbox.js", ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="container">
  <div class="site-index">
	<h5 class="thick"><a href="http://health.namyuensso.com/web" target="_blank"><marquee direction="left" scrollamount=3 onMouseOver="this.stop()" onMouseOut="this.start()">** ขอเชิญเข้าร่วมประชุมวิชาการ ประกวดผลงานวิชาการ ชมรมสาธารณสุขแห่งประเทศไทย ภาคตะวันออกเฉียงเหนือ ปี 2561 คลิกลงทะเบียนที่นี่  **</marquee></a></h5>
    <div class="row">
      <div class="col-md-9">
        <div id="owl-demo" class="owl-carousel owl-theme">
          <?php
            $slide = Slide::find()->all();
            foreach ($slide as $slides) {
            echo "<div class='item'>".Html::img('@web/slide/images/'.$slides['image'], ['alt' => 'ทดสอบ'])."</div>";

            }
           ?>
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-user-md" aria-hidden="true"></i> ผู้บริหาร</h4></div>
                <div class="thumbnail" align="center">
                    <img src="images/bos.jpg" alt="..." class="img-responsive img-thumbnail">
                    <div class="caption">
                        <h4>นพ.ชัยวัฒน์  ดาราสิชฌน์</h4>
                        <h5>ผู้อำนวยการโรงพยาบาลน้ำยืน</h5>
                    </div>
                </div>
                <ul class="xoxo blogroll">
                </ul>
        </div>
      </div>
      </div>
    <div class="row">
      <div class="col-md-6">
        <h4 class="page-header"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;ข่าวรับสมัครงาน</h4>
            <?php
            echo ListView::widget([
                'dataProvider' => $newswork,
                'itemView' => '/news/_item',
                'layout' => '{items}',
            ]);
            ?>
            <a href="<?= Url::to(['news/index','cat_id' => 2]); ?>" class="pull-right wow fadeInDown animated btn btn-primary animated" style="visibility: visible; animation-name: fadeInDown;"> เพิ่มเติม </a>
      </div>
      <div class="col-md-6">
        <h4 class="page-header"><span class="fa fa-paper-plane"></span>&nbsp;ข่าวจัดซื้อจัดจ้าง</h4>
            <?php
            echo ListView::widget([
                'dataProvider' => $newspurchase,
                'itemView' => '/news/_itemspurchase',
                'layout' => '{items}',
            ]);
            ?>
            <a href="<?= Url::to(['news/index','cat_id' => 3]); ?>" class="pull-right wow fadeInDown animated btn btn-primary animated" style="visibility: visible; animation-name: fadeInDown;"> เพิ่มเติม </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h4 class="page-header"><span class="fa fa-lightbulb-o"></span>&nbsp;บทความสาระน่ารู้ล่าสุด</h4>
        <!-- <div class="panel-body"> -->
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '/news/_item',
                'layout' => '{items}',
            ]);
            ?>
            <a href="<?= Url::to(['news/index','cat_id' => 1]); ?>" class="pull-right wow fadeInDown animated btn btn-primary animated" style="visibility: visible; animation-name: fadeInDown;"> เพิ่มเติม </a>
        <!-- </div> -->
      </div>
      <div class="col-md-6">
        <h4 class="page-header"><span class="fa fa-download"></span>&nbsp;ดาวน์โหลด</h4>
        <?= GridView::widget([
            'dataProvider' => $dataProvider3,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],
                // 'title',
                ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
                // 'create_date',
              ],
              'layout' => '{items}{pager}',
        ]); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <h4 class="page-header"><span class="fa fa-calendar"></span>&nbsp;อัลบั้มภาพ</h4>
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider2,
                'itemView' => '/photo-library/_item',
                'layout' => '{items}',
            ]);
            ?>
            <a href="<?= Url::to(['photo-library/index']); ?>" class="pull-right wow fadeInDown animated btn btn-primary animated" style="visibility: visible; animation-name: fadeInDown;"> เพิ่มเติม </a>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6">
        <h4 class="page-header"><span class="fa fa-paper-plane"></span>&nbsp;ตารางปฏิบัติงาน / กิจกรรม</h4>
            <?php
            echo \yii2fullcalendar\yii2fullcalendar::widget(array(
                'id' => 'calendar',
                'events' => $events,
                'options' => [
                    'lang' => 'th',
                ],
                'clientOptions' => [
                    'eventMouseover' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eventDetail(cellInfo, jsEvent); }"),
                    'eventMouseout' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eMouseremove(cellInfo, jsEvent); }")
                ]
            ));
            ?>
    </div>
    <div class="col-md-6">
      <h4 class="page-header"><span class="fa fa-chain-broken"></span>&nbsp;วิดีโอ</h4>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com//embed/-vZ_XkHHG30"></iframe>
                </div>
            </div>
        </div>
          <!-- <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZEwumhAiZVs"></iframe>
                  </div>
              </div>
          </div> -->
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pBT4hqMNhio"></iframe>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/m0I39tjTsJA"></iframe>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VpOu8q3JXec"></iframe>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T_7EZeNG-us"></iframe>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PfzJbAlXsvk"></iframe>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
