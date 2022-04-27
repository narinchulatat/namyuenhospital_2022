<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Freelance;

/* @var $this yii\web\View */
/* @var $model app\models\Freelance */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Freelances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest){ ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            ['attribute'=>'covenant','value'=>$model->listDownloadFiles('covenant'),'format'=>'html'],
            'create_date',
        ],
    ]) ?>

</div>
