<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TypeVacationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Vacations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-vacation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Vacation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
