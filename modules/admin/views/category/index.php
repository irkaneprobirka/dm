<?php

use app\models\Category;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\CategoryController $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление категориями';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-md-3 mt-3 mb-3'],
        'pager' => [
            'class' => LinkPager::class,
        ],
        'layout' => '{pager}<div class="row">{items}</div>{pager}',
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
