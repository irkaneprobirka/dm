<?php

use app\models\Status;
use yii\bootstrap5\Html;

?>

<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Номер заявки: <?= Html::encode($model->id) ?></li>
    <li class="list-group-item">Описание: <?= Html::encode($model->description) ?></li>
    <li class="list-group-item">Статус: <?= Html::encode(Status::getStatus()[$model->status_id]) ?></li>
    <li class="list-group-item">Дата создания: <?= Html::encode(Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y H:i:s')) ?></li>
    <li class="list-group-item">Дата записи: <?= Html::encode(Yii::$app->formatter->asDate($model->date, 'php:d.m.Y H:i:s')) ?></li>
  </ul>
  <p class="m-auto mt-3 mb-3">
        <?= $model->status_id == 1
        ? Html::a('Оказать услугу', ['apply', 'id' => $model->id], ['class' => 'btn btn-success m-1'])
        : '' ?>
        <?= $model->status_id == 1
        ? Html::a('Отклонить', ['deny', 'id' => $model->id], ['class' => 'btn btn-danger m-1'])
        : '' ?>
      <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-primary  m-1' ]) ?>
        
    </p>
</div>