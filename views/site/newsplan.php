
<?php

use yii\widgets\ListView;
use yii\helpers\Url;

echo ListView::widget([
    'dataProvider' => $newspurchase,
    'itemView' => '/news/_plan',
    'layout' => '{items}',
]);
?>
<br>
<a href="<?= Url::to(['news/index','cat_id' => 4]); ?>" class="btn btn-primary">นโยบายและแผนงานทั้งหมด</a>
