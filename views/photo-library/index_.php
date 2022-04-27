<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoLibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-library-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'event_name',
            'location',
            'start_date',
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'คลิกดู',
                'headerOptions' => ['style' => 'width:auto'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {detail} {edit} {del} </div>',
                'buttons'=>[
                    'detail' => function($url,$model,$key){
                        return Html::a('รายละเอียด',
                            ['view', 'id' => $model->id],
                            ['class' => 'btn btn-inverse'],
                            $url);
                    },
                ],
            ],
            // [
            //   'class' => 'yii\grid\ActionColumn',
            //   'header'=>'คลิกดู',
            //   'buttonOptions'=>['class'=>'btn btn-default'],
            //   'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} </div>'
            // ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
