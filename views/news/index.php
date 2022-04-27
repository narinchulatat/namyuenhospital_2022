<?php

use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'ข่าวทั้งหมด';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> ข่าวทั้งหมด</i></h3>
  </div>
  <div class="panel-body">
    <div class="site-index">
      <?php
      // echo ListView::widget([
      //   'dataProvider' => $dataProvider,
      //   'itemView' => '/news/_itemall',
      //   'layout' => '{items}',
      // ]);
      $template = <<< EOL

<div id="content">

    <div class="list clr">

       {items}

    </div>

    {pager}

</div>

EOL;

      echo ListView::widget([

        'dataProvider' => $dataProvider,

        'itemView' => '/news/_itemall',

        'layout' => $template

      ]);
      ?>
    </div>
  </div>
</div>