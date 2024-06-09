<?php

use app\models\Department;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\account\models\AccountSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'department_id')->dropDownList(Department::getDepartment(), ['prompt' => 'Выберите отдел']) ?>

    <?php  echo $form->field($model, 'status_id')->dropDownList(Status::getStatus(), ['prompt' => 'Выберите статус'])  ?>

    <?= Html::submitButton('Заявки на сегодня', [
        'name' => 'qwe',
        'value' => 'qwe',
        'class' => 'btn btn-primary m-3'
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Очистить', 'index', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
