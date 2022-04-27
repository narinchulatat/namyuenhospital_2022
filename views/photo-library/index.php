<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoLibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัลบั้ม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-library-index">

    <h1>ภาพกิจกรรม</h1>
    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '/photo-library/_itemall',
        'layout' => '{items}{pager}',
    ]);
    ?>
</div>
