<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;
use app\assets\SemanticAsset;

MaterialAsset::register($this);
SemanticAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<!-- เรียก modal ออกมาแสดง -->
<script>
  //เรียก modal ออกมาแสดง
  var show = function() {
    $('#myModal').modal('show');
  };
  /* กำหนดเวลาหลังเปิดหน้าเว็บ ว่าจะให้แสดงหลังโหลดหน้าเว็บแล้วกี่วินาที  เช่น 2000 = 2 วิ */
  $(window).load(function() {
    var timer = window.setTimeout(show, 2000);
  });
</script>


<style>
  table div div {
    overflow: inherit !important;
    white-space: normal !important;
  }
</style>

<script>
  window.jQuery(function($) {
    "use strict";

    $('time').countDown({
      with_separators: false
    });
    $('.alt-1').countDown({
      css_class: 'countdown-alt-1'
    });
    $('.alt-2').countDown({
      css_class: 'countdown-alt-2'
    });

  });
</script>

<body class="frontpage">
  <?php $this->beginBody() ?>
  <!-- <img src="images/black_ribbon_top_left.png" class="black-ribbon stick-top stick-left"/> -->
  <!-- ส่วนหัวด้านบน -->
  <div class="wrap content_bg">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="index.php"><img src="images/hos.png" class="img-responsive" alt="โรงพยาบาลน้ำยืน จังหวัดอุบลราชธานี" title="โรงพยาบาลน้ำยืน จังหวัดอุบลราชธานี"></a>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
          var clock;
          $(document).ready(function() {
            var currentDate = new Date();
            // var futureDate = new Date(currentDate.getFullYear() + 1, 0, 21);
            var futureDate = new Date(2020, 0, 21, 8, 0, 0);
            var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
            clock = $('.clock').FlipClock(diff, {
              clockFace: 'DailyCounter',
              countdown: true
            });
          });
        </script>

        <div class="col-md-6">
          <div class="clearfix hidden-xs media">
            <img src="images/tel.png" class="img-responsive" alt="สายด่วน 088-136-8467" title="สายด่วน 088-136-8467">
          </div>
        </div>
      </div>
    </div>
    <!-- สิ้นสุดส่วนหัว -->
    <?php
    NavBar::begin([
      // 'brandLabel' => '<img src="images/moph.png" style="display:inline; vertical-align: top; height:32px;" class="img-responsive"> โรงพยาบาลน้ำยืน',
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
        'class' => 'navbar-inverse navbar-static-top',
      ],
    ]);
    echo Nav::widget([
      'options' => ['class' => 'navbar-nav'],
      'encodeLabels' => false,
      'items' => [
        ['label' => '<i class="glyphicon glyphicon-home"></i> หน้าแรก', 'url' => ['/site/index']],
        [
          'label' => '<i class="glyphicon glyphicon-info-sign"></i> เกี่ยวกับ', 'visible',
          'items' => [
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ประวัติโรงพยาบาล', 'url' => ['/site/story']],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โครงสร้างองค์กร', 'url' => ['/site/vision_mission']],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structure']],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> บุคลากร', 'url' => ['/site/personnel']],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แผนที่', 'url' => ['/site/map']],
          ],
        ],
        // ['label' => '<i class="glyphicon glyphicon-blackboard"></i> นโยบายและแผน', 'url' => ['/site/policy_plan']],
        ['label' => '<i class="glyphicon glyphicon-star-empty"></i> HA', 'url' => ['/site/ha']],
        [
          'label' => '<i class="glyphicon glyphicon-link"></i> ITA', 'visible',
          'items' => [
            [
              'label' => '<i class="glyphicon glyphicon-link"></i> ITA 2564',
              'url' => 'http://namyuenhosp.in.th/ita/web',
              'template' => '<a href="{url}">{label}</a>',
              'linkOptions' => ['target' => '_blank'],
            ],
            [
              'label' => '<i class="glyphicon glyphicon-link"></i> ITA 2565',
              'url' => 'http://namyuenhosp.in.th/ita2565/web',
              'template' => '<a href="{url}">{label}</a>',
              'linkOptions' => ['target' => '_blank'],
            ],
          ],
        ],

        ['label' => '<i class="glyphicon glyphicon-tasks"></i> คลังข้อมูล', 'url' => ['/site/dhdcservice']],
        ['label' => '<i class="glyphicon glyphicon-star"></i> การให้บริการ', 'url' => ['/site/service']],
        // ['label' => '<i class="glyphicon glyphicon-download"></i> ดาวน์โหลด', 'url' => ['/freelance/index']],
        [
          'label' => '<i class="glyphicon glyphicon-download"></i> ดาวน์โหลด', 'visible',
          'items' => [
            ['label' => '<i class="glyphicon glyphicon-download"></i> เอกสารทั่วไป', 'url' => ['/freelance/index']],
            ['label' => '<i class="glyphicon glyphicon-download"></i> เอกสารฝ่ายบุคคล', 'url' => ['/freelancee/index']],
            ['label' => '<i class="glyphicon glyphicon-download"></i> คำขอหนังสือรับรอง', 'url' => ['/certificate/index']],
          ],
        ],
        ['label' => '<i class="glyphicon glyphicon-refresh"></i> เรื่องร้องเรียน', 'url' => ['/site/contact']],
        //['label' => 'เกี่ยวกับ', 'url' => ['/site/about']],
      ],
    ]);

    echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'encodeLabels' => false,
      'items' => [
        [
          'label' => '<i class="glyphicon glyphicon-cog"></i> จัดการเว็บไซต์', 'visible' => !Yii::$app->user->isGuest,
          'items' => [
            //'<li class="divider"></li>',
            '<li class="dropdown-header">เมนูข่าว</li>',
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการหมวดหมู่', 'url' => ['/newscategory/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการข่าวสาร', 'url' => ['/news/admin'], 'visible' => !Yii::$app->user->isGuest],
            '<li class="dropdown-header">เมนูไฟล์</li>',
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัพโหลดไฟล์บุคลากร', 'url' => ['/freelancee/admin'], 'visible' => !Yii::$app->user->isGuest],
            '<li class="dropdown-header">เมนูอัลบั้มภาพ</li>',
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มอัลบั้มภาพ', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
            '<li class="dropdown-header">เมนูปฏิบัติงาน/กิจกรรม</li>',
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มตารางปฏิบัติงาน/กิจกรรม', 'url' => ['/event/admin'], 'visible' => !Yii::$app->user->isGuest],
            '<li class="dropdown-header">จัดการภาพ Slide</li>',
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มภาพ Slide', 'url' => ['/slide/index'], 'visible' => !Yii::$app->user->isGuest],

          ],
        ],
        Yii::$app->user->isGuest ?
          ['label' => '<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
          ['label' => 'ยินดีต้อนรับ (' . Yii::$app->user->identity->username . ')', 'items' => [
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โพรไฟล์', 'url' => ['/user/profile']],
            //                            ['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการผู้ใช้', 'url' => ['/user/admin/index']],
            ['label' => '<i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],

          ]],
        //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
      ],
    ]);

    NavBar::end();
    ?>
    <div class="content_main">
      <div class="container">
        <!-- style="margin-top: 65px;" -->
        <div class="jumbotron">
          <!-- popup -->
          <style>
            /*modal css*/
            /* fade ออกมาตรงกลางหน้าจอ */
            .fade {
              opacity: 0;
              -webkit-transition: opacity 1s linear;
              transition: opacity 1s linear;
            }
          </style>
          <!-- modal หน้าแรก -->
          <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">7 ขั้นตอนการรับบริการแอพพลิเคชั่น H4U </h4>
                </div>
                <div class="modal-body">
                  <a href="https://play.google.com/store/apps/details?id=th.go.moph.ict.smartPhr&hl=th" target="_blank">
                    <img src="images/h4u.png" alt="..." class="img-responsive img-thumbnail">
                  </a>
                  <br>
                  <p>เครดิตภาพ https://40plus.posttoday.com </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <!-- <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h1 class="modal-title">ข่าวประชาสัมพันธ์</h1>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-12 col-md-offset-1">
                          <div class="clock" style="margin:2em;"></div>
                          </div>
                          <a href="#" target="_blank">
                            <img src="images/12.png" alt="" class="img-responsive img-thumbnail">
                          </a>
                          <br>
                          <p>CR.NAMYUENHOSPITAL</p>
                        </div>
                      </div>
                    </div>
                  </div> -->
          <!-- Modal -->
          <?=
          Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ])
          ?>
          <?= $content ?>
        </div>
      </div>
    </div>
  </div>

  <!--<footer class="footer1">
            <div class="container">
                <p class="pull-left">&copy;  <?= date('Y') ?>  โรพยาบาลน้ำยืน อำเภอน้ำยืน จังหวัดอุบลราชธานี 34260 โทรศัพท์ : 0-4500-0000</p>
                <p class="pull-right">พัฒนาโดย <a href="https://www.facebook.com/FREEDOOM.FINO" target="_blank"> นายนรินทร์ จุลทัศน์ </a> ตำแหน่งนักวิชาการคอมพิวเตอร์ </p>
            </div>
        </footer>-->
  <?=
  \ibrarturi\scrollup\ScrollUp::widget([
    'theme' => 'image', // pill, link, image, tab
  ]);
  ?>
  <div class="credit">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3><span class="glyphicon glyphicon-globe"></span>&nbsp; เครือข่ายโรงพยาบาล</h3>
          <li><a href="http://www.kkphospital.go.th" target="_blank">โรงพยาบาลกุดข้าวปุ้น</a></li>
          <li><a href="http://www.dmdhospital.com/" target="_blank">โรงพยาบาลดอนมดแดง</a></li>
          <li><a href="http://www.trakanhospital.org/" target="_blank">โรงพยาบาลตระการพืชผล</a></li>
          <li><a href="http://www.tansumhospital.go.th/" target="_blank">โรงพยาบาลตาลสุม</a></li>
          <li><a href="http://www.nlhospital.go.th/" target="_blank">โรงพยาบาลนาจะหลวย</a></li>
          <li><a href="http://www.cupnatan.com/" target="_blank">โรงพยาบาลนาตาล</a></li>
          <li><a href="http://www.bundharikhos.com/hospital/" target="_blank">โรงพยาบาลบุณฑริก</a></li>
          <li><a href="http://www.pbhosp.com/" target="_blank">โรงพยาบาลพิบูลมังสาหาร</a></li>
          <li><a href="http://www.m30hosp.com/" target="_blank">โรงพยาบาลม่วงสามสิบ</a></li>
          <li><a href="http://www.warin.go.th/" target="_blank">โรงพยาบาลวารินชำราบ</a></li>
          <li><a href="http://www.smmhospital.com/" target="_blank">โรงพยาบาลศรีเมืองใหม่</a></li>
          <li><a href="http://www.detudomhospital.org" target="_blank">โรงพยาบาลสมเด็จพระยุพราชเดชอุดม</a></li>
          <li><a href="https://sunpasit.go.th/2014/index.php" target="_blank">โรงพยาบาลสรรพสิทธิประสงค์</a></li>
          <li><a href="http://www.sirinhospital.go.th/" target="_blank">โรงพยาบาลสิรินธร</a></li>
          <li><a href="http://www.kmhos.org/main/" target="_blank">โรงพยาบาลเขมราฐ</a></li>
          <li><a href="http://www.knhosp.go.th/" target="_blank">โรงพยาบาลเขื่องใน</a></li>
          <li><a href="http://www.khongch.go.th/home/" target="_blank">โรงพยาบาลโขงเจียม</a></li>
        </div>
        <div class="col-md-4">
          <h3><span class="glyphicon glyphicon-link"></span>&nbsp; หน่วยงานที่เกี่ยวข้อง</h3>
          <li><a href="http://www.phoubon.in.th/" target="_blank"> สำนักงานสาธารณสุขจังหวัดอุบลราชธานี</a></li>
          <li><a href="http://namyuenhosp.in.th/webpage/mt.htm" target="_blank"> กลุ่มงานเทคนิคการแพทย์</a></li>
          <li><a href="http://www.ddc.moph.go.th/index.php" target="_blank"> กรมควบคุมโรค</a></li>
          <li><a href="http://www.moph.go.th" target="_blank"> กระทรวงสาธารณสุข</a></li>
          <li><a href="http://www.oic.go.th/ginfo/" target="_blank"> ฐานข้อมูลหน่วยงานภาครัฐ (GINFO²)</a></li>
          <li><a href="http://www.thaihealth.or.th" target="_blank"> สำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ (สสส.)</a></li>
          <li><a href="http://www.nhso.go.th" target="_blank"> สำนักงานหลักประกันสุขภาพแห่งชาติ</a></li>
          <li><a href="http://www.spbket10.com/" target="_blank"> สำนักงานเขตสุขภาพที่ 10</a></li>
          <li><a href="http://ops.moph.go.th/" target="_blank"> สำนักปลัดกระทรวงสาธารณสุข</a></li>
          <li><a href="http://beid.ddc.moph.go.th/beid_2014/th/home" target="_blank"> สำนักโรคติดต่ออุบัติใหม่</a></li>
          <li><a href="http://ereportmatra80.com/frmHome80.aspx" target="_blank"> ระบบส่วนเทคโนโลยีสารสนเทศมลพิษ</a></li>
          <li><a href="http://envmanifest.anamai.moph.go.th/" target="_blank"> โปรแกรมกำกับการขนส่งมู,ฝอยติดเชื้อ</a></li>
        </div>
        <div class="col-md-4">
          <h3><span class="glyphicon glyphicon-hdd"></span>&nbsp; ระบบงานสาระสนเทศ</h3>
          <li><a href="http://namyuenhosp.in.th/km" target="_blank">การจัดการองค์ความรู้(KM)</a></li>
          <li><a href="http://namyuenhosp.in.th/webboard/index.php" target="_blank">ระบบเว็บบอร์ด</a></li>
          <li><a href="http://namyuenhosp.in.th/asean/web/" target="_blank">ศูนย์ประสานงานเครือข่ายประชาคมอาเซียน</a></li>
          <li><a href="http://nyintranetnew/NYITCENTER/indexmain.aspx" target="_blank">ระบบ Intranet</a></li>
          <li><a href="http://namyuenhosp.in.th/riskny/frontend/web/index.php?r" target="_blank">ระบบจัดการความเสี่ยง</a></li>
          <li><a href="http://namyuenhosp.in.th/managment/frontend/web/index.php?r" target="_blank">Green & Clean nyhospital</a></li>
          <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScu5oxtNPn9aJ9Lv0N5-xUjutlEUueF6pflOgK_wf9NjyiK2Q/viewform" target="_blank">แบบประเมินธรรมาภิบาล</a></li>
          <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfrk7s5PwzkQF9qkjvCGiTbejhkrxdO5d1BKa7CjJDPRYV8MQ/viewform" target="_blank">แบบประเมินความผูกพันต่อองค์กร</a></li>
          <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSf1Zoz0jsD1ybPnwsycVZV3hZUgzjLnqkL9dv2LSUeWrFnevQ/viewform?fbclid=IwAR2B1SJvb65rwB__mu3uhsXzz13HUPFiSZ-4_9L5wpDSFhhDnlUL87gdVas" target="_blank">แบบประเมินความสุขด้วยตนเอง รพ.น้ำยืน</a></li>
          <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeLCQJJinlBtMLNltoTI0OuUs_39tDegdVLDtl9uFHpNwcQ-A/viewform" target="_blank">แบบวัดคุณภาพชีวิตของพยาบาล</a></li>
          <li><a href="http://namyuenhosp.in.th/meetingroom/index.php" target="_blank">ระบบจองห้องประชุม</a></li>
          <li><a href="#" target="_blank">ระบบขอใช้รถส่วนกลาง</a></li>
          <li><a href="http://namyuenhosp.in.th/newphm/" target="_blank">ความรู้เรื่องยาฝ่ายเภสัชกรรม</a></li>
          <li><a href="#" target="_blank">ระบบบุคลากร</a></li>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_1">
    <div class="container">
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>โรงพยาบาลน้ำยืน 234 หมู่ 7 ต.สีวิเชียร อ.น้ำยืน จ.อุบลราชธานี 34260 โทร 0-4537-1097-8 <br>
              Copyright © Namyuen Hospital 2018 Design by Narin Chulatat</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage() ?>