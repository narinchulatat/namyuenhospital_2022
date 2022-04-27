
<?php

use yii\widgets\ListView;
use yii\helpers\Url;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '/news/_item',
    'layout' => '{items}',
]);
?>
<br>
<a href="<?= Url::to(['news/index','cat_id' => 1]); ?>" class="btn btn-primary">ข่าวทั่วไปทั้งหมด</a>
