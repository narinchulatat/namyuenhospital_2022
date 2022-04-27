<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */

$this->title = 'เพิ่มรูปภาพและกิจกรรม';
$this->params['breadcrumbs'][] = ['label' => 'รูปภาพและกิจกรรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-library-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
