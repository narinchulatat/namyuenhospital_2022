<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\models\Freelancee;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreelanceeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เอกสารฝ่ายบุคคล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Freelancee-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <h2><i class="glyphicon glyphicon-circle-arrow-down"></i> เอกสารฝ่ายบุคคล</i></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>
    <!-- <p>
        <?= Html::a('เพิ่มเอกสาร', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            //  'start_date',
            //  'end_date',
            'description:ntext',
            ['attribute' => 'covenant', 'value' => function ($model) {
                return $model->listDownloadFiles('covenant');
            }, 'format' => 'html'],
            // ['attribute' => 'docs', 'value' => function ($model) {
            //     return $model->listDownloadFiles('docs');
            // }, 'format' => 'html'],
            //'covenant',
            // 'docs:ntext',

            // 'success_date',
            'create_date:date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
