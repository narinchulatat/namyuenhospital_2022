<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');
$time = time();
?>
<!--<div class="media">
    <div class="media-body">
        <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>">
            <h5 class="media-heading"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?></h5>
        </a>
        <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $model->start_date; ?>
    </div>
</div>-->
<div class="col-sm-3">
    <div class="panel panel-default">
        <div class="thumbnail">
            <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>" style="text-decoration: none;">
              <div style="float: left;overflow: hidden;height: 180px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #efefef;">
                <?= $model->getPhotcover($model->ref); ?>
              </div>
                <hr>
              <div class="text-left" style="height:55px;width: 100%;overflow: hidden;">
                <i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?>
              </div>
            </a>
            <hr />
            <small class="text-muted">
              <!-- <i class="fa fa-clock-o"></i> <?php echo $model->start_date; ?> -->
              <i class="fa fa-clock-o"></i> <?php echo Yii::$app->formatter->asDate($model->start_date, 'long'); ?>
              <i class="fa fa-user"></i> Admin
            </small>
        </div>
      </div>
</div>

<!-- <div class="col-sm-3">
<div class="ui link cards">
  <div class="ui card">
    <div class="image" style="float: left;overflow: hidden;height: 175px;display: block;width: 100%;border-bottom: 1px solid #eee;background: #efefef;">
      <?= $model->getPhotcover($model->ref); ?>
    </div>
    <div class="content">
      <div class="description" style="height:55px;width: 100%;overflow: hidden;">
        <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>" style="text-decoration: none;">
          <?php echo $model->event_name; ?>
        </a>
      </div>
    </div>
    <div class="extra content">
      <span class="right floated">
        <i class="calendar alternate outline icon"></i>
        <?php echo $model->start_date; ?>
      </span>
      <span>
        <i class="user icon"></i>
        Admin
      </span>
    </div>
  </div>
</div>
</div> -->
