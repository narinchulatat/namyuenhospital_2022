<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
    <?php //echo $form->field($model, 'created_date')->hiddenInput(['maxlength' => 50])->label(false); ?>

    <div class="col-md-6">
        <?=
        $form->field($model, 'created_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'กรุณาเลือกวันที่'],
        ]);
        ?>
    </div>

    <div class="col-md-6">
        <?=
        $form->field($model, 'end')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'กรุณาเลือกวันที่'],
            // 'readonly' => FALSE,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ]);
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่มตารางปฏิบัติงาน/กิจกรรม' : 'Update', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
