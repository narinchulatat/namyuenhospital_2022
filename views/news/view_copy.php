<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\News */

// $this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'ข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
  $view = $model->view + 1;
  $model->view = $view;
  $model->save();
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');

// echo $basePath.'/uploaded/news/icons/'.$model->id.'.png';

$iconUrl = '/uploaded/news/icons/'.$model->id.'.png';

if(@is_file($basePath.$iconUrl)){
  $img = $baseUrl.$iconUrl;
}else{
  $img = $baseUrl.'/uploaded/news/icons/default.png';
}
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
    <div class="list-group">
      <div class="list-group-item">
        <div class="row-picture">
          <img class="media-object" src="<?= $img; ?>" alt="Generic placeholder image"><p />
        </div>
        <div class="row-content">
          <h4 class="list-group-item-heading"><?= $this->title = $model->title; ?></h4>
          <p class="list-group-item-text"><?= $model->detail; ?></p>
          <small><p class="list-group-item-text"><i class="fa fa-clock-o"></i> : <?= $model->post_date; ?> <i class="fa fa-user"></i> : Admin <span class="badge"> <i class="fa fa-eye" aria-hidden="true"></i> <?= $model->view; ?></span></p>
        </div>
      </div>
      <div class="list-group-separator"></div>
    </div>
  </div>
</div>
