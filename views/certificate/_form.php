<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <? //= $form->field($model, 'date_certificate')->date(['maxlength' => true]) 
            ?>
            <?= $form->field($model, 'date_certificate')->widget(
                DatePicker::ClassName(),
                [
                    'name' => 'check_issue_date',
                    'options' => ['placeholder' => 'เลือกวันที่ ...'],
                    'pluginOptions' => [
                        'format' => 'dd/mm/yyyy',
                        'todayHighlight' => true
                    ]
                ]
            ); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'a_1')->dropDownList([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5',], ['prompt' => 'จำนวน...ฉบับ']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'a_2')->dropDownList([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5',], ['prompt' => 'จำนวน...ฉบับ']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'a_3')->dropDownList([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5',], ['prompt' => 'จำนวน...ฉบับ']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'a_4')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'fullname_1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'fullname_2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'fullname_3')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>