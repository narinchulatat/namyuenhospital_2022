<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctReplyWidget extends Widget
{
	public $freelancDataProvider;

    public function init()
    {
        parent::init();
    }

    public function run()
    {



		$freelanceString='';

     	foreach($this->freelancDataProvider as $freelance)
     	{
     		$freelanceString.='<div class="post">'.
							'<div class="title">'.
							'<p style="color:#777777;font-style:italic;">'.nl2br($freelance->title).'</p>'.
							'<hr></div></div>';
     	}
	return $freelanceString;
    }
		
}
