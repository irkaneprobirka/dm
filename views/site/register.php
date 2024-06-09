<?php

use app\models\Category;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="site-register">
    <h1>Регистрация</h1>

    <?php $form = ActiveForm::begin(
        [
            'id' => 'contact-form',
            'enableAjaxValidation' => true,
        ]
    ); ?>

    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'category_id')->dropDownList(Category::getCategory(), ['prompt' => 'Выберите категорию']) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'passport') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->