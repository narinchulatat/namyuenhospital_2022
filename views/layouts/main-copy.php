<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;

MaterialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'NamkhunHospital',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-primary navbar-fixed-top',
        ],
    ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'หน้าหลัก', 'url' => ['/site/index']],
                ['label' => 'กิจกรรม', 'url' => ['/photo-library/index']],
                ['label' => 'ดาวน์โหลด', 'url' => ['/freelance/index']],

                [
                  'label' => 'ข้อมูลโรงพยาบาล','visible',
                  'items' => [
                    ['label' => 'ประวัติโรงพยาบาล', 'url' => ['#']],
                    ['label' => 'โครงสร้างองค์กร', 'url' => ['#']],
                    ['label' => 'วิสัยทัศน์ พันธกิจ', 'url' => ['#']],
                    ['label' => 'บุคลากร', 'url' => ['#']],
                    ['label' => 'ติดต่อ', 'url' => ['/site/contact']],
                  ],
                ],
                ['label' => 'เกี่ยวกับ', 'url' => ['/site/about']],
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                        [
                          'label' => 'จัดการข่าว','visible' => !Yii::$app->user->isGuest,
                          'items' => [
                            ['label' => 'จัดการหมวดหมู่', 'url' => ['/newscategory/index'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => 'จัดการข่าวสาร', 'url' => ['/news/admin'], 'visible' => !Yii::$app->user->isGuest],

                          ],
                        ],
                        [
                          'label' => 'จัดการไฟล์','visible' => !Yii::$app->user->isGuest,
                          'items' => [
                            ['label' => 'อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
                          ],
                        ],
                        [
                            'label' => 'จัดการกิจกรรม','visible' => !Yii::$app->user->isGuest,
                          'items' => [
                            ['label' => 'เพิ่มกิจกรรม', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
                          ],
                        ],

                Yii::$app->user->isGuest ?
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                    ['label' => 'ยินดีต้อนรับ(' . Yii::$app->user->identity->username . ')', 'items'=>[
                    ['label' => 'โพรไฟล์', 'url' => ['/user/profile']],
                    ['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
    	              ['label' => 'จัดการผู้ใช้', 'url' => ['/user/admin/index']],
                    ['label' => 'ออกจากระบบ', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
                    ]],
                    //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],

                      ],
                    ]);

    NavBar::end();
    ?>

    <div class="container" style="margin-top: 70px;">
         <?= Breadcrumbs::widget([
             'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
         ]) ?>
         <?= $content ?>
     </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;  <?= date('Y') ?>  โรพยาบาลน้ำขุ่น ตำบลขี้เหล็ก อำเภอน้ำขุ่น จังหวัดอุบลราชธานี 34260 โทรศัพท์ : 0-4525-2890</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
