<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Freelancee;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreelanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัพโหลดไฟล์บุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-index">

    <h2><?= Html::encode($this->title) ?></h2>
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
            ['attribute'=>'docs','value'=>function($model){return $model->listDownloadFiles('docs');},'format'=>'html'],
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
