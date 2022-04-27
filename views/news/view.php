<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\models\News;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'ข่าว', 'url' => ['index']];
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
        <div class="row-content">
          <h4 class="list-group-item-heading"><?= $this->title = $model->title; ?></h4>
          <p class="list-group-item-text"><?= $model->detail; ?></p>
          <?= DetailView::widget([
              'model' => $model,
              'template'=>'<tr><i class="glyphicon glyphicon-download-alt"></i>&nbsp; {value}</tr>',
              'attributes' =>
              [
                  ['attribute'=>'','value'=>$model->listDownloadFiles('docs'),'format'=>'html'],
              ],
          ]) ?>
          <!-- <div style="margin:0 auto; width:100%; text-align: center;">
            <embed src="<?//=$model->getPdf($model->id) ?>"application/pdf height="400px" width="80%">
          </div> -->
          <small><p class="list-group-item-text"><i class="fa fa-clock-o"></i> : <?php echo Yii::$app->formatter->asDate($model->post_date, 'long'); ?> <i class="fa fa-user"></i> : Admin <span class="badge"> <i class="fa fa-eye" aria-hidden="true"></i> <?= $model->view; ?></span></p>
        </div>
      </div>
      <div class="list-group-separator"></div>
    </div>
  </div>
</div>
