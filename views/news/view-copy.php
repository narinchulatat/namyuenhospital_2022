<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'ข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
  $view = $model->view + 1;
  $model->view = $view;
  $model->save();
?>

<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest){ ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>

    <div class="well">
      <?= $model->detail; ?>
    </div>
      <p>วันที่ประกาศข่าว : <?= $model->post_date; ?>
      <p>ปรับปรุงล่าสุด : <?= $model->update_date; ?>
      <p>จำนวนการเข้าชม : <span class="badge"> <?= $model->view; ?></span>
</div>
