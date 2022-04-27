<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คำขอหนังสือรับรอง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('กรอกคำขอหนังสือรับรอง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'date_certificate',
            'fullname',
            'a_1',
            'a_2',
            'a_3',
            'a_4',
            //'fullname_1',
            //'fullname_2',
            //'fullname_3',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} </div>',
                'options'=> ['style'=>'width:150px;'],
                'buttons'=>[
                  'copy' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-duplicate"></i>',$url,['class'=>'btn btn-default']);
                    }
                  ]
              ],
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action,\app\models\Certificate $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
