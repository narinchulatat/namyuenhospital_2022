<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NewsCategory;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$upfileCat =NewsCategory::find()->all();
$listData = ArrayHelper::map($upfileCat, 'id', 'name');
?>

<div class="news-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'icon')->fileInput() ?>

    <?= $form->field($model, 'cat_id')->dropDownList($listData, ['prompt'=>'กรุณาเลือกหมวดหมู่']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?> -->

    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full',
                        // 'clientOptions' => [
                        //   'filebrowserUploadUrl' => Url::to(['/site/upload']),
                        // ]
                    ]) ?>
    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'post_date')->textInput();
          }
    ?>

    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'update_date')->textInput();
          }
    ?>

    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'view')->textInput();
          }
    ?>

    <?= $form->field($model, 'docs[]')->widget(FileInput::classname(), [
    'options' => [
        'multiple' => true
    ],
    'pluginOptions' => [
        'initialPreview'=>$model->initialPreview($model->docs,'docs','file'),
        'initialPreviewConfig'=>$model->initialPreview($model->docs,'docs','config'),
        'allowedFileExtensions'=>['pdf','doc','docx','xls','xlsx'],
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
        'overwriteInitial'=>false
     ]
    ]); ?>
    <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false);  ?>
    <!--?=$form->field($model, 'files[]')->fileInput(['multiple' => true])?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
