<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Slide', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'image',
            [
                // 'options'=>['style'=>'width:10px;'],
                'format'=>'raw',
                'attribute'=>'image',
                'value'=>function($model){
                  return Html::tag('div','',[
                    'style'=>'width:400px;height:150px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url('.$model->photoViewer.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              ']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
</div>
