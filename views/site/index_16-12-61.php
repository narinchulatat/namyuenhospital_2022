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
        <div class="ui one column grid">
          <div class="column">
            <div class="ui raised segment">
              <a class="ui orange big ribbon label"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;ข่าวรับสมัครงาน</a>
              <p></p>
                    <?php
                    echo ListView::widget([
                        'dataProvider' => $newswork,
                        'itemView' => '/news/_item',
                        'layout' => '{items}',
                    ]);
                    ?>
                    <a href="<?= Url::to(['news/index','cat_id' => 2]); ?>" class="pull-right wow fadeInDown animated btn btn-primary animated" style="visibility: visible; animation-name: fadeInDown;"> เพิ่มเติม </a>
            </div>
          </div>
        </div>
        <!-- <h4 class="page-header"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;ข่าวรับสมัครงาน</h4> -->
      </div>
      <div class="col-md-6">
        <div class="ui one column grid">
          <div class="column">
            <div class="ui raised segment">
              <a class="ui teal big ribbon label"><span class="fa fa-paper-plane"></span>&nbsp;ข่าวจัดซื้อจัดจ้าง</a>
              <p></p>
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
        </div>
        <!-- <h4 class="page-header"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;ข่าวรับสมัครงาน</h4> -->
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
        <h4 class="page-header"><span class="fa fa-book"></span>&nbsp;การสร้างสุขเพื่อการบริการที่เป็นเลิศ</h4>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
            <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            <li data-target="#carousel-example-generic" data-slide-to="7"></li>
            <li data-target="#carousel-example-generic" data-slide-to="8"></li>
            <li data-target="#carousel-example-generic" data-slide-to="9"></li>
            <li data-target="#carousel-example-generic" data-slide-to="10"></li>
            <li data-target="#carousel-example-generic" data-slide-to="11"></li>
            <li data-target="#carousel-example-generic" data-slide-to="12"></li>
            <li data-target="#carousel-example-generic" data-slide-to="13"></li>
            <li data-target="#carousel-example-generic" data-slide-to="14"></li>
            <li data-target="#carousel-example-generic" data-slide-to="15"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <?= Html::img('@web/ny/001.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/01 (2).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/01 (3).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/02.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/02 (2).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/02 (3).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/03.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/03 (2).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/03 (3).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/04.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/04 (2).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/04 (3).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/05.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/05 (2).jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/06.jpg') ?>
            </div>
            <div class="item">
              <?= Html::img('@web/ny/06 (2).jpg') ?>
            </div>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- <?= GridView::widget([
            'dataProvider' => $dataProvider3,
            'columns' => [
                ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
              ],
              'layout' => '{items}{pager}',
        ]); ?> -->
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
                    <iframe class="embed-responsive-item" src="https://www.youtube.com//embed/4x-UepXjjtk"></iframe>
                </div>
            </div>
        </div>
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
