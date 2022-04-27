
<?php

use yii\widgets\ListView;
use yii\helpers\Url;

echo ListView::widget([
    'dataProvider' => $newspurchase,
    'itemView' => '/news/_itemspurchase',
    'layout' => '{items}',
]);
?>
<br>
<a href="<?= Url::to(['news/index','cat_id' => 3]); ?>" class="btn btn-primary">ข่าวจัดซื้อจัดจ้างทั้งหมด</a>
