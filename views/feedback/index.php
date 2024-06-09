<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */
/** @var ActiveForm $form */
?>
<div class="feedback-index">

    <?php $form = ActiveForm::begin([
        'id' => 'feedback',
    ]); ?>

    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'text')->textarea() ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'rules')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- feedback-index -->