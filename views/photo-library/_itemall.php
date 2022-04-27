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
<div class="col-sm-3">
    <div class="panel panel-default">
        <div class="thumbnail">
            <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>" style="text-decoration: none;">
              <div style="float: left;overflow: hidden;height: 150px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #efefef;">
                <?= $model->getPhotcover($model->ref); ?>
              </div>
                <hr>
              <div class="text-left" style="height:55px;width: 100%;overflow: hidden;">
                <i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?>
              </div>
            </a>
            <p />
            <small class="text-muted">
              <!-- <i class="fa fa-clock-o"></i> <?php echo $model->start_date; ?>  -->
              <i class="fa fa-clock-o"></i> <?php echo Yii::$app->formatter->asDate($model->start_date, 'long'); ?>
              <i class="fa fa-user"></i> Admin
            </small>
        </div>
    </div>
</div>
