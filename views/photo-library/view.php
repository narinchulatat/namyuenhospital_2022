<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Uploads;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => 'อัลบั้ม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-library-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php if (!Yii::$app->user->isGuest) { ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
    <?php } ?>

    <!-- <div class="well">
        <strong>หัวข้อ</strong><?= $model->detail; ?>
        <p>วันที่โพสต์ : <?= $model->start_date; ?> สถานที่ : <?= $model->location; ?>
    </div> -->
    <div class="panel panel-default">
        <div class="panel-body">
          <h2><?= Html::encode($this->title) ?></h2><p>
            <?= $model->detail; ?><p>
            <p><strong><i class="fa fa-calendar fa-lg" aria-hidden="true"></i> </strong><?php echo Yii::$app->formatter->asDate($model->start_date, 'long'); ?> <strong><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> </strong><?= $model->location; ?>
          <hr>
          <!-- <div  align="center"> -->
            <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->event_name)]); ?>
          <!-- </div> -->
        </div>
    </div>


</div>
