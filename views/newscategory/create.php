<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsCategory */

$this->title = 'เพิ่มหมวดหมู่';
$this->params['breadcrumbs'][] = ['label' => 'หมวดหมู่', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
