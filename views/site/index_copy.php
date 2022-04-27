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
      <div id="owl-demo" class="owl-carousel owl-theme">
        <?php
          $slide = Slide::find()->all();
          foreach ($slide as $slides) {
          echo "<div class='item'>".Html::img('@web/slide/images/'.$slides['image'], ['alt' => 'ทดสอบ'])."</div>";

          }
         ?>
      </div>
        <p />
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i> ข่าวประชาสัมพันธ์</h3>
                    </div>
                    <?php
                    $newspurchase = $this->render('newspurchase', [
                        'newspurchase' => $newspurchase
                    ]);
                    $newswork = $this->render('newswork', [
                        'newswork' => $newswork
                    ]);
                    $newsall = $this->render('newsall', [
                        'dataProvider' => $dataProvider
                    ]);
                    $items = [
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวรับสมัครงาน',
                            'content' => $newswork,
                            'active' => true
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวจัดซื้อจัดจ้าง',
                            'content' => $newspurchase,
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวทั่วไป',
                            'content' => $newsall,
                        ],
                    ];
                    echo TabsX::widget([
                        'items' => $items,
                        'position' => TabsX::POS_ABOVE,
                        'bordered' => true,
                        'encodeLabels' => false
                    ]);
                    ?>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i> ตารางปฏิบัติงาน / กิจกรรม</h3>
                    </div>
                    <div class="panel-body">
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
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-picture-o" aria-hidden="true"></i> อัลบั้มภาพ</h3>
                    </div>
                    <div class="panel-body">
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-chain-broken" aria-hidden="true"></i> วิดีโอ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="panel-body">
                                  <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com//embed/-vZ_XkHHG30"></iframe>
                                  </div>
                              </div>
                          </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZEwumhAiZVs"></iframe>
                                    </div>
                                </div>
                            </div>
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
            <div class="row">
                <div class="col-md-3">
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-user-md" aria-hidden="true"></i> ผู้บริหาร</h4></div>
                        <div class="panel-body">
                            <div class="thumbnail" align="center">
                                <img src="images/boss.jpg" alt="...">
                                <div class="caption">
                                    <h4>นพ.ชัยวัฒน์  ดาราสิชฌน์</h4>
                                    <h5>ผู้อำนวยการโรงพยาบาลน้ำยืน</h5>
                                </div>
                            </div>
                            <ul class="xoxo blogroll">
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                      <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-link" aria-hidden="true"></i> NAMYUENHEALTHYMAP</h4></div>
                      <div class="panel-body">
                          <ul class="xoxo blogroll">
                              <li><a href="http://namyuenhosp.thaiddns.com/" target="_blank"> ระบบสารสนเทศภูมิศาสตร์เพื่อระบบบริการสุขภาพอำเภอน้ำยืน</a></li>
                          </ul>
                      </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-link" aria-hidden="true"></i> หน่วยงานที่เกี่ยวข้อง</h4></div>
                        <div class="panel-body">
                            <ul class="xoxo blogroll">
                                <li><a href="http://namyuenhosp.in.th/webpage/mt.htm" target="_blank"> กลุ่มงานเทคนิคการแพทย์</a></li>
                                <li><a href="http://www.ddc.moph.go.th/index.php" target="_blank"> กรมควบคุมโรค</a></li>
                                <li><a href="http://www.moph.go.th" target="_blank"> กระทรวงสาธารณสุข</a></li>
                                <li><a href="http://www.oic.go.th/ginfo/" target="_blank"> ฐานข้อมูลหน่วยงานภาครัฐ (GINFO²)</a></li>
                                <li><a href="http://www.thaihealth.or.th" target="_blank"> สสส.</a></li>
                                <li><a href="http://www.nhso.go.th" target="_blank"> สำนักงานหลักประกันสุขภาพแห่งชาติ</a></li>
                                <li><a href="http://www.spbket10.com/" target="_blank"> สำนักงานเขตสุขภาพที่ 10</a></li>
                                <li><a href="http://ops.moph.go.th/" target="_blank"> สำนักปลัดกระทรวงสาธารณสุข</a></li>
                                <li><a href="http://beid.ddc.moph.go.th/beid_2014/th/home" target="_blank"> สำนักโรคติดต่ออุบัติใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> ระบบ MIS</h4></div>
                        <div class="panel-body">
                            <ul class="xoxo blogroll">
                                <li><a href="#" target="_blank"> DHDC</a></li>
                                <li><a href="http://203.157.166.6/chronic/index.php" target="_blank"> Chronic Link</a></li>
                                <li><a href="http://eclaim.nhso.go.th/webComponent/contact/ContactAction.do" target="_blank"> e-Claim</a></li>
                                <li><a href="http://hdc.phoubon.in.th/hdc/main/index.php" target="_blank"> Health Data Center (HDC)</a></li>
                                <li><a href="http://eclaim.nhso.go.th/webComponent/" target="_blank"> OP/PP Individual Record</a></li>
                                <li><a href="http://203.157.81.35/mis/" target="_blank"> Thai Traditional Medicine (TTM)</a></li>
                                <li><a href="http://www.coopubon.com/coopubon/info_coop1/coop_login.php" target="_blank"> ข้อมูลสมาชิกสหกรณ์ออมทรัพย์ฯ</a></li>
                                <li><a href="http://www.phoubon.in.th/html/fct.html" target="_blank"> ทีมหมอครอบครัว (FCT)</a></li>
                                <li><a href="http://203.157.166.6/chronic/index.php" target="_blank"> ระบบคลังข้อมูลโรคไม่ติดต่อเรื้อรัง</a></li>
                                <li><a href="http://phoubonbook.phoubon.in.th/" target="_blank"> ระบบหนังสือเวียน (สสจ.อุบลราชธานี)</a></li>
                                <li><a href="http://www.osccthailand.go.th/Front/" target="_blank"> ศูนย์ช่วยเหลือสังคม (OSCC)</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> โรงพยาบาลชุมชน</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
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
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-chain-broken" aria-hidden="true"></i> ระบบ Intranet</h3>
                        </div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="http://namyuenhosp.in.th/webboard/index.php" target="_blank">ระบบเว็บบอร์ด</a></li>
                                    <li><a href="http://namyuenhosp.in.th/asean/web/" target="_blank">ศูนย์ประสานงานเครือข่ายประชาคมอาเซียน</a></li>
                                    <li><a href="http://nyintranetnew/NYITCENTER/indexmain.aspx" target="_blank">ระบบ Intranet</a></li>
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScu5oxtNPn9aJ9Lv0N5-xUjutlEUueF6pflOgK_wf9NjyiK2Q/viewform" target="_blank">แบบประเมินธรรมาภิบาล</a></li>
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfrk7s5PwzkQF9qkjvCGiTbejhkrxdO5d1BKa7CjJDPRYV8MQ/viewform" target="_blank">แบบประเมินความผูกพันต่อองค์กร</a></li>
                                    <!-- <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeLCQJJinlBtMLNltoTI0OuUs_39tDegdVLDtl9uFHpNwcQ-A/viewform#responses" target="_blank">แบบวัดคุณภาพชีวิตของพยาบาล</a></li> -->
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeLCQJJinlBtMLNltoTI0OuUs_39tDegdVLDtl9uFHpNwcQ-A/viewform" target="_blank">แบบวัดคุณภาพชีวิตของพยาบาล</a></li>
                                    <li><a href="http://booking.namyuenhosp.in.th/site/login" target="_blank">ระบบจองห้องประชุม</a></li>
                                    <li><a href="#" target="_blank">ระบบขอใช้รถส่วนกลาง</a></li>
                                    <li><a href="#" target="_blank">ระบบจัดการความเสี่ยง</a></li>
                                    <li><a href="#" target="_blank">ระบบบุคลากร</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div
</div>
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
