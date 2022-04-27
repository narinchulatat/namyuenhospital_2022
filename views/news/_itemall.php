<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');

//echo $basePath.'\uploads'.$model->id.'.pdf';

$iconUrl = '/uploaded/news/icons/'.$model->id.'.png';

if(@is_file($basePath.$iconUrl)){
  $img = $baseUrl.$iconUrl;
}else{
  $img = $baseUrl.'/uploaded/news/icons/default.png';
}
?>
<div class="clearfix visible-xs">
  <div class="thumbnail">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>" style="text-decoration:none">
      <img src="<?= $img; ?>" data-holder-rendered="true" class="img-responsive">
      <div class="caption">
        <h5 class="thick"><?php echo $model->title; ?></h5>
        <?= DetailView::widget([
            'model' => $model,
            'template'=>'<tr><i class="arrow alternate circle down icon"></i>&nbsp;{value}</tr>',
            'attributes' =>
            [
                ['attribute'=>'','value'=>$model->listDownloadFiles('docs'),'format'=>'html'],
            ],
        ]) ?>
        <span><span class="glyphicon glyphicon-calendar" style="color:#5a5a5a"></span> <?php echo $model->post_date; ?>
        <span class="badge"><span class="glyphicon glyphicon-eye-open"></span> <?php echo $model->view; ?> view</span>
        </span>
      </div>
    </a>
  </div>
</div>
<div class="clearfix hidden-xs media">
  <div class="media-left">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>" style="text-decoration:none">
      <img class="media-object" src="<?= $img; ?>" alt="<?php echo $model->title; ?>" width="190" height="101">
    </a>
  </div>
  <div class="media-body">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>" style="text-decoration:none">
      <h5 class="thick"><?php echo $model->title; ?></h5>
      <span>
        <?= DetailView::widget([
            'model' => $model,
            'template'=>'<tr><span class="glyphicon glyphicon-download"></span>&nbsp;{value}</tr>',
            'attributes' =>
            [
                ['attribute'=>'','value'=>$model->listDownloadFiles('docs'),'format'=>'html'],
            ],
        ]) ?>
      </span>
      <!-- <br> -->
      <!-- <span><span class="glyphicon glyphicon-calendar" style="color:#5a5a5a"></span> <?php echo $model->post_date; ?> -->
      <span class="glyphicon glyphicon-calendar" style="color:#5a5a5a"></span> <?php echo Yii::$app->formatter->asDate($model->post_date, 'long'); ?>
      <span class="badge"><span class="glyphicon glyphicon-eye-open"></span> <?php echo $model->view; ?> view</span>
      </span>
    </a>
    </div>
  </div>
<!-- <div class="clearfix hidden-xs media_1">
  <div class="media-left">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>">
      <img class="media-object" src="<?= $img; ?>" alt="<?php echo $model->title; ?>" width="190" height="101">

    </a>
  </div>
  <div class="media-body">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>" style="text-decoration:none">
      <h6><?php echo $model->title; ?></h6>
    <span style="font-size:11px"><span class="glyphicon glyphicon-calendar" style="color:#5a5a5a"></span> <?php echo $model->post_date; ?>
    <span style="font-size:11px"><span class="glyphicon glyphicon-eye-open" style="color:#5a5a5a"></span> <?php echo $model->view; ?></span>
    </span>
  </a>
</div>
</div> -->
<!-- <div class="media">
  <div class="media-left">
      <img class="media-object" src="<?= $img; ?>" style="width: 40px; height: 40px;" alt="...">
  </div>
  <div class="media-body">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>" style="text-decoration: none;" target="_blank">
    <h5 class="media-heading"><p class="text-info"><?php echo $model->title; ?> <span class="badge"> <i class="fa fa-eye" aria-hidden="true"></i> : <?php echo $model->view; ?></span></p></h5>
  </a>
    <small><i class="fa fa-clock-o"></i> <?php echo $model->post_date; ?> <i class="fa fa-user"></i> : Admin </small>
</div>
<p />
</div> -->
