<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Freelancee */

$this->title = 'เพิ่มเอกสารฝ่ายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'เอกสารฝ่ายบุคคล', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelancee-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
