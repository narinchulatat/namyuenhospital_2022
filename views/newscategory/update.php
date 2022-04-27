<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsCategory */

$this->title = 'แก้ไขหมวดหมู่: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'หมวดหมู่', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
