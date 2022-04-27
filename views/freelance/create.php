<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Freelance */

$this->title = 'เพิ่มไฟล์';
$this->params['breadcrumbs'][] = ['label' => 'อัพโหลดไฟล์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
