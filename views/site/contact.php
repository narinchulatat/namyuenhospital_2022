<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'เรื่องร้องเรียน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <!-- <div class="alert alert-success">
            ขอบคุณที่ติดต่อเรา. เราจะกลับไปหาคุณโดยเร็วที่สุดเท่าที่เป็นไปได้
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p> -->

    <?php else: ?>

        <p>
          <h2>ท่านสามารถกรอกแบบฟอร์ม และยื่นแบบได้ที่ "หน่วยงานรับเรื่องร้องเรียน"</h2>
        </p>
          <h2>โรงพยาบาลน้ำยืน 234 หมู่ 7 ต.สีวิเชียร อ.น้ำยืน จ.อุบลราชธานี 34260 โทร 0-4537-1097-8</h2>
          <h2>หรืออีเมล์ rmnamyuen@gmail.com</h2>
        <div class="row">
            <div class="col-lg-9">
            <h3> ดาวน์โหลดแบบฟอร์มแจ้งข้อร้องเรียน/ข้อคิดเห็น/ข้อเสนอแนะ <span class="glyphicon glyphicon-print"></span> <a href="http://namyuenhosp.in.th/web/documents/เรื่องร้องเรียน.docx">[WORD]</a></h3>
                <!-- <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?> -->

            </div>
        </div>

    <?php endif; ?>
</div>
