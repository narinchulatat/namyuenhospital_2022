<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'แผนที่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-map">
    <h1><?= Html::encode($this->title) ?></h1>

<div class="well" align="center">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.096376327875!2d104.98255231427254!3d14.47915498987989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3111544b370ddbe1%3A0x8bcdcd9c4d9554d4!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LiZ4LmJ4Liz4Lii4Li34LiZ!5e0!3m2!1sth!2sth!4v1483501545938" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
</div>
