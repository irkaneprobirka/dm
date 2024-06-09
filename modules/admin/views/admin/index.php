<?php

use app\models\Application;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?= Html::a('Управление категориями', ['/mfc-panel/category'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Управление отделами', ['/mfc-panel/department'], ['class' => 'btn btn-primary']) ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
