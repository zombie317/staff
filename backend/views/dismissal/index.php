<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DismissalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dismissals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dismissal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dismissal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            'date',
            'id_employee',
            'id_firm',
            //'id_position',
            //'id_department',
            //'article',
            //'cause',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
