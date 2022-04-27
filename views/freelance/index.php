<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Html;
use yii\models\Freelance;

/* @var $this yii\web\View */
$this->title = 'ดาวน์โหลดไฟล์';
$this->params['breadcrumbs'][] = $this->title;

?>
<h2><i class="glyphicon glyphicon-circle-arrow-down"></i> ดาวน์โหลดไฟล์</i></h2>
<!-- <div class="well"> -->
<div class="site-index">
  <?= GridView::widget([
      'dataProvider' => $dataProvider,
//      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'title',
          ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
          'create_date',
        ],
        'layout' => '{items}{pager}',
  ]); ?>
</div>
<!-- </div> -->
