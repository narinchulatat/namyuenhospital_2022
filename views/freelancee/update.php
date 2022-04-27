<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Freelancee */

$this->title = 'Update Freelancee: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Freelancees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="freelancee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
