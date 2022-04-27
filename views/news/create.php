<?php

use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'เพิ่มข่าว';
$this->params['breadcrumbs'][] = ['label' => 'ข่าว', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
