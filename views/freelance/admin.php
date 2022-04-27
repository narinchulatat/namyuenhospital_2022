<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Freelance;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreelanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัพโหลดไฟล์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มไฟล์', ['create'], ['class' => 'btn btn-success btn-lg btn-block btn-raised']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
