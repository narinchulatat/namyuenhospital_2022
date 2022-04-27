
<?php

use yii\widgets\ListView;
use yii\helpers\Url;

echo ListView::widget([
    'dataProvider' => $newswork,
    'itemView' => '/news/_item',
    'layout' => '{items}',
]);
?>
<br>
<a href="<?= Url::to(['news/index','cat_id' => 2]); ?>" class="btn btn-primary">ข่าวรับสมัครงานทั้งหมด</a>
