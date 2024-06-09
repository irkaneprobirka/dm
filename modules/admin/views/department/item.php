<?php

use app\models\Status;
use yii\bootstrap5\Html;

?>

<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Номер заявки: <?= Html::encode($model->id) ?></li>
    <li class="list-group-item">Название: <?= Html::encode($model->title) ?></li>
  </ul>
  <p class="m-auto mt-3 mb-3">
      <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-primary  m-1' ]) ?>
      <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>
</div>